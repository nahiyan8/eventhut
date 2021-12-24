<?php

$pages = [
    '/views/home.php' => 'Home',
    '/views/event.php' => 'Event',
    '/views/signin.php' => 'Sign in',
    '/views/signup.php' => 'Sign up',
    '/views/user_profile.php' => 'User Profile',
    '/views/event_create.php' => 'Event Create',
    '/views/event_listing.php' => 'Event Listing',
    '/views/event_manage.php' => 'Event Manage',
    '/views/event_register.php' => 'Event Register',
    '/views/event_attendees.php' => 'Event Attendees'
];

?>
<nav class="navbar navbar-expand-md navbar-dark bg-dark">
    <div class="container-fluid">
        <div class="container d-flex flex-nowrap">
            <a class="navbar-brand" href="#">EventHut</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse"
            aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarCollapse">
            <ul class="navbar-nav me-auto mb-2 mb-md-0">
                <?php
                    foreach ($pages as $uri => $name) {
                        $active = $uri == $_SERVER['REQUEST_URI'] ? ' active' : '';
                        echo '<li class="nav-item">';
                        echo '<a class="nav-link' . $active . '" aria-current="page" href="' . $uri . '">';
                        echo $name;
                        echo '</a>';
                        echo '</li>';
                    }
                ?>
            </ul>
            <button class="btn btn-outline-success" type="submit">Hello, {name}</button>
            </div>
        </div>
    </div>
</nav>