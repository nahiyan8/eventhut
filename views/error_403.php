<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>403 Forbidden - EventHut</title>
  
  <link rel="stylesheet" type="text/css" href="/css/main.css">
</head>

<body class="d-flex flex-column">
  <!-- Navbar -->
  <?php include 'components/navbar.php'; ?>
  <!-- Main -->
  <main class="d-flex flex-column flex-grow-1 justify-content-center">
    <div class="d-flex justify-content-center mb-5 pb-5">
      <div class="text-center">
        <h1 class="fs-1">403 Forbidden</h1>
        <?php
          if (array_key_exists('error_msg', $_GET))
            echo '<span>' . htmlspecialchars($_GET['error_msg'], ENT_QUOTES, 'UTF-8') . '</span>';
          else
            echo '<span>We are sorry, but you do not have access to this page or resource.</span>';
        ?>
      </div>
    </div>
  </main>
  <!-- Footer -->
  <?php include 'components/footer.php'; ?>
</body>

</html>