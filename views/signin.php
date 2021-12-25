<?php

$error_msg = null;

if ($_SERVER['REQUEST_METHOD'] === 'GET') {
  if (array_key_exists('error_msg', $_GET)) {
    $error_msg = htmlspecialchars($_GET['error_msg'], ENT_QUOTES, 'UTF-8');
  }
}
else if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  try {
    if (!array_key_exists('email', $_POST)) {
      throw new \Delight\Auth\InvalidEmailException("Your email address is required", 1);
    }
    if (!array_key_exists('password', $_POST)) {
      throw new \Delight\Auth\InvalidPasswordException("Your password is required", 1);
    }
    // Keep logged in for one year
    $rememberDuration = null;
    if (array_key_exists('remember-me', $_POST) && $_POST['remember-me'] == 'on') {
      $rememberDuration = (int) (60 * 60 * 24 * 365.25);
    }
    
    $auth = $GLOBALS['auth'];
    $auth->login($_POST['email'], $_POST['password'], $rememberDuration);
    
    header('Location: /');
    exit();
  }
  catch (\Delight\Auth\InvalidEmailException $e) {
    $error_msg = 'Email is incorrect';
  }
  catch (\Delight\Auth\InvalidPasswordException $e) {
    $error_msg = 'Password is incorrect';
  }
  catch (\Delight\Auth\EmailNotVerifiedException $e) {
    $error_msg = 'Email is not verified';
  }
  catch (\Delight\Auth\TooManyRequestsException $e) {
    $error_msg = 'Too many requests recently, please try again later';
  }
}

?>
<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Sign in - EventHut</title>
  
  <link rel="stylesheet" type="text/css" href="/css/main.css">
</head>

<body class="d-flex flex-column">
  <!-- Navbar -->
  <?php include 'components/navbar.php'; ?>
  <!-- Main -->
  <main class="flex-grow-1 d-flex flex-column align-items-center mb-5">
    <div class="container col-12 col-lg-4 offset-lg-4 flex-grow-1 d-flex align-items-center">
      <form action="/signin" method="post" class="form-signin text-center flex-grow-1">
        <h1 class="h3 mb-3 fw-normal">Sign in</h1>
        <div class="form-floating mt-4">
          <input type="email" class="form-control" id="floatingInput" placeholder="name@example.com" name="email" required value="<?= $_POST['email'] ?? '' ?>">
          <label for="floatingInput">Email address</label>
        </div>
        <div class="form-floating mt-2">
          <input type="password" class="form-control" id="floatingPassword" placeholder="Password" name="password" required>
          <label for="floatingPassword">Password</label>
        </div>
        <button class="w-100 btn btn-lg btn-primary mt-2" type="submit">Sign in</button>
        <div class="mt-2 p-1">
          <input id="rememberMe" type="checkbox" name="remember-me"> 
          <label for="rememberMe" class="ps-1">Remember me</label>
        </div>
        <?php if (!is_null($error_msg)) {
          echo '<span class="text-danger">' . $error_msg . '</span>';
        } ?>
        <div class="border mt-4 p-2">
          <span>New to EventHut? <a href="/signup">Click here to sign up!</a></span>
        </div>
      </form>
    </div>
  </main>
    <!-- Footer -->
    <?php include 'components/footer.php'; ?>
</body>

</html>