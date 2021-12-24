<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>TEMPLATE - EventHut</title>
  
  <link rel="stylesheet" type="text/css" href="/css/main.css">
</head>

<body>
  <!-- Navbar -->
  <?php include '../components/navbar.php'; ?>
  <!-- Main -->
  <main class="container col-12 col-md-8 offset-md-2 bg-body border px-4 py-2">
  <section class="section about-section gray-bg" id="about">
            <div class="container">
                <div class="row align-items-center flex-row-reverse">
                    <div class="col-lg-6">
                        <div class="about-text go-to">
                            <h3 class="dark-color"><?= $event['User Name']; ?></h3>
                            <h6 class="theme-color lead"><?= $event['Bio']; ?></h6>
                            <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat</p>
                            <div class="row about-list">
                                <div class="col-md-6">
                                    <div class="media">
                                        <label>Birthday</label>
                                        <p>4th april 1998</p>
                                    </div>
                                    <div class="media">
                                        <label>Age</label>
                                        <p>22 Yr</p>
                                    </div>
                                    <div class="media">
                                        <label>Residence</label>
                                        <p>Canada</p>
                                    </div>
                                    <div class="media">
                                        <label>Address</label>
                                        <p>California, USA</p>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="media">
                                        <label>E-mail</label>
                                        <p>info@domain.com</p>
                                    </div>
                                    <div class="media">
                                        <label>Phone</label>
                                        <p>820-885-3321</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="about-avatar">
                            <img src="https://bootdey.com/img/Content/avatar/avatar7.png" title="" alt="">
                        </div>
                    </div>
                </div>
                <div class="counter">
                    <div class="row">
                        <div class="col-6 col-lg-3">
                            <div class="count-data text-center">
                                <h6 class="count h2" data-to="500" data-speed="500"><?= $event['500']; ?></h6>
                                <p class="m-0px font-w-600">Upcoming Events</p>
                            </div>
                        </div>
                        <div class="col-6 col-lg-3">
                            <div class="count-data text-center">
                                <h6 class="count h2" data-to="150" data-speed="150"><?= $event['150']; ?></h6>
                                <p class="m-0px font-w-600">Registered Events</p>
                            </div>
                        </div>
                        <div class="col-6 col-lg-3">
                            <div class="count-data text-center">
                                <h6 class="count h2" data-to="850" data-speed="850"><?= $event['200']; ?></h6>
                                <p class="m-0px font-w-600">Participated Events</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>
</body>

</html>