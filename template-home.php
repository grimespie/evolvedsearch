<?php
/*
 *
 * Template Name: Home Page
 *
 */

get_header();
?>

<div id="template-home">

    <div class="full-screen bg-darkblue">
            <img src="<?php print(get_template_directory_uri()); ?>/assets/img/home/BG.png" class="parallax fw pf" data-speed="5" />
            <img src="<?php print(get_template_directory_uri()); ?>/assets/img/home/7.png" class="parallax fw pf" data-speed="15" />
            <img src="<?php print(get_template_directory_uri()); ?>/assets/img/home/6.png" class="parallax fw pf" data-speed="25" />
            <img src="<?php print(get_template_directory_uri()); ?>/assets/img/home/5.png" class="parallax fw pf" data-speed="35" />
            <img src="<?php print(get_template_directory_uri()); ?>/assets/img/home/4.png" class="parallax fw pf" data-speed="45" />
            <img src="<?php print(get_template_directory_uri()); ?>/assets/img/home/3.png" class="parallax fw pf" data-speed="55" />
            <img src="<?php print(get_template_directory_uri()); ?>/assets/img/home/2.png" class="parallax fw pf" data-speed="65" />
            <img src="<?php print(get_template_directory_uri()); ?>/assets/img/home/1.png" class="fw pb z1" />
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col">
                                <div class="slick-slider large">

                                    <?php
                                    while(have_rows("header_slider")) {
                                        the_row();

                                        $Image = get_sub_field("image");
                                        ?>

                                            <div class="slick-slide">
                                                <div class="row">
                                                    <div class="col-10 offset-1 col-lg-5 offset-lg-0 order-lg-2">
                                                        <img src="<?php print($Image["sizes"]["sector-square"]); ?>" class="home-header-image" />
                                                    </div>
                                                    <div class="col-10 offset-1 col-lg-6 offset-lg-1 order-lg-1 text-left">
                                                        <div class="dt">
                                                            <div class="dc">
                                                                <h1><?php the_sub_field("title"); ?></h1>
                                                                <div class="content"><?php the_sub_field("copy"); ?></div>
                                                                <a href="<?php the_sub_field("button_link"); ?>" class="button"><?php the_sub_field("button_text"); ?></a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                    <?php
                                    }
                                    ?>

                                </div>
                            </div>
                        </div>
                    </div>
        </div>

        <div class="section bg-lightblue">
            <div class="container-fluid">
                <div class="row">
                    <div class="col text-center">
                        <div class="content large dark wow fadeInUp">
                            <?php the_field("logos_header"); ?>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-10 offset-1">
                        <div class="slick-slider five">

                            <?php
                            $Delay = 0;

                            while(have_rows("client_logos")) {
                                the_row();

                                $Delay += 0.1;
                                ?>

                                    <div class="slick-slide wow fadeInUp" data-wow-delay="<?php print($Delay); ?>s">
                                        <img src="<?php the_sub_field("logo"); ?>" />
                                    </div>

                            <?php
                            }
                            ?>

                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="section bg-image" style="background-image: url('<?php print(get_template_directory_uri()); ?>/assets/img/servicebg.jpg');">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12 col-lg-5">
                        <h2><?php the_field("services_header"); ?></h2>
                        <div class="content">
                            <?php the_field("services_copy"); ?>
                        </div>
                        <a href="<?php the_field("services_button_link"); ?>" class="button home-service-more"><?php the_field("services_button_text"); ?></a>
                    </div>
                    <div class="col-12 col-lg-6 offset-lg-1">
                        <div class="row">
                            <div class="col-12 col-lg-6">

                                <?php
                                $Counter = 0;

                                while(have_rows("services")) {
                                    the_row();
                                    $Counter++;
                                    ?>

                                    <a href="<?php the_sub_field("link"); ?>" class="button icon stack wow fadeInUp">
                                        <?php the_sub_field("icon"); ?>
                                        <?php the_sub_field("name"); ?>
                                    </a>

                                    <?php
                                    if($Counter == 3) {
                                    ?>

                                        </div>
                                        <div class="col-12 col-lg-6">

                                    <?php
                                    }
                                }
                                ?>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="section">
            <div class="container-fluid">
                <div class="row">
                    <div class="col text-center">
                        <div class="content large dark">
                            <?php the_field("awards_title"); ?>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-10 offset-1">
                        <div class="slick-slider five awards">

                            <?php
                            $Delay = 0;

                            while(have_rows("awards")) {
                                the_row();

                                $Delay += 0.1;
                                ?>

                                <div class="slick-slide wow fadeInUp" data-wow-delay="<?php print($Delay); ?>s">
                                    <img src="<?php the_sub_field("award"); ?>" />
                                </div>

                            <?php
                            }
                            ?>

                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col text-center">
                        <a href="<?php the_field("awards_button_link"); ?>" class="button btn-blue sec-element-margin-top"><?php the_field("awards_button_text"); ?></a>
                    </div>
                </div>
            </div>
        </div>

    <div class="section bg-image" style="background-image: url('<?php print(get_template_directory_uri()); ?>/assets/img/casestudybg.jpg');">
            <div class="container-fluid">
                <div class="row">
                    <div class="col text-center">
                        <div class="content large">
                            <p><?php the_field("case_study_slider_title"); ?></p>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-10 offset-1">
                        <div class="slick-slider four cs">

                            <?php
                            while(have_rows("case_studies_slider")) {
                                the_row();

                                $CaseStudy = get_sub_field("case_study");
                                $Stats     = array();
                                $Count     = 0;

                                while(have_rows("stats", $CaseStudy->ID)) {
                                    the_row();

                                    $Stats[$Count]["stat"]        = get_sub_field("stat");
                                    $Stats[$Count]["description"] = get_sub_field("description");
                                    $Count++;
                                }
                                ?>

                                <div class="slick-slide slide-0 wow fadeInUp">
                                    <img src="<?php the_field("client_logo", $CaseStudy->ID); ?>" />
                                </div>
                                <div class="slick-slide slide-1 wow fadeInUp" data-wow-delay="0.1s">
                                    <div class="stat"><?php print(setup_stat($Stats[0]["stat"])); ?></div>
                                    <p><?php print($Stats[0]["description"]); ?></p>
                                </div>
                                <div class="slick-slide slide-2 wow fadeInUp" data-wow-delay="0.2s">
                                    <div class="stat"><?php print(setup_stat($Stats[1]["stat"])); ?></div>
                                    <p><?php print($Stats[1]["description"]); ?></p>
                                </div>
                                <div class="slick-slide slide-3 wow fadeInUp" data-wow-delay="0.3s">
                                    <a href="<?php bloginfo("url"); ?>/work/" class="button">View our work</a>
                                </div>

                            <?php
                            }
                            ?>

                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="section bg-image bg-image-r2t no-bg-mobile" style="background-image: url('<?php print(get_template_directory_uri()); ?>/assets/img/aboutusbg.jpg');">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12 col-lg-5">
                        <h2><?php the_field("why_evolved_title"); ?></h2>
                        <div class="content dark">
                            <?php the_field("why_evolved_copy"); ?>
                        </div>
                        <a href="<?php the_field("why_evolved_button_link"); ?>" class="button btn-blue"><?php the_field("why_evolved_button_text"); ?></a>
                    </div>
                </div>
            </div>
        </div>

        <?php
        $LatestPostObj  = new WP_Query(array("post_status" => "publish", "post_type" => "post", "posts_per_page" => 1));
        $LatestPost     = $LatestPostObj->posts[0];
        $ProfilePicture = get_field("profile_picture", "user_" . $LatestPost->post_author);
        ?>

        <div class="section bg-blur-wrapper">
            <div class="bg-blur-container">
                <div class="bg-image bg-blur" style="background-image: url('<?php print(get_template_directory_uri()); ?>/assets/img/insightbg.jpg');"></div>
            </div>
            <div class="overlay"></div>
            <div class="container-fluid">
                <div class="row">
                    <div class="col-3 offset-1 col-lg-2 offset-lg-2">
                        <img class="circle wow fadeInLeft" src="<?php print($ProfilePicture["sizes"]["profile-picture"]); ?>" />
                    </div>
                    <div class="col-8 col-lg-6">
                        <div class="top-title orange">Latest Insight:</div>
                        <h2><?php print($LatestPost->post_title); ?></h2>
                        <div class="insight-details">
                            <div class="det"><i class="fal fa-edit"></i> <?php the_author_meta("display_name", $LatestPost->post_author); ?></div>
                            <div class="det"><i class="fal fa-calendar-alt"></i><?php print(date(get_option("date_format", strtotime($LatestPost->post_date_gmt)))); ?></div>
                        </div>
                        <a href="<?php print(get_permalink($LatestPost->ID)); ?>" class="button">View insight</a>
                    </div>
                </div>
            </div>
        </div>

        <?php get_template_part("templates/page", "form"); ?>

</div>

<?php
get_footer();
?>
