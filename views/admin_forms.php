<?php

use \RedBeanPHP\R as R;
$form_submissions = R::getAll('SELECT * FROM form_submissions');

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
                            <th scope="col">#</th>
                            <th scope="col">Event ID</th>
                            <th scope="col">First name</th>
                            <th scope="col">Last name</th>
                            <th scope="col">Email address</th>
                            <th scope="col">Mailing list?</th>
                            <th scope="col">Comments</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php
                        $i = 1;
                        foreach ($form_submissions as $sub) {
                          $data = json_decode($sub['json'], true);
                          echo '<tr>';
                          {
                            echo '<td scope="row">' . $i++ . '</td>';
                            echo '<td><a href="/events/' . $sub['event_id'] . '">' . $sub['event_id'] . '</a></td>';
                            echo '<td>' . $data['firstName'] . '</td>';
                            echo '<td>' . $data['lastName'] . '</td>';
                            echo '<td>' . $data['email'] . '</td>';
                            echo '<td>' . $data['addToMailingList'] . '</td>';
                            echo '<td>' . $data['comments'] . '</td>';
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