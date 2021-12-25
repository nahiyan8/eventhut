<?php

namespace CustExcep;
class FormException extends \Exception { }

use \RedBeanPHP\R as R;

$error_msg = null;

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  try {
    if (!array_key_exists('email', $_POST)) {
      throw new \Delight\Auth\InvalidEmailException("Your email address is required", 1);
    }
    if (!array_key_exists('password', $_POST)) {
      throw new \Delight\Auth\InvalidPasswordException("Your password is required", 1);
    }
    if (!array_key_exists('confirm-password', $_POST) || $_POST['password'] !== $_POST['confirm-password']) {
      throw new \Delight\Auth\InvalidPasswordException("Password does not match, please try again", 1);
    }
    if (!array_key_exists('name', $_POST)) {
      throw new \CustExcep\FormException("You must provide your full name");
    }
    if (!array_key_exists('birthdate', $_POST)) {
      throw new \CustExcep\FormException("You must provide your date of birth");
    }
    $legaldate = (new \DateTime($_POST['birthdate']))->add(new \DateInterval('P18Y'));
    $currentdate = new \DateTime();
    if ($legaldate > $currentdate) {
      throw new \CustExcep\FormException('You must be at least 18 years of age');
    }
    if (!array_key_exists('gender', $_POST)) {
      throw new \CustExcep\FormException("You must provide your gender");
    }
    if ($_POST['gender'] !== 'male' && $_POST['gender'] !== 'female' && $_POST['gender'] !== 'other' && $_POST['gender'] !== 'undisclosed') {
      throw new \CustExcep\FormException("Invalid gender value given");
    }
    if (!array_key_exists('phone', $_POST)) {
      throw new \CustExcep\FormException("You must provide your phone number");
    }
    if (!array_key_exists('terms-and-conditions', $_POST) || $_POST['terms-and-conditions'] !== 'on') {
      throw new \CustExcep\FormException("You must agree to the terms and conditions");
    }
    
    $auth = $GLOBALS['auth'];
    $user_id = $auth->register($_POST['email'], $_POST['password'], null);
    
    $profile = R::dispense('profiles');
    $profile->user_id = $user_id;
    $profile->name = htmlspecialchars($_POST['name'], ENT_QUOTES, 'UTF-8');
    $profile->email = htmlspecialchars($_POST['email'], ENT_QUOTES, 'UTF-8');
    $profile->birthdate = htmlspecialchars($_POST['birthdate'], ENT_QUOTES, 'UTF-8');
    $profile->gender = R::enum('gender:' . $_POST['gender']);
    $profile->phone = htmlspecialchars($_POST['phone'], ENT_QUOTES, 'UTF-8');
    $profile_id = R::store($profile);
      
    if ($profile_id === 0) {
      throw new \RuntimeException("Failed to insert the profile for a new user");
    }
    
    header('Location: /signup/completed');
    exit();
  }
  catch (\Delight\Auth\InvalidEmailException $e) {
    $error_msg = 'Invalid email address';
  }
  catch (\Delight\Auth\InvalidPasswordException $e) {
    $error_msg = 'Invalid password';
  }
  catch (\Delight\Auth\UserAlreadyExistsException $e) {
    $error_msg = 'User already exists';
  }
  catch (\Delight\Auth\TooManyRequestsException $e) {
    $error_msg = 'Too many requests';
  }
  catch (\CustExcep\FormException $e) {
    $error_msg = $e->getMessage();
  }
}

?>
<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Create your account - EventHut</title>
  
  <link rel="stylesheet" type="text/css" href="/css/main.css">
</head>

<body class="d-flex flex-column">
  <!-- Navbar -->
  <?php include 'components/navbar.php'; ?>
  <!-- Main -->
  <main class="flex-grow-1 d-flex flex-column align-items-center mb-5">
    <div class="container col-12 col-lg-4 offset-lg-4 flex-grow-1 d-flex align-items-center">
      <form action="/signup" method="post" class="form-signin text-center flex-grow-1">
        <h1 class="h3 mb-3 fw-normal">Create your account</h1>
        <div class="form-floating mt-4">
          <input type="email" class="form-control" id="floatingInput" placeholder="name@example.com" name="email" required value="<?= $_POST['email'] ?? '' ?>">
          <label for="floatingInput">Email address</label>
        </div>
        <div class="form-floating mt-2">
          <input type="password" class="form-control" id="floatingPassword" placeholder="Password" name="password" required value="<?= $_POST['password'] ?? '' ?>">
          <label for="floatingPassword">Password</label>
        </div>
        <div class="form-floating mt-2">
          <input type="password" class="form-control" id="floatingPassword" placeholder="Confirm Password" name="confirm-password" required value="<?= $_POST['confirm-password'] ?? '' ?>">
          <label for="floatingPassword">Confirm Password</label>
        </div>
        <div class="form-floating mt-4">
          <input class="form-control" id="floatingName" placeholder="Full name" name="name" required value="<?= $_POST['name'] ?? '' ?>">
          <label for="floatingName">Full name</label>
        </div>
        <div class="form-floating mt-2">
          <input type="date" class="form-control" id="floatingBirthdate" name="birthdate" min="1950-01-01" max="2003-12-31" required value="<?= $_POST['birthdate'] ?? '' ?>">
          <label for="floatingBirthdate">Date of birth</label>
        </div>
        <div class="form-floating mt-2">
          <select class="form-select" id="floatingGender" placeholder="Gender" name="gender" required>
            <option value=""            <?= ($_POST['gender'] ?? '') === ''            ? 'selected' : '' ?>>Open this select menu</option>
            <option value="male"        <?= ($_POST['gender'] ?? '') === 'male'        ? 'selected' : '' ?>>Male</option>
            <option value="female"      <?= ($_POST['gender'] ?? '') === 'female'      ? 'selected' : '' ?>>Female</option>
            <option value="other"       <?= ($_POST['gender'] ?? '') === 'other'       ? 'selected' : '' ?>>Other</option>
            <option value="undisclosed" <?= ($_POST['gender'] ?? '') === 'undisclosed' ? 'selected' : '' ?>>Prefer not to say</option>
          </select>
          <label for="floatingGender">Gender</label>
        </div>
        <div class="form-floating mt-2">
          <input type+="tel" class="form-control" id="floatingPhone" placeholder="Phone number" name="phone" required value="<?= $_POST['phone'] ?? '' ?>">
          <label for="floatingPhone">Phone number</label>
        </div>
        <div class="border mt-4 p-2">
          <input id="termsAndConditions" type="checkbox" name="terms-and-conditions" value="on">
          <label for="termsAndConditions" class="ps-2">I agree to the terms & conditions.</label>
        </div>
        <?php if (!is_null($error_msg)) {
          echo '<span class="text-danger">' . $error_msg . '</span>';
        } ?>
        <button class="w-100 btn btn-lg btn-primary mt-4" type="submit">Sign up</button>
      </form>
    </div>
  </main>
    <!-- Footer -->
    <?php include 'components/footer.php'; ?>
</body>

</html>