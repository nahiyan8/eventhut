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
  <?php include '../components/navbar.php'; ?>
  <!-- Main -->
  <main class="flex-grow-1 d-flex flex-column align-items-center mb-5">
    <div class="container col-12 col-lg-4 offset-lg-4 flex-grow-1 d-flex align-items-center">
      <form class="form-signin text-center flex-grow-1">
        <h1 class="h3 mb-3 fw-normal">Create your account</h1>
        <div class="form-floating mt-4">
          <input type="email" class="form-control" id="floatingInput" placeholder="name@example.com">
          <label for="floatingInput">Email address</label>
        </div>
        <div class="form-floating mt-2">
          <input type="password" class="form-control" id="floatingPassword" placeholder="Password">
          <label for="floatingPassword">Password</label>
        </div>
        <div class="form-floating mt-2">
          <input type="confirm-password" class="form-control" id="floatingPassword" placeholder="Confirm Password">
          <label for="floatingPassword">Confirm Password</label>
        </div>
        <div class="border mt-4 p-2">
          <input id="termsAndConditions" type="checkbox" name="terms-and-conditions"> 
          <label for="termsAndConditions" class="ps-2">I agree to the terms & conditions.</label>
        </div>
        <button class="w-100 btn btn-lg btn-primary mt-4" type="submit">Sign up</button>
      </form>
    </div>
  </main>
</body>

</html>