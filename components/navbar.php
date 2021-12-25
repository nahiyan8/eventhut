<?php

use \RedBeanPHP\R as R;

$auth = $GLOBALS['auth'];

if ($auth->isLoggedIn()) {
    $user_id = $auth->getUserId();
    $currentUser = R::findOne('profiles', 'user_id = ?', [$user_id]);
    
    $is_admin = $auth->admin()->doesUserHaveRole($user_id, \Delight\Auth\Role::ADMIN);
}

$pages = [
    // '/' => 'Home',
    // '/events' => 'All Events',
    // '/users/1' => 'User View',
    // '/events/create' => 'Event Create',
    // '/events/123' => 'Event View',
    // '/events/123/manage' => 'Event Manage',
    // '/events/123/register' => 'Event Register',
    // '/admin' => 'Admin'
];

?>
<nav class="navbar navbar-expand-lg navbar-dark bg-dark border-bottom border-dark">
    <div class="container-fluid">
        <div class="container d-flex justify-content-between">
            <a class="navbar-brand" href="/">EventHut</a>
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
            <?php if ($auth->isLoggedIn()) { ?>
            <div class="dropdown">
                <i class="fa fa-user-circle fs-3" aria-hidden="true"></i>
                <button class="btn btn-dark dropdown-toggle" type="button" id="navbarDropdown" data-bs-toggle="dropdown" aria-expanded="false">
                    Hello, <?= strtok($currentUser->name, ' ') . ($is_admin ? '<i class="bi bi-shield-shaded ms-1"></i>' : '') ?>
                </button>
                <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                    <?php if ($is_admin) { echo '<li><a class="dropdown-item bg-warning bg-gradient" href="/admin">Administration</a></li>'; } ?>
                    <li><a class="dropdown-item" href="/users/<?= $currentUser->id ?>">My profile</a></li>
                    <li><hr class="dropdown-divider"></li>
                    <li><a class="dropdown-item" href="/signout">Sign out</a></li>
                </ul>
            </div>
            <?php } else { ?>
                <a id="signin-button" class="btn text-light me-2" href="/signin" role="button">Sign in</a>
                <a id="signup-button" class="btn btn-outline-light text-light bg-dark" href="/signup" role="button">Sign up</a>
            <?php } ?>
            </div>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse"
            aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
        </div>
    </div>
</nav>