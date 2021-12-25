<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Your registration is complete! - EventHut</title>
  
  <link rel="stylesheet" type="text/css" href="/css/main.css">
  
  <script>
    // Redirect to the homepage after 5 seconds.
    document.addEventListener('DOMContentLoaded', (e) => {
      setTimeout(function () {
        window.location.href = "/";
      }, 5000);
    });
  </script>
</head>

<body class="d-flex flex-column">
  <!-- Navbar -->
  <?php include 'components/navbar.php'; ?>
  <!-- Main -->
  <main class="flex-grow-1 d-flex flex-column align-items-center mb-5">
    <div class="container col-12 col-lg-4 offset-lg-4 flex-grow-1 d-flex align-items-center">
      <div class="flex-grow-1 text-center">
        <h1 class="d-grid"><i class="fa fa-university mb-2" aria-hidden="true"></i> Your registration for the event is complete!</h1>
        <h6>Redirecting...</h6>
        <div class="spinner-border mt-4" role="status">
          <span class="visually-hidden">Loading...</span>
        </div>
      </div>
    </div>
  </main>
    <!-- Footer -->
    <?php include 'components/footer.php'; ?>
</body>

</html>