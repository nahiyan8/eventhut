<?php

include 'models/Event.php';

use \RedBeanPHP\R as R;

$auth = $GLOBALS['auth'];

$currentUser = null;
$is_admin = false;

if ($auth->isLoggedIn()) {
    $user_id = $auth->getUserId();
    $currentUser = R::findOne('profiles', 'user_id = ?', [$user_id]);
    $is_admin = $auth->admin()->doesUserHaveRole($user_id, \Delight\Auth\Role::ADMIN);
}

if (!is_null($event_id)) {
    $event = R::load('events', $event_id);
    
    if ($event->id === 0)
        abort(404);
    
    $event = eventFormat($event);
}

?>
<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?= $event->title ?> - EventHut</title>

    <link rel="stylesheet" type="text/css" href="/css/main.css">
</head>

<body class="d-flex flex-column">
    <!-- Navbar -->
    <?php include 'components/navbar.php'; ?>
    <!-- Main -->
    <main class="flex-grow-1 container-fluid pt-4 pb-5 bg-dark">
        <?php if ($event->id !== 0) { ?>
        <div class="container bg-dark">
            <h2 class="event-title fs-2 fw-light"><?= $event->title ?></h2>
        </div>
        <div class="container px-3 py-3 bg-body border rounded-2">
            <div class="row">
                <div class="col-md-4">
                    <img class="event-image rounded-3" src="<?= $event->image_url ?>" />
                    <div class="mt-3 d-grid">
                        <!-- @todo: Refactor this.  -->
                        <?php if (!is_null($currentUser) && ($is_admin || $event->organizer_id === $currentUser->id)) { ?>
                        <a class="btn btn-lg btn-primary mb-3" href="/events/<?= $event_id ?>/manage">Manage</a>
                        <?php } ?>
                        <?php if (is_null($currentUser) || $event->organizer_id !== $currentUser->id) { ?>
                        <a class="btn btn-lg btn-primary mb-3" href="/events/<?= $event_id ?>/register">Register</a>
                        <?php } ?>
                    </div>
                </div>
                <div class="col-md-8">
                    <div class="row">
                        <div class="col-md-6">
                            <span class="fw-bold">Category</span>
                            <p><?= $event->category ?></p>
                        </div>
                        <div class="col-md-6">
                            <span class="fw-bold">Date</span>
                            <p><?= $event->date ?></p>
                        </div>
                        <div class="col-md-6">
                            <span class="fw-bold">Location</span>
                            <p><?= $event->location ?></p>
                        </div>
                        <div class="col-md-6">
                            <span class="fw-bold">Time</span>
                            <p><?= $event->time_begin . ' - ' . $event->time_end ?></p>
                        </div>
                        <div class="col-md-6">
                            <span class="fw-bold">Email</span>
                            <p><?= $event->sponsor_email ?></p>
                        </div>
                        <div class="col-md-6">
                            <span class="fw-bold">Phone</span>
                            <p><?= $event->sponsor_phone ?></p>
                        </div>
                        <div class="col-md-6">
                            <span class="fw-bold">Open to</span>
                            <p><?= $event->open_to ?></p>
                        </div>
                    </div>
                    <div>
                        <span class="fw-bold">Description</span>
                        <div><?= $event->description ?></div>
                    </div>
                </div>
            </div>
        </div>
        </div>
        <?php } else { ?>
        <div class="container text-center mt-5">
            <h1>Event not found</h1>
        </div>
        <?php } ?>
    </main>
    <!-- Footer -->
    <?php include 'components/footer.php'; ?>
</body>

</html>