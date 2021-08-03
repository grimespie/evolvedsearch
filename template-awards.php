<?php
/*
 *
 * Template Name: Awards Page
 *
 */

get_header();

$HeaderImage = wp_get_attachment_image_src(get_post_thumbnail_id(get_the_ID()), "orig");
?>

<div id="template-awards">

    <div class="section full-screen bg-darkblue bg-image bg-image-rh bg-no-mobile" style="background-image: url('<?php print($HeaderImage[0]); ?>');">
        <img src="<?php print(get_template_directory_uri()); ?>/assets/img/services-bg1.png" class="awards-header-1" />
        <div class="container-fluid">
            <div class="row">
                <div class="col-12 col-lg-4 text-center">
                    <div class="header-label "><?php yoast_breadcrumb(); ?></div>
                    <h1><?php the_field("headline"); ?></h1>
                    <div class="content">
                        <?php the_content(); ?>
                    </div>
                </div>
                <div class="col-7 offset-1">
                </div>
            </div>
        </div>
    </div>

    <div class="section">
        <img src="<?php print(get_template_directory_uri()); ?>/assets/img/awards_bg2.png" class="awards-bg-1" />
        <img src="<?php print(get_template_directory_uri()); ?>/assets/img/awards_bg3.png" class="awards-bg-2" />
        <div class="container-fluid">
            <div class="row">
                <div class="col-12 col-lg-6 offset-lg-3">

                    <?php
                    while(have_rows("awards")) {
                        the_row();
                        ?>

                        <div class="award-year-header">
                            <div class="awards-circle"></div>
                            <div class="awards-year"><?php the_sub_field("year"); ?></div>
                        </div>

                        <?php
                        while(have_rows("award")) {
                            the_row();
                            ?>

                            <div class="award-text"><?php the_sub_field("award_name"); ?></div>

                        <?php
                        }
                    }
                    ?>

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

    <?php get_template_part("templates/page", "instagram"); ?>

    <?php get_template_part("templates/page", "form"); ?>

</div>

<?php
get_footer();
?>
