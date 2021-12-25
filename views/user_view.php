<?php

use \RedBeanPHP\R as R;

if (!is_null($user_id)) {
    $profile = R::load('profiles', $user_id);
    
    if ($profile->id !== 0) {
        $profile->age = date_diff(new DateTime($profile->birthdate), new DateTime())->format('%y years old');
        $profile->birthdate = (new DateTime($profile->birthdate))->format('F jS, Y');
    } else {
        abort(404);
    }
}

?>
<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title><?= $profile->name ?> - EventHut</title>
  
  <link rel="stylesheet" type="text/css" href="/css/main.css">
</head>

<body>
    <!-- Navbar -->
    <?php include 'components/navbar.php'; ?>
    <!-- Main -->
    <main class="container col-12 col-md-8 offset-md-2">
        <?php if ($profile->id !== 0) { ?>
        <section class="section about-section gray-bg" id="about">
            <div class="container">
                <div class="row align-items-center flex-row-reverse">
                    <div class="col-lg-6">
                        <div class="about-text go-to">
                            <h3 class="dark-color"><?= $profile->name ?></h3>
                            <p><?= $profile->biography ?></p>
                            <div class="row about-list">
                                <div class="col-md-6">
                                    <?php if (!is_null($profile->birthdate)) { ?>
                                    <div class="media">
                                        <label>Birthday</label>
                                        <p><?= $profile->birthdate ?></p>
                                    </div>
                                    <div class="media">
                                        <label>Age</label>
                                        <p><?= $profile->age ?></p>
                                    </div>
                                    <?php } ?>
                                    <?php if (!is_null($profile->location)) { ?>
                                    <div class="media">
                                        <label>Residence</label>
                                        <p><?= $profile->location ?></p>
                                    </div>
                                    <?php } ?>
                                </div>
                                <div class="col-md-6">
                                    <?php if (!is_null($profile->email)) { ?>
                                    <div class="media">
                                        <label>E-mail</label>
                                        <p><?= $profile->email ?></p>
                                    </div>
                                    <?php } ?>
                                    <?php if (!is_null($profile->phone)) { ?>
                                    <div class="media">
                                        <label>Phone</label>
                                        <p><?= $profile->phone ?></p>
                                    </div>
                                    <?php } ?>
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
            </div>
        </section>
        <?php } else { ?>
        <div class="container text-center mt-5">
            <h1>User not found</h1>
        </div>
        <?php } ?>
    </main>
    <!-- Footer -->
    <?php include 'components/footer.php'; ?>
</body>

</html>