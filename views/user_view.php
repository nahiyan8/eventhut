<?php

$user = [
    'id' => 123,
    'name' => 'Jean-Claude Van Damme',
    'bio' => 'Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat',
    'email' => 'jcvdamme@example.com',
    'location' => 'California, USA',
    'phone' => '820-885-3321',
    'age' => 22,
    'birthdate' => '4th April 1998',
    'upcoming_events_count' => 500,
    'registered_events_count' => 150,
    'participated_events_count' => 850
];

?>
<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title><?= $user['name'] ?> - EventHut</title>
  
  <link rel="stylesheet" type="text/css" href="/css/main.css">
</head>

<body>
    <!-- Navbar -->
    <?php include '../components/navbar.php'; ?>
    <!-- Main -->
    <main class="container col-12 col-md-8 offset-md-2 bg-body border px-4 py-2">
        <section class="section about-section gray-bg" id="about">
            <div class="container">
                <div class="row align-items-center flex-row-reverse">
                    <div class="col-lg-6">
                        <div class="about-text go-to">
                            <h3 class="dark-color"><?= $user['name'] ?></h3>
                            <p><?= $user['bio'] ?></p>
                            <div class="row about-list">
                                <div class="col-md-6">
                                    <div class="media">
                                        <label>Birthday</label>
                                        <p><?= $user['birthdate'] ?></p>
                                    </div>
                                    <div class="media">
                                        <label>Age</label>
                                        <p><?= $user['age'] ?></p>
                                    </div>
                                    <div class="media">
                                        <label>Residence</label>
                                        <p><?= $user['location'] ?></p>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="media">
                                        <label>E-mail</label>
                                        <p><?= $user['email'] ?></p>
                                    </div>
                                    <div class="media">
                                        <label>Phone</label>
                                        <p><?= $user['phone'] ?></p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="about-avatar">
                            <img src="https://bootdey.com/img/Content/avatar/avatar7.png" title="" alt="">
                        </div>
                    </div>
                </div>
                <div class="counter">
                    <div class="row">
                        <div class="col-6 col-lg-3">
                            <div class="count-data text-center">
                                <h6 class="count h2" data-to="500" data-speed="500">
                                    <?= $user['upcoming_events_count']; ?>
                                </h6>
                                <p class="m-0px font-w-600">Upcoming Events</p>
                            </div>
                        </div>
                        <div class="col-6 col-lg-3">
                            <div class="count-data text-center">
                                <h6 class="count h2" data-to="150" data-speed="150">
                                    <?= $user['registered_events_count']; ?>
                                </h6>
                                <p class="m-0px font-w-600">Registered Events</p>
                            </div>
                        </div>
                        <div class="col-6 col-lg-3">
                            <div class="count-data text-center">
                                <h6 class="count h2" data-to="850" data-speed="850">
                                    <?= $user['participated_events_count']; ?>
                                </h6>
                                <p class="m-0px font-w-600">Participated Events</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>
</body>

</html>