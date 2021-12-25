<?php

use \RedBeanPHP\R as R;

require 'models/Event.php';

// Perform SQL query.
$result = R::getAll('SELECT * FROM events WHERE is_featured = TRUE');
$featured_ = R::convertToBeans('events', $result);
$featured = [];

foreach ($featured_ as $event) {
    $event = eventFormat($event);
    array_push($featured, $event);
    array_push($featured, $event);
    array_push($featured, $event);
}

?>
<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Home - EventHut</title>

    <link rel="stylesheet" type="text/css" href="/css/main.css">
</head>

<body class="d-flex flex-column">
    <!-- Navbar -->
    <?php include 'components/navbar.php'; ?>
    <!-- Banner -->
    <div class="container-fluid d-flex flex-column justify-content-center align-items-center" id="home-banner">
        <h1 class="align-self-center text-center text-white fw-light fs-1"><i class="fa fa-university me-2" aria-hidden="true"></i> University Events</h1>
    </div>
    <!-- Main -->
    <main class="container-fluid bg-dark">
        <div class="container mb-5">
            <div class="row">
                <h2 class="text-white text-center fw-light fs-2 mt-4">Featured</h2>
                <!-- Featured events -->
                <?php foreach ($featured as $event) { ?>
                <div class="col-md-6 col-lg-3 d-flex justify-content-center">
                    <a class="card event-card text-dark bg-light border-0 mt-4 mb-3" style="width: 18rem;" href="/events/<?= $event->id ?>">
                        <div class="card-thumbnail">
                            <img src="<?= $event->image_url ?>" class="card-img-top">
                        </div>
                        <div class="card-body">
                            <h5 class="card-title"><?= $event->title ?></h5>
                        </div>
                        <div class="card-footer text-muted mb-2 small">
                            <div class="mt-2">
                                <i class="fa fa-calendar fs-5 me-2 align-middle" aria-hidden="true"></i>
                                <span class="fw-bold">Date:</span>
                                <?= $event->date ?>
                            </div>
                            <div class="mt-2">
                                <i class="fa fa-clock-o fs-5 me-2 align-middle" aria-hidden="true"></i>
                                <span class="fw-bold">Time:</span>
                                <?= $event->time_begin . ' - ' . $event->time_end ?>
                            </div>
                            <div class="mt-2">
                                <i class="fa fa-map fs-5 me-2 align-middle" aria-hidden="true"></i>
                                <span class="fw-bold">Location:</span>
                                <?= $event->location ?>
                            </div>
                        </div>
                    </a>
                </div>
                <?php } ?>
            </div>
        </div>
    </main>
    <!-- Footer -->
    <?php include 'components/footer.php'; ?>
</body>

</html>