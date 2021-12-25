<?php

// Explanation
// -----------
// .htaccess sends all requests to the server, to index.php (this file)
// A router then returns the correct controller/views based on the request
// and authorization.

// Autoload the libraries installed by Composer.
require __DIR__ . '/vendor/autoload.php';

// Set up database ORM with RedBean.
use \RedBeanPHP\R as R;
require __DIR__ . '/secrets.php';
R::setup('mysql:host=localhost;dbname=eventhut', $db_username, $db_password);
R::freeze(false);
// R::startLogging();
\RedBeanPHP\Util\DispenseHelper::setEnforceNamingPolicy( FALSE );
$db = R::getDatabaseAdapter()->getDatabase()->getPDO();

// Set up authentication with PHP-Auth.
use \Delight\Auth\Auth as Auth;
$auth = new Auth($db);

// Set up router.
$router = new \Bramus\Router\Router();

// Define routes.
$router->get('/', function() {
    include 'views/home.php';
});
$router->match('GET|POST', '/signin', function() {
    include 'views/signin.php';
});
$router->match('GET|POST', '/signup', function() {
    include 'views/signup.php';
});
$router->get('/signup/completed', function() {
    include 'views/signup_completed.php';
});
$router->match('GET|POST', '/signout', function() {
    include 'views/signout.php';
});
$router->get('/events', function() {
    include 'views/event_listing.php';
});
$router->get('/events/create', function() {
    include 'views/event_create.php';
});
$router->get('/events/(\d+)', function($event_id) {
    include 'views/event_view.php';
});
$router->match('GET|POST', '/events/(\d+)/register', function($event_id) {
    include 'views/event_register.php';
});
$router->get('/events/(\d+)/register/completed', function() {
    include 'views/event_register_completed.php';
});
$router->match('GET|POST', '/events/(\d+)/manage', function($event_id) use ($auth) {
    try {
        if ($auth->isLoggedIn()) {
            $user_id = $auth->getUserId();
            $is_admin = $auth->admin()->doesUserHaveRole($user_id, \Delight\Auth\Role::ADMIN);
            
            $event = R::load('events', $event_id);
            if ($event->id === 0) {
                http_response_code(404);
                exit();
            }
            
            if ($is_admin || $user_id == $event->organizer_id) {
                include 'views/event_manage.php';
            }
            else {
                http_response_code(403);
                die('You are not authorized to access this page');
            }
        }
        else {
            header('Location: /signin?error_msg=You must be an event organizer in order to access this page');
            exit();
        }
    }
    catch (\Delight\Auth\UnknownIdException $e) {
        die('Unknown user ID');
    }
});
$router->get('/events/(\d+)/attendees', function($event_id) {
    include 'views/event_attendees.php';
});
// $router->get('/users', function() {
//     include 'views/user_listing.php';
// });
$router->get('/users/(\d+)', function($user_id) {
    include 'views/user_view.php';
});
$router->before('GET|POST', '/admin(/.*)?', function() use ($auth) {
    try {
        if ($auth->isLoggedIn()) {
            $user_id = $auth->getUserId();
            if ($auth->admin()->doesUserHaveRole($user_id, \Delight\Auth\Role::ADMIN)) {
                include 'views/admin_dashboard.php';
            }
            else {
                http_response_code(403);
                die('You are not authorized to access this page');
            }
        }
        else {
            // echo 'The user is not signed in';
            header('Location: /signin?error_msg=You must be an administrator in order to access this page');
            exit();
        }
    }
    catch (\Delight\Auth\UnknownIdException $e) {
        die('Unknown user ID');
    }
});

// Store important instances in superglobals to be allowed to access them from anywhere.
$GLOBALS['db'] = $db;
$GLOBALS['auth'] = $auth;

// Do some stage-setting.

// Convenience #1: The first user (user_id=0) should always have the admin role.
// try {
//     $auth->admin()->addRoleForUserById(1, \Delight\Auth\Role::ADMIN);
// }
// catch (\Delight\Auth\UnknownIdException $e) {
//     echo 'No users exist, please make a new user.';
// }

// Run it!
$router->run();

// Clean-up
R::close();
?>