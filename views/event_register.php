<?php
  $description = 'Lorem ipsum dolor sit amet consectetur adipisicing elit. 
  Illo consectetur necessitatibus, delectus debitis fugit reprehenderit, 
  quibusdam iure alias error voluptatum non ab consequatur quae sed modi. 
  Qui maxime voluptate nihil.';
?>

<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>TEMPLATE - EventHut</title>
  
  <link rel="stylesheet" type="text/css" href="/css/main.css">
</head>

<body class="d-flex flex-column">
  <!-- Navbar -->
  <?php include 'components/navbar.php'; ?>
  
  <!-- Main -->
  <main class="flex-grow-1 d-flex flex-column align-items-center mb-5">
    <br><br>
    <div class="container col-12 col-lg-4 offset-lg-4 flex-grow-1 d-flex align-items-center">
      <h2>Event Registration</h2>
    </div>
    <br><br>
    <div class="container col-12 col-lg-10 offset-lg-2 flex-grow-1 d-flex align-items-center">
      <div class="row">
        <div class="col-2">Topic</div>
        <div class="col-8">Lorem ipsum dolor sit amet consectetur adipisicing elit. Illo consec.</div>
        <div class="col-2"></div>
        <div class="col-2">Description</div>
        <div class="col-8"><?= $description; ?></div>
        <div class="col-2"></div>
        <div class="col-2">Time</div>
        <div class="col-8">Jan 20, 2022 9:30 pm BDT</div>
      </div>
    </div>
    <br><br>
    <div class="container col-12 col-lg-10 offset-lg-2 flex-grow-1 d-flex align-items-center">
      <form class="row g-3">
        <div class="col-md-6">
          <label for="firstName" class="form-label">First Name</label>
          <input type="text" class="form-control" id="firstName" name="firstName">
        </div>
        <div class="col-md-6">
          <label for="lastName" class="form-label">Last Name</label>
          <input type="text" class="form-control" id="lastName" name="lastName">
        </div>
        <div class="col-md-6">
          <label for="emailAddress" class="form-label">Email Address</label>
          <input type="email" class="form-control" id="emailAddress" name="emailAddress">
        </div>
        <div class="col-md-6">
          <label for="confirmEmailAddress" class="form-label">Confirm Email Address</label>
          <input type="email" class="form-control" id="confirmEmailAddress" name="confirmEmailAddress">
        </div>
        <div class="col-12">
          <p>Would you like to be added to the email list?</p>
          <input class="form-check-input" type="radio" name="optionYes" id="optionYes">
          <label class="form-check-label" for="optionYes">
            Yes
          </label>
          <br>
          <input class="form-check-input" type="radio" name="optionNo" id="optionNo">
          <label class="form-check-label" for="optionNo">
            No
          </label>
          <br>
          <input class="form-check-input" type="radio" name="optionAlready" id="optionAlready">
          <label class="form-check-label" for="optionAlready">
            Already on the list
          </label>
        </div>
        <div class="col-12">
          <label for="comments">Questions and Comments</label>
          <textarea class="form-control" placeholder="Leave a comment here" id="comments" name="comments" style="height: 100px"></textarea>
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