<!DOCTYPE html>
<!--[if IE 7]>
<html class="ie ie7" <?php language_attributes(); ?>>
<![endif]-->
<!--[if IE 8]>
<html class="ie ie8" <?php language_attributes(); ?>>
<![endif]-->
<!--[if !(IE 7) | !(IE 8) ]><!-->
<html <?php language_attributes(); ?>>
<!--<![endif]-->
    <head>
        <title><?php wp_title(""); ?></title>
        <meta charset="<?php bloginfo("charset"); ?>">
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
        <link rel="icon" type="image/png" href="<?php print(get_template_directory_uri()); ?>/assets/img/favicon.png" />
        <link rel="profile" href="http://gmpg.org/xfn/11">
        <link rel="pingback" href="<?php bloginfo("pingback_url"); ?>">
        <link rel="stylesheet" href="https://use.typekit.net/psw3yyr.css">
        <script src="https://kit.fontawesome.com/092970df4a.js" crossorigin="anonymous"></script>

        <?php wp_head(); ?>

        <!-- Google Tag Manager -->
        <script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
        new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
        j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
        'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
        })(window,document,'script','dataLayer','GTM-KXRQJGN');</script>
        <!-- End Google Tag Manager -->

        <meta name="google-site-verification" content="aYegsOyTvbVup78x0iC5W3skiRkBMLrynecib5bhz1I"/>
    </head>
    <body <?php body_class(); ?>>
        <header class="solid">
            <div class="container-fluid">
                <div class="row">
                    <div class="col">
                        <a href="<?php bloginfo("url"); ?>">
                            <img src="<?php print(get_template_directory_uri()); ?>/assets/img/logo.svg" id="header-logo" />
                        </a>
                        <i class="fal fa-bars"></i>
                        <div class="header-phone"><i class="fas fa-phone"></i><?php the_field("phone_number", "options"); ?></div>

                        <?php
                        wp_nav_menu(array(
                                          "menu" => "Primary Menu",
                                          "container" => "nav"
                                         ));
                        ?>

                    </div>
                </div>
            </div>
        </header>
