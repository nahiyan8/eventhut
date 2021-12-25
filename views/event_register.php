<?php

namespace CustExcep;

use \RedBeanPHP\R as R;

require 'models/Event.php';

if (!is_null($event_id)) {
    $event = R::load('events', $event_id);
    $event = eventFormat($event);
    
    if ($event->id === 0) {
      abort(404);
    }
}

// Check login status
$auth = $GLOBALS['auth'];
if (!$auth->isLoggedIn()) {
  abort(401, 'You must sign into your account first, before you can register for an event');
}
$user_id = $auth->getUserId();
$currentUser = R::findOne('profiles', 'user_id = ?', [$user_id]);

$is_already_registered = false;
$error_msg = null;
class FormException extends \Exception { }

// Check if the user has already registered for this event
if (!is_null(R::findOne('form_submissions', 'submitter_id = ? AND event_id = ?', [$currentUser->id, $event_id]))) {
  $is_already_registered = true;
}

// Handle form submissions
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  // Validate each field. @todo: Add a validation library and regex filters.
  $error_msg = null;
  try {
    if (!array_key_exists('firstName', $_POST) || !array_key_exists('lastName', $_POST)) {
      throw new FormException('Full name is required', 1);
    }
    if (!array_key_exists('email', $_POST) || !array_key_exists('confirmEmail', $_POST)) {
      throw new FormException('Email address is required in both fields', 1);
    }
    if ($_POST['email'] !== $_POST['confirmEmail']) {
      throw new FormException('Email address does not match, please try again', 1);
    }
    if (!array_key_exists('addToMailingList', $_POST)) {
      throw new FormException('Please select whether you want to be added to the email list', 1);
    }
    if ($_POST['addToMailingList'] !== 'yes' && $_POST['addToMailingList'] !== 'no') {
      throw new FormException('Invalid field value for addToMailingList', 1);
    }
    
    // Save the submission to the database.
    $fields = ['firstName', 'lastName', 'email', 'addToMailingList', 'comments'];
    $json = [];
    foreach ($fields as $field) {
      if (array_key_exists($field, $_POST)) {
        if ($field === 'addToMailingList')
          $json[$field] = $_POST[$field] === 'yes' ? true : false;
        else
          $json[$field] = htmlspecialchars($_POST[$field], ENT_QUOTES, 'UTF-8');
      }
    }
    
    $form_submission = R::dispense('form_submissions');
    $form_submission->submitter_id = $currentUser->id;
    $form_submission->event_id = $event_id;
    $form_submission->json = json_encode($json);
    R::store($form_submission);
    
    // Redirect to a confirmation page.
    header('Location: /events/123/register/completed');
    exit();
  }
  catch (FormException $e) {
    $error_msg = $e->getMessage();
  }
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
    <div class="container col-12 col-lg-6 offset-lg-3 mt-4 flex-grow-1 d-flex justify-content-center align-items-center">
      <h2>Register for <span class="fst-italic fw-normal">&ldquo;<?= $event->title ?>&rdquo;</span></h2>
    </div>
    <div class="container col-12 col-lg-6 offset-lg-3 mt-2 pt-4 border-top flex-grow-1 d-flex align-items-center">
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
    <hr/>
    <div class="container col-12 col-lg-6 offset-lg-3 mt-2 pt-4 border-top flex-grow-1 d-flex align-items-center justify-content-center">
      <?php if ($is_already_registered) { ?>
        <h2 class="fs-2 text-center text-muted mb-3">You have already registered for this event.</h2>
      <?php } else { ?>
      <form action="/events/<?= $event_id ?>/register" method="post" class="form row g-3" <?= $is_already_registered ? '' : 'disabled' ?>>
        <div class="col-md-6">
          <label for="firstName" class="form-label fw-bold">First Name</label>
          <input type="text" class="form-control" id="firstName" name="firstName" required>
        </div>
        <div class="col-md-6">
          <label for="lastName" class="form-label fw-bold">Last Name</label>
          <input type="text" class="form-control" id="lastName" name="lastName" required>
        </div>
        <div class="col-md-6">
          <label for="email" class="form-label fw-bold">Email Address</label>
          <input type="email" class="form-control" id="email" name="email" required>
        </div>
        <div class="col-md-6">
          <label for="confirmEmail" class="form-label fw-bold">Confirm Email Address</label>
          <input type="email" class="form-control" id="confirmEmail" name="confirmEmail" required>
        </div>
        <div class="col-12 col-md-6">
          <div class="fw-bold">Would you like to receive notifications via email?</div>
          <div class="form-check mt-2">
            <input class="form-check-input" type="radio" name="addToMailingList" value="yes" id="optionYes">
            <label class="form-check-label" for="optionYes">
              Yes
            </label>
            <br>
            <input class="form-check-input" type="radio" name="addToMailingList" value="no" id="optionNo">
            <label class="form-check-label" for="optionNo">
              No
            </label>
          </div>
        </div>
        <div class="col-12">
          <label for="comments" class="fw-bold">Questions and Comments</label>
          <textarea class="form-control mt-2" placeholder="Leave a comment here" id="comments" name="comments" style="height: 5rem"></textarea>
        </div>
        <?php if (!is_null($error_msg)) {
          echo '<span class="text-danger mt-3 mb-2">' . $error_msg . '</span>';
        } ?>
        <div class="col-12 text-center">
          <button type="submit" class="btn btn-lg btn-primary d-block" id="eventRegisterButton">Register</button>
        </div>
      </form>
      <?php } ?>
    </div>
  </main>
  <!-- Footer -->
  <?php include 'components/footer.php'; ?>
</body>

</html>