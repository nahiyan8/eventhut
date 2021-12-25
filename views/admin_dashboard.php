<?php


?>
<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Admin Dashboard - EventHut</title>

    <link rel="stylesheet" type="text/css" href="/css/main.css">
</head>

<body class="d-flex flex-column">
  <!-- Navbar -->
  <?php include 'components/navbar.php'; ?>
  <!-- Content -->
  <section class="d-flex flex-column flex-grow-1">
    <!-- Sidebar -->
    <div class="d-flex flex-column flex-grow-1 text-white bg-dark p-3 mb-auto border-top border-secondary" style="width: 320px;">
      <h6 class="mb-0">Audit...</h6>
      <hr />
      <ul class="nav nav-pills flex-column gap-3">
        <li class="nav-item flex-sm-fill text-sm-center">
          <a class="nav-link text-white <?= ($_SERVER['REQUEST_URI'] == '/admin/users') ? ' active' : ''; ?>"
            href="/admin/users">Users</a>
        </li>
        <li class="nav-item flex-sm-fill text-sm-center">
          <a class="nav-link text-white <?= ($_SERVER['REQUEST_URI'] == '/admin/events') ? ' active' : ''; ?>"
            href="/admin/events">Events</a>
        </li>
        <li class="nav-item flex-sm-fill text-sm-center">
          <a class="nav-link text-white <?= ($_SERVER['REQUEST_URI'] == '/admin/forms') ? ' active' : ''; ?>"
            href="/admin/forms">Forms</a>
        </li>
        <li class="nav-item flex-sm-fill text-sm-center">
          <a class="nav-link text-white <?= ($_SERVER['REQUEST_URI'] == '/admin/uploads') ? ' active' : ''; ?>"
            href="/admin/uploads">Uploads</a>
        </li>
      </ul>
    </div>
    <!-- Main -->
    <main class="container col-12 col-md-8 offset-md-2">
      <?php if ($_SERVER['REQUEST_URI'] == '/admin/users') { ?>
        
      <?php } else if ($_SERVER['REQUEST_URI'] == '/admin/events') { ?>
        
      <?php } else if ($_SERVER['REQUEST_URI'] == '/admin/forms') { ?>
        
      <?php } else if ($_SERVER['REQUEST_URI'] == '/admin/uploads') { ?>
      
      <?php } ?>
    </main>
  </section>
  <!-- Footer -->
  <?php include 'components/footer.php'; ?>
</body>

</html>