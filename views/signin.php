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
  <?php include '../components/navbar.php'; ?>
  <!-- Main -->
  <main class="flex-grow-1 d-flex flex-column align-items-center mb-5">
    <div class="container col-12 col-lg-4 offset-lg-4 flex-grow-1 d-flex align-items-center">
      <form class="form-signin text-center flex-grow-1">
        <h1 class="h3 mb-3 fw-normal">Sign in</h1>
        <div class="form-floating mt-4">
          <input type="email" class="form-control" id="floatingInput" placeholder="name@example.com">
          <label for="floatingInput">Email address</label>
        </div>
        <div class="form-floating mt-2">
          <input type="password" class="form-control" id="floatingPassword" placeholder="Password">
          <label for="floatingPassword">Password</label>
        </div>
        <button class="w-100 btn btn-lg btn-primary mt-2" type="submit">Sign in</button>
        <div class="mt-2 p-1">
          <input id="rememberMe" type="checkbox" name="remember-me"> 
          <label for="rememberMe" class="ps-1">Remember me</label>
        </div>
        <div class="border mt-4 p-2">
          <span>New to EventHut? <a href="/views/signup.php">Click here to sign up!</a></span>
        </div>
      </form>
    </div>
  </main>
</body>

</html>