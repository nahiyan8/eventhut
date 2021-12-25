<?php

use \RedBeanPHP\R as R;
$events = R::getAll('SELECT * FROM events');

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
    <section class="d-flex flex-grow-1 align-items-stretch">
        <!-- Sidebar -->
        <?php include 'components/admin_sidebar.php' ?>
        <!-- Main -->
        <main class="d-flex align-items-top flex-grow-1">
            <div class="container col-12 col-md-8 offset-md-2">
              <table class="table mt-4">
                <thead>
                  <tr>
                    <th scope="col">Organizer ID</th>
                    <th scope="col">Event ID</th>
                    <th scope="col">Title</th>
                    <th scope="col">Datetime</th>
                    <th scope="col">Link</th>
                  </tr>
                </thead>
                <tbody>
                  <?php
                    foreach ($events as $event) {
                      echo '<tr>';
                      {
                        echo '<td scope="row"><a href="/users/' . $event['organizer_id'] . '">' . $event['organizer_id'] . '</a></td>';
                        echo '<td>' . $event['id'] . '</td>';
                        echo '<td>' . $event['title'] . '</td>';
                        echo '<td>' . $event['datetime_begin'] . '</td>';
                        echo '<td><a href="/events/' . $event['id'] . '">View</a></td>';
                      }
                      echo '</tr>';
                    }
                  ?>
                </tbody>
              </table>
            </div>
        </main>
    </section>
    <!-- Footer -->
    <?php include 'components/footer.php'; ?>
</body>

</html>