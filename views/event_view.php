<?php

$event = [
	'id' => 1234,
	'type' => 'Lecture',
	'title' => 'The Joys and Stresses of the Holiday Season – A Workshop on Self-Compassion',
	'date' => 'Tuesday, December 14, 2021',
	'time' => '12:00 pm – 1:30 pm',
	'description' => <<<EOT
<p>The holiday season is supposed to be a joyful time, but along with celebrations and gatherings, the holidays can also bring nostalgia, stress, and a sense of isolation. Often, this is because we feel torn or guilty about some aspects of the holiday season – not being with our loved ones due to work or pandemic restrictions, missing our departed loved ones, or the stress of buying gifts, planning events, and unrealistic expectations.</p>
<p>Please join us for this free interactive online workshop where we will normalize the feelings of overwhelm and even dread associated with the holiday season and develop a toolkit of strategies for taking care of yourself as you take care of others. We will offer research-based tools and tips for finding peace and opportunity in any situation and explore several positive psychology strategies, including practicing self-compassion and boundary setting.</p>
<p>By applying these concepts, we can learn about practical tips for managing the tensions that the holiday season brings. Our goal is for us to better show up with authenticity and presence. By learning to accept the duality and complexity of emotions that the holiday season brings, we may maximize our sense of connection, purpose, and fulfillment during this holiday season.</p>
<p>Instructors: Al'ai Alvarez, MD, FACEP, FAAEM, is an assistant clinical professor in emergency medicine, assistant program director in the Stanford Emergency Medicine Residency Program, and co-chair of the Stanford WellMD's Physician Wellness Forum. He has given several grand rounds and national conference lectures and workshops on relevant topics in gratitude and compassion, physician well-being, burnout, and the imposter syndrome.</p>
<p>Patty Purpur de Vries, MS, is the director of strategy, outreach and innovation for Stanford’s BeWell Programs and an ambassador for the Stanford Medicine WellMD Center. </p>
EOT,
	'image_url' => 'https://events.stanford.edu/events/922/92246/92202-1.jpg',
	'location' => 'Your Computer',
	'email' => 'healthyliving@stanford.edu',
	'phone' => '650.723.9649',
	'open_to' => 'Everyone'
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
	<?php include 'components/navbar.php'; ?>
	<!-- Main -->
	<main class="container col-12 col-md-8 offset-md-2 mt-4">
		<div class="container-fluid bg-dark">
			<h2 class="event-title"><?= $event['title'] ?></h2>
		</div>
		<div class="px-4 py-2 bg-body border">
			<img class="event-image" src="<?= $event['image_url'] ?>"/><br><br>
			<h6>Event Type</h6>
			<p><?= $event['type'] ?></p>
			<h6>Event Details</h6>
			<p><?= $event['description'] ?></p>
			<h6>Event Time</h6>
			<p><?= $event['time'] ?></p>
			<h6>Event date</h6>
			<p><?= $event['date'] ?></p>
			<h6>Event location</h6>
			<p><?= $event['location'] ?></p>
			<h6>Email</h6>
			<p><?= $event['email'] ?></p>
			<h6>Phone</h6>
			<p><?= $event['location'] ?></p>
			<h6>Open to</h6>
			<p><?= $event['open_to'] ?></p>
		</div>
	</main>
    <!-- Footer -->
    <?php include 'components/footer.php'; ?>
</body>

</html>