<?php

use \RedBeanPHP\R as R;

// Perform SQL query.
$result = R::getAll('SELECT * FROM events WHERE is_featured = TRUE');
$featured = R::convertToBeans('events', $result);

// $event = R::dispense( 'events' );
// $event->id = 123;
// $event->title = "Virtual Author Talk: Traci Bliss on \"Big Basin Redwood Forest\"";
// $event->category = "LECTURE / READING";
// $event->datetime_begin = new DateTime('2022-01-20T14:30:00');
// $event->datetime_end = new DateTime('2022-01-20T15:30:00');
// $event->sponsor_name = "Bill Lane Center for the American West";
// $event->sponsor_email = "bill@example.com";
// $event->sponsor_phone = "+1-234-5679";
// $event->is_featured = TRUE;
// $event->image_url = "/uploads/1.jpg";
// R::store($event);

?>
<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Home - EventHut</title>

    <link rel="stylesheet" type="text/css" href="/css/main.css">
</head>

<body class="d-flex flex-column align-items-stretch">
    <!-- Navbar -->
    <?php include 'components/navbar.php'; ?>
    <!-- Banner -->
    <div class="container-fluid d-flex flex-column justify-content-center align-items-center" id="home-banner">
        <h1 class="align-self-center text-center text-white fw-light fs-1"><i class="fa fa-university me-2" aria-hidden="true"></i> University Events</h1>
    </div>
    <!-- Main -->
    <main class="flex-grow-1 container-fluid bg-dark">
        <div class="col-12 col-md-8 offset-md-2">
            <!-- Featured events -->
            <div class="card-deck">
                <?php foreach ($featured as $event) { ?>
                <a href="/events/<?= $event->id ?>">
                    <div class="card m-2 text-dark">
                        <img src="<?= $event->image_url ?>" class="card-img-top">
                        <div class="card-body">
                            <h5 class="card-title"><?= $event->title ?></h5>
                            
                        </div>
                    </div>
                </a>
                <?php } ?>
            </div>
        </div>
    </main>
    <!-- Footer -->
    <?php include 'components/footer.php'; ?>
</body>

</html>