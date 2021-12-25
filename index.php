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
\RedBeanPHP\Util\DispenseHelper::setEnforceNamingPolicy(false);
$db = R::getDatabaseAdapter()->getDatabase()->getPDO();


// Set up authentication with PHP-Auth.
use \Delight\Auth\Auth as Auth;
$auth = new Auth($db);

// Set up router.
$router = new \Bramus\Router\Router();

// Error aborter
function abort(int $code, string $message = null) {
    $error_handlers = [
        401 => '/signin',    // not authenticated
        403 => '/error_403', // not authorized
        404 => '/error_404', // not found
    ];
    // http_response_code($code);
    if (array_key_exists($code, $error_handlers)) {
        $msg_param = is_null($message) ? '' : ('?error_msg=' . $message);
        header('Location: ' . $error_handlers[$code] . $msg_param);
    }
    exit();
}

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
        if (!$auth->isLoggedIn())
            abort(401, 'You must be an event organizer in order to access this page');
        
        $user_id = $auth->getUserId();
        $is_admin = $auth->admin()->doesUserHaveRole($user_id, \Delight\Auth\Role::ADMIN);
        
        $event = R::load('events', $event_id);
        
        if ($event->id === 0)
            abort(404);
        
        if (!$is_admin && $user_id != $event->organizer_id) 
            abort(403);
        
        include 'views/event_manage.php';
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
        if (!$auth->isLoggedIn())
            abort(401, 'You must be an administrator in order to access this page');
        
        $user_id = $auth->getUserId();
        if (!$auth->admin()->doesUserHaveRole($user_id, \Delight\Auth\Role::ADMIN))
            abort(403);

        $subpages = [
            '/admin/users'   => 'views/admin_users.php',
            '/admin/events'  => 'views/admin_events.php',
            '/admin/forms'   => 'views/admin_forms.php',
            '/admin/uploads' => 'views/admin_uploads.php'
        ];

        if (array_key_exists($_SERVER['REQUEST_URI'], $subpages)) {
            include $subpages[$_SERVER['REQUEST_URI']];
        }
        else if ($_SERVER['REQUEST_URI'] == '/admin') {
            header('Location: /admin/users');
            exit();
        }
        else
            abort(404);
    }
    catch (\Delight\Auth\UnknownIdException $e) {
        die('Unknown user ID');
    }
});
$router->get('/error_403', function() { include 'views/error_403.php'; });
$router->get('/error_404', function() { include 'views/error_404.php'; });

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