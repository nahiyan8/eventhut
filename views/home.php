<?php

include 'models/Event.php';

$featured = [
    new Event()
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
    <?php include '../components/navbar.php'; ?>
    <!-- Main -->
    <main class="container col-12 col-md-8 offset-md-2 mt-4">
        <div class="d-grid">
            <?php foreach ($featured as $event) { ?>
            <a href="/events/<?= $event->id ?>">
                <div class="card m-2">
                    <img src="<?= $event->image_url ?>" class="card-img-top">
                    <div class="card-body">
                        <h5 class="card-title"><?= $event->title ?></h5>
                        <p class="card-text"><?= $event->short_desc ?></p>
                        <p class="card-text"><small class="text-muted"><?= $event->updated_at ?></small></p>
                    </div>
                </div>
            </a>
            <?php } ?>
        </div>
    </main>
</body>

</html>