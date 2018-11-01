<?php

namespace Anax\View;

/**
 * A layout rendering views in defined regions.
 */

// Show incoming variables and view helper functions
//echo showEnvironment(get_defined_vars(), get_defined_functions());

$title = ($title ?? "No title") . ($baseTitle ?? " | No base title defined");

?>
<!DOCTYPE html>
<html lang="SV">

<head>
    <title><?= $title ?></title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

    <link href="https://fonts.googleapis.com/css?family=Montserrat|Open+Sans:300,400,600,700,800" rel="stylesheet">

    <link rel="icon" type="image/png" sizes="32x32" href="img/favicon-32x32.png">
<link rel="icon" type="image/png" sizes="16x16" href="img/favicon-16x16.png">

    <?php if (isset($stylesheets)) : ?>
        <?php foreach ($stylesheets as $stylesheet) : ?>
            <link rel="stylesheet" type="text/css" href="<?= asset($stylesheet) ?>">
        <?php endforeach; ?>
    <?php endif; ?>

</head>

<body>
    <!-- banner -->
    <div class="banner_top" id="home">
            <div class="wrapper_top_w3layouts">
                <div class="header_agileits">
                    <div class="logo">
                        <h1><a class="navbar-brand" href="index.php"><span>CSlim</span> <i>Shoes</i></a></h1>
                    </div>
                    <div class="overlay overlay-contentpush">
                        <button type="button" class="overlay-close"><i class="fa fa-times" aria-hidden="true"></i></button>
                        <nav>
                            <ul>
                                <?php renderRegion("navbar") ?>
                            </ul>
                        </nav>
                </div>
                <div class="mobile-nav-button">
                    <button id="trigger-overlay" type="button"><i class="fa fa-bars" aria-hidden="true"></i></button>
                </div>
                <?php if ($app->session->get("login") != true) : ?>
                <div class="mobile-user-button">
                    <a href="login"><button id="trigger-overlay" type="button"><i class="fa fa-user" aria-hidden="true"></i></button></a>
                </div>
                <?php else : ?>
                <div class="mobile-user-button">
                    <a href="logout"><button id="trigger-overlay" type="button"><i class="fa fa-lock" aria-hidden="true"></i></button></a>
                </div>
                <?php endif; ?>
                <div class="clearfix"></div>
            </div>

<!-- main -->
<?php if (regionHasContent("main")) : ?>
<div class="outer-wrap outer-wrap-main">
    <div class="inner-wrap inner-wrap-main">
        <div class="row">
            <main class="wrap-main">
                <?php renderRegion("main") ?>
            </main>
        </div>
    </div>
</div>
<?php endif; ?>

<?php if (isset($stylesheets)) : ?>
    <?php foreach ($javascripts as $javascript) : ?>
    <script async src="<?= asset($javascript) ?>"></script>
    <?php endforeach; ?>
<?php endif; ?>

<!-- footer -->
<?php if (regionHasContent("footer")) : ?>
<div class="outer-wrap outer-wrap-footer">
    <div class="inner-wrap inner-wrap-footer">
        <div class="row">
            <div class="wrap-footer">
                <?php renderRegion("footer") ?>
            </div>
        </div>
    </div>
</div>
<?php endif; ?>

</body>
</html>
