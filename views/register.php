<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Register - EventHut</title>
  
  <link rel="stylesheet" type="text/css" href="/css/main.css">
</head>

<body>
  <!-- Navbar -->
  <?php include '../components/navbar.php'; ?>
  <!-- Main -->
  <main class="form-signin container col-12 col-md-4 offset-md-4 text-center">
    <form>
      <h1 class="h3 mb-3 fw-normal">Sign Up</h1>
      <div class="form-floating">
        <input type="email" class="form-control" id="floatingInput" placeholder="name@example.com">
        <label for="floatingInput">Email address</label>
      </div>
      <div class="form-floating">
        <input type="password" class="form-control" id="floatingPassword" placeholder="Password">
        <label for="floatingPassword">Password</label>
      </div>
      <div class="form-floating">
        <input type="confirm-password" class="form-control" id="floatingPassword" placeholder="Confirm Password">
        <label for="floatingPassword">Confirm Password</label>
      </div>
      <button class="w-100 btn btn-lg btn-primary" type="submit">Sign up</button>
      <div class="register-form">
        <p>All done?</p>
        <a class="btn btn-primary" href="login.html"> Back to Login </a>
      </div>
    </form>
  </main>
</body>

</html>