<?php
/*
 *
 * Template Name: Service Page
 *
 */

get_header();

$HeaderImage = wp_get_attachment_image_src(get_post_thumbnail_id(get_the_ID()), "orig");
?>

<div id="template-service">

    <div class="section full-screen bg-darkblue bg-image" style="background-image: url('<?php print($HeaderImage[0]); ?>');">
        <div class="dt">
            <div class="dc">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-12 col-lg-5 offset-lg-1">
                            <div class="header-label"><?php yoast_breadcrumb(); ?></div>
                            <h1><?php the_title(); ?></h1>
                            <div class="content">
                                <?php the_content(); ?>
                            </div>
                        </div>
                        <div class="col-12 col-lg-5 text-center service-header-icon">
                            <?php the_field("header_icon"); ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="section bg-lightblue bg-image bg-image-rhalf" style="background-image: url('<?php the_field("top_section_image"); ?>');">
        <img src="<?php the_field("top_section_image"); ?>" class="mobile replace" alt="<?php the_field("top_section_title"); ?>" />
        <div class="container-fluid">
            <div class="row">
                <div class="col-12 col-lg-5">
                    <h2><?php the_field("top_section_title"); ?></h2>
                    <div claSS="content">
                        <?php the_field("top_section_copy"); ?>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div id="service-how-section" class="section bg-darkblue">
        <div class="container-fluid">
            <div class="row">
                <div class="col-4 offset-lg-1">
                    <h2><?php the_field("how_section_title"); ?></h2>

                    <?php
                    if(have_rows("how_section_items")) {
                        $Counter = 0;

                        while(have_rows("how_section_items")) {
                            the_row();

                            $Counter++;
                            ?>

                                <div class="service-bullet service-bullet-<?php print($Counter); ?> <?php if($Counter == 1) { print('active'); } ?>" data-panel="<?php print($Counter); ?>">
                                    <div class="service-connector"></div>
                                    <div class="service-circle"></div>
                                    <div class="service-name"><?php the_sub_field("title"); ?></div>
                                </div>

                        <?php
                        }
                    }
                    ?>

                </div>
                <div class="col-8 col-lg-7">
                    <div class="how-section-icons">
                        <img src="<?php print(get_template_directory_uri()); ?>/assets/img/services-bg1.png" class="service-section-how" />

                    <?php
                    if(have_rows("how_section_items")) {
                        $Counter = 0;

                        while(have_rows("how_section_items")) {
                            the_row();

                            $Counter++;
                            ?>

                                <div  data-panel="<?php print($Counter); ?>" class="icon icon-<?php print($Counter); ?> <?php if($Counter == 1) { print("active"); } ?>">
                                    <?php the_sub_field("icon"); ?>
                                </div>
                                <div class="service-panel" id="service-panel-<?php print($Counter); ?>">
                                    <div data-bullet="service-bullet-<?php print($Counter); ?>" data-panel="service-panel-<?php print($Counter); ?>"></div>
                                    <div class="row">
                                        <div class="col-12 col-lg-9">
                                            <h3><?php the_sub_field("title"); ?></h3>
                                            <div class="content">
                                                <?php the_sub_field("copy"); ?>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                        <?php
                        }
                    }
                    ?>

                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="section bg-image bg-image-r2t no-bg-mobile" style="background-image: url('<?php the_field("bottom_section_image"); ?>');">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12 col-lg-5">
                    <h2><?php the_field("bottom_section_title"); ?></h2>
                    <div class="content dark">
                        <?php the_field("bottom_section_copy"); ?>
                    </div>
                    <a href="<?php the_field("bottom_section_button_link"); ?>" class="button btn-blue"><?php the_field("bottom_section_button_text"); ?></a>
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

    <?php get_template_part("templates/page", "form"); ?>

</div>

<?php
get_footer();
?>
