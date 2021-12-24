<?php

include 'models/Event.php';

$featured = [
    new Event(
        123,
        "Virtual Author Talk: Traci Bliss on \"Big Basin Redwood Forest\"",
        "LECTURE / READING",
        
        DateTime::createFromFormat("", )
        
        "Bill Lane Center for the American West",
    )
];

?>
<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Home - EventHut</title>

    <link rel="stylesheet" type="text/css" href="/css/main.css">
</head>

<body>
    <!-- Navbar -->
    <?php include 'components/navbar.php'; ?>
        <!-- Banner -->
        <div class="container-fluid d-flex flex-column justify-content-center align-items-center" id="home-banner">
            <h1 class="align-self-center text-center text-white fw-light fs-1"><i class="fa fa-university me-2" aria-hidden="true"></i> University Events</h1>
        </div>
    <!-- Main -->
    <main class="container col-12 col-md-8 offset-md-2 bg-dark">
        <!-- Featured events -->
        <div class="d-grid">
            <?php foreach ($featured as $event) { ?>
            <a href="/events/<?= $event->id ?>">
                <div class="card m-2">
                    <img src="<?= $event->image_url ?>" class="card-img-top">
                    <div class="card-body">
                        <h5 class="card-title"><?= $event->title ?></h5>
                        <p class="card-text"><small class="text-muted"><?= $event->updated_at ?></small></p>
                    </div>
                </div>
            </a>
            <?php } ?>
        </div>
    </main>
</body>

</html>