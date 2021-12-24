<?php

$pages = [
    '/' => 'Home',
    '/signin' => 'Sign in',
    '/signup' => 'Sign up',
    '/users' => 'All Users',
    '/users/123' => 'User View',
    '/events' => 'All Events',
    '/events/create' => 'Event Create',
    '/events/123' => 'Event View',
    '/events/123/manage' => 'Event Manage',
    '/events/123/register' => 'Event Register',
    '/events/123/attendees' => 'Event Attendees'
];

?>
<nav class="navbar navbar-expand-md navbar-dark bg-dark border-bottom border-dark">
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