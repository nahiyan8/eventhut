<?php

// Explanation
// -----------
// .htaccess sends all requests to the server, to index.php (this file)
// A router then returns the correct controller/views based on the request
// and authorization.

// Autoload the libraries installed by Composer.
require __DIR__ . '/vendor/autoload.php';

// Create Router instance
$router = new \Bramus\Router\Router();

// Define routes
$router->get('/', function() {
    include 'views/home.php';
});
$router->get('/signin', function() {
    include 'views/signin.php';
});
$router->get('/signup', function() {
    include 'views/signup.php';
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

// Run it!
$router->run();