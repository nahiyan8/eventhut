<?php

// Explanation
// -----------
// .htaccess sends all requests to the server, to index.php (this file)
// A router then returns the correct controller/views based on the request
// and authorization.

// Autoload the libraries installed by Composer.
require __DIR__ . '/vendor/autoload.php';

// Set up router.

// Create Router instance
$router = new \Bramus\Router\Router();

// Define routes
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
$router->get('/events', function() {
    include 'views/event_listing.php';
});
$router->get('/events/create', function() {
    include 'views/event_create.php';
});
$router->get('/events/(\d+)', function($event_id) {
    include 'views/event_view.php';
});
$router->get('/events/(\d+)/register', function($event_id) {
    include 'views/event_register.php';
});
$router->get('/events/(\d+)/manage', function($event_id) {
    include 'views/event_manage.php';
});
$router->get('/events/(\d+)/attendees', function($event_id) {
    include 'views/event_attendees.php';
});
$router->get('/users', function() {
    include 'views/user_listing.php';
});
$router->get('/users/(\d+)', function($user_id) {
    include 'views/user_view.php';
});
// $router->before('GET|POST', '/admin/.*', function() {
//     if (!isset($_SESSION['user'])) {
//         header('location: /signin');
//         exit();
//     }
// });

// Set up database ORM with RedBean.
use \RedBeanPHP\R as R;
$db_username = 'root';
$db_password = '';
R::setup('mysql:host=localhost;dbname=eventhut', $db_username, $db_password);

$db = R::getDatabaseAdapter()->getDatabase()->getPDO();

// Set up authentication with PHP-Auth.
use \Delight\Auth\Auth as Auth;
$auth = new Auth($db);

// Store important instances in superglobals to be allowed to access them from anywhere.
$GLOBALS['db'] = $db;
$GLOBALS['auth'] = $auth;

// Run it!
$router->run();

// Clean-up
R::close();