<?php

$event = [
  'id' => 1234,
  'type' => 'Lecture',
  'title' => 'The Joys and Stresses of the Holiday Season – A Workshop on Self-Compassion',
  'date' => 'Tuesday, December 14, 2021',
  'time' => '12:00 pm – 1:30 pm',
];

?>
<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Event - EventHut</title>
  
  <link rel="stylesheet" type="text/css" href="/css/main.css">
</head>

<body>
  <!-- Navbar -->
  <?php include '../components/navbar.php'; ?>
  <!-- Main -->
  <main class="container col-12 col-md-8 offset-md-2 bg-body border px-4 py-2">
    <h1><?= $event['title']; ?></h1>
  </main>
</body>

</html>