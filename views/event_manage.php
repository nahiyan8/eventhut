<?php
  // Retrieve and decode the form data.
  use \RedBeanPHP\R as R;
  $form_submissions = R::findAll('form_submissions', 'event_id = ?', [$event_id]);
  foreach ($form_submissions as $submission) {
    $submission->data = json_decode($submission->json, true);
  }
  $i = 1;
?>

<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Manage event - EventHut</title>
  
  <link rel="stylesheet" type="text/css" href="/css/main.css">
</head>

<body>
  <!-- Navbar -->
  <?php include 'components/navbar.php'; ?>
  <!-- Main -->
  <main class="container col-12 col-md-8 offset-md-2">
    <h1 class="fs-1 mt-4">Manage event</h1>
    <h2 class="fs-2 fw-light"><?= $event->title ?></h2>
    <table class="table mt-4">
      <thead>
        <tr>
          <th scope="col">#</th>
          <th scope="col">First name</th>
          <th scope="col">Last name</th>
          <th scope="col">Email address</th>
          <th scope="col">Mailing list?</th>
          <th scope="col">Comments</th>
        </tr>
      </thead>
      <tbody>
      <?php
        foreach ($form_submissions as $sub) {
          echo '<tr>';
          echo '<td scope="row">' . $i . '</td>';
          $i++;

          echo '<td>' . $sub->data['firstName'] . '</td>';
          echo '<td>' . $sub->data['lastName'] . '</td>';
          echo '<td>' . $sub->data['email'] . '</td>';
          echo '<td>' . $sub->data['addToMailingList'] . '</td>';
          echo '<td>' . $sub->data['comments'] . '</td>';
          
          echo '</tr>';
        }
      ?>
      </tbody>
    </table>
  </main>
  <!-- Footer -->
  <?php include 'components/footer.php'; ?>
</body>

</html>