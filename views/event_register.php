<?php

use \RedBeanPHP\R as R;

require 'models/Event.php';

if (!is_null($event_id)) {
    $event = R::load('events', $event_id);
    $event = eventFormat($event);
    
    if ($event->id === 0) {
        http_response_code(404);
    }
}
  
$error_msg = null;

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  
}

?>

<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Register for "<?= $event->title ?>" - EventHut</title>
  
  <link rel="stylesheet" type="text/css" href="/css/main.css">
</head>

<body class="d-flex flex-column">
  <!-- Navbar -->
  <?php include 'components/navbar.php'; ?>
  
  <!-- Main -->
  <main class="flex-grow-1 d-flex flex-column align-items-center mb-5">
    <br><br>
    <div class="container col-12 col-lg-8 offset-lg-2 flex-grow-1 d-flex justify-content-center align-items-center">
      <h2>Register for <span class="fst-italic fw-normal">&ldquo;<?= $event->title ?>&rdquo;</span></h2>
    </div>
    <br><br>
    <div class="container col-12 col-lg-8 offset-lg-2 flex-grow-1 d-flex align-items-center">
      <div class="row">
        <div class="col-2 fw-bold">Topic</div>
        <div class="col-8 offset-1"><?= $event->title; ?></div>
        <div class="col-2 fw-bold mt-3">Description</div>
        <div class="col-8 offset-1 mt-3"><?= $event->description; ?></div>
        <div class="col-2 fw-bold mt-3">Date</div>
        <div class="col-8 offset-1 mt-3"><?= $event->date ?></div>
        <div class="col-2 fw-bold mt-3">Time</div>
        <div class="col-8 offset-1 mt-3"><?= $event->time_begin . ' - ' . $event->time_end ?></div>
        <div class="col-2 fw-bold mt-3">Location</div>
        <div class="col-8 offset-1 mt-3"><?= $event->location ?></div>
      </div>
    </div>
    <br><br>
    <div class="container col-12 col-lg-8 offset-lg-2 flex-grow-1 d-flex align-items-center">
      <form action="/events/<?= $event_id ?>/register" method="post" class="form row g-3">
        <div class="col-md-6">
          <label for="firstName" class="form-label fw-bold">First Name</label>
          <input type="text" class="form-control" id="firstName" name="firstName">
        </div>
        <div class="col-md-6">
          <label for="lastName" class="form-label fw-bold">Last Name</label>
          <input type="text" class="form-control" id="lastName" name="lastName">
        </div>
        <div class="col-md-6">
          <label for="emailAddress" class="form-label fw-bold">Email Address</label>
          <input type="email" class="form-control" id="emailAddress" name="emailAddress">
        </div>
        <div class="col-md-6">
          <label for="confirmEmailAddress" class="form-label fw-bold">Confirm Email Address</label>
          <input type="email" class="form-control" id="confirmEmailAddress" name="confirmEmailAddress">
        </div>
        <div class="col-12 col-md-6">
          <div class="fw-bold">Would you like to be added to the email list?</div>
          <div class="form-check mt-2">
            <input class="form-check-input" type="radio" name="addToEmailList" value="yes" id="optionYes">
            <label class="form-check-label" for="optionYes">
              Yes
            </label>
            <br>
            <input class="form-check-input" type="radio" name="addToEmailList" value="no" id="optionNo">
            <label class="form-check-label" for="optionNo">
              No
            </label>
            <br>
            <input class="form-check-input" type="radio" name="addToEmailList" value="alreadyinlist" id="optionAlready">
            <label class="form-check-label" for="optionAlready">
              I am already on the list
            </label>
          </div>
        </div>
        <div class="col-12">
          <label for="comments" class="fw-bold">Questions and Comments</label>
          <textarea class="form-control mt-2" placeholder="Leave a comment here" id="comments" name="comments" style="height: 100px"></textarea>
        </div>
        <div class="col-12">
          <button type="submit" class="btn btn-primary" id="eventRegisterButton">Register</button>
        </div>
      </form>
    </div>
  </main>
  <!-- Footer -->
  <?php include 'components/footer.php'; ?>
</body>

</html>