<?php

namespace CustExcep;
class LegalException extends \Exception { }

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
      throw new \Delight\Auth\InvalidPasswordException("Password does not match, please re-type them.", 1);
    }
    if (!array_key_exists('terms-and-conditions', $_POST) || $_POST['terms-and-conditions'] !== 'on') {
      throw new \CustExcep\LegalException("You must agree to the terms and conditions");
    }
    
    $auth = $GLOBALS['auth'];
    $user_id = $auth->register($_POST['email'], $_POST['password'], null);
    
    header('Location: /signup/completed');
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
  catch (\CustExcep\LegalException $e) {
    $error_msg = 'Too many requests recently, please try again later';
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
          <input type="email" class="form-control" id="floatingInput" placeholder="name@example.com" name="email">
          <label for="floatingInput">Email address</label>
        </div>
        <div class="form-floating mt-2">
          <input type="password" class="form-control" id="floatingPassword" placeholder="Password" name="password">
          <label for="floatingPassword">Password</label>
        </div>
        <div class="form-floating mt-2">
          <input type="password" class="form-control" id="floatingPassword" placeholder="Confirm Password" name="confirm-password">
          <label for="floatingPassword">Confirm Password</label>
        </div>
        <div class="border mt-4 p-2">
          <input id="termsAndConditions" type="checkbox" name="terms-and-conditions"> 
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