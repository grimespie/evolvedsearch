<?php
/*
 *
 * Template Name: Sector Page
 *
 */

get_header();

$HeaderImage = wp_get_attachment_image_src(get_post_thumbnail_id(get_the_ID()), "orig");
?>

<div id="template-sector">

    <div class="section large-padding-bottom bg-darkblue bg-image" style="background-image: url('<?php print($HeaderImage[0]); ?>');">
        <img src="<?php print(get_template_directory_uri()); ?>/assets/img/header_mask.png" class="fs-mask-bottom" alt="About Mask Header"/>
        <div class="container-fluid">
            <div class="row">
                <div class="col text-center">
                    <div class="header-label "><?php yoast_breadcrumb(); ?></div>
                    <h1><?php the_title(); ?></h1>
                </div>
            </div>
        </div>
    </div>

    <div class="section small-padding-top">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12 col-lg-6 offset-lg-3 text-center">
                    <h2><?php the_field("section_1_title"); ?></h2>
                    <div class="content">
                        <?php the_field("section_1_copy"); ?>
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

    <div class="section bg-image" style="background-image: url('<?php print($HeaderImage[0]); ?>');">
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
                            while(have_rows("case_studies")) {
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
                                    <a href="<?php print(get_permalink($CaseStudy->ID)); ?>" class="button">View our work</a>
                                </div>

                            <?php
                            }
                            ?>

                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="section bg-image bg-image-r2t no-bg-mobile" style="background-image: url('<?php the_field("section_2_image"); ?>');">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12 col-lg-5">
                    <h2><?php the_field("section_2_title"); ?></h2>
                    <div class="content dark">
                        <?php the_field("section_2_copy"); ?>
                    </div>
                    <?php /* <a href="<?php the_field("section_2_button_link"); ?>" class="button btn-blue"><?php the_field("section_2_button_text"); ?></a> */ ?>
                </div>
            </div>
        </div>
    </div>

    <div class="section bg-darkblue">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12 col-lg-5">
                    <h2><?php the_field("approach_title"); ?></h2>
                    <div class="content">
                        <?php the_field("approach_copy"); ?>
                    </div>
                    <a href="<?php the_field("approach_button_link"); ?>" class="button btn-blue"><?php the_field("approach_button_text"); ?></a>
                </div>
                <div class="col-12 col-lg-7">
                    <div class="approach-icons">
                        <img src="<?php print(get_template_directory_uri()); ?>/assets/img/services-bg1.png" class="sector-approach-1" />
                        <div class="approach-dotted-line"></div>
                        <div class="approach-icons-inner">

                            <?php
                            $ServicesPage = get_option("page_on_front");
                            $Count        = 0;
                            $FirstIcon = "";

                            while(have_rows("services", $ServicesPage)) {
                                the_row();

                                $Count++;

                                if($Count == 1) {
                                    $FirstIcon["icon"] = get_sub_field("icon");
                                    $FirstIcon["name"] = get_sub_field("name");
                                    $FirstIcon["link"] = get_sub_field("link");
                                }
                                ?>

                                    <div class="icon icon-<?php print($Count - 1); ?>">

                                        <?php
                                        if($Count == 1) {
                                        ?>

                                            <a href="<?php the_sub_field("link"); ?>"><?php the_sub_field("icon"); ?></a>
                                            <h2>Search</h2>

                                        <?php
                                        }
                                        else {
                                        ?>

                                            <p><?php the_sub_field("name"); ?></p>
                                            <a href="<?php the_sub_field("link"); ?>"><?php the_sub_field("icon"); ?></a>

                                        <?php
                                        }
                                        ?>

                                    </div>

                            <?php
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
                    <h2><?php the_field("related_insights_title"); ?></h2>
                </div>
            </div>
            <div class="row justify-content-lg-center">

                <?php
                $Delay     = 0;
                $Counter   = 0;

                if(have_rows("related_insights")) {
                    while(have_rows("related_insights")) {
                        the_row();

                        $CaseStudy   = get_sub_field("insight");
                        $HeaderImage = wp_get_attachment_image_src(get_post_thumbnail_id($CaseStudy->ID), "case-study-tile");
                        $Delay       += 0.1;
                        ?>

                        <div class="col-6 col-lg-3">
                            <a href="<?php print(get_permalink($CaseStudy->ID)); ?>">
                                <div class="case-study-tile wow fadeInUp" data-wow-delay="<?php print($Delay); ?>s">
                                    <img src="<?php print($HeaderImage[0]); ?>" alt="<?php print(get_field("company_name", $CaseStudy->ID)); ?>" />
                                    <h3><?php print($CaseStudy->post_title); ?></h3>
                                </div>
                            </a>
                        </div>

                    <?php
                    }
                }
                ?>

            </div>
        </div>
    </div>

    <?php get_template_part("templates/page", "form"); ?>

</div>

<?php
get_footer();
?>
