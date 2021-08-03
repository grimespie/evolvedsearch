<?php
/*
 *
 * Template Name: Services Page
 *
 */

get_header();

$HeaderImage = wp_get_attachment_image_src(get_post_thumbnail_id(get_the_ID()), "orig");
?>

<div id="template-services">

    <div class="section full-screen">
        <img src="<?php print(get_template_directory_uri()); ?>/assets/img/BG@2x-8.png" class="parallax fw pf" data-speed="5" />
        <img src="<?php print(get_template_directory_uri()); ?>/assets/img/7@2x-8.png" class="parallax fw pf" data-speed="15" />
        <img src="<?php print(get_template_directory_uri()); ?>/assets/img/6@2x-8.png" class="parallax fw pf" data-speed="25" />
        <img src="<?php print(get_template_directory_uri()); ?>/assets/img/5@2x-8.png" class="parallax fw pf" data-speed="35" />
        <img src="<?php print(get_template_directory_uri()); ?>/assets/img/4@2x-8.png" class="parallax fw pf" data-speed="45" />
        <img src="<?php print(get_template_directory_uri()); ?>/assets/img/3@2x-8.png" class="parallax fw pf" data-speed="55" />
        <img src="<?php print(get_template_directory_uri()); ?>/assets/img/2@2x-8.png" class="parallax fw pf" data-speed="65" />
        <img src="<?php print(get_template_directory_uri()); ?>/assets/img/1@2x-8.png" class="fw pb z1" />
        <div class="dt pf pa">
            <div class="dc">
                <div class="container-fluid parallax" data-speed="35">
                    <div class="row">
                        <div class="col text-center">
                            <div class="header-label "><?php the_title(); ?></div>
                            <h1><?php the_field("headline"); ?></h1>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12 col-lg-6 offset-lg-3 text-center">
                            <div class="content">
                                <?php the_content(); ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="section bg-darkblue">
        <img src="<?php print(get_template_directory_uri()); ?>/assets/img/services-bg1.png" alt="Services BG 1" class="services-bg-1" />
        <img src="<?php print(get_template_directory_uri()); ?>/assets/img/services-bg2.png" alt="Services BG 2" class="services-bg-2" />
        <img src="<?php print(get_template_directory_uri()); ?>/assets/img/services-arrowcircle.svg" alt="Services Arrows Circle" class="services-bg-3 rotate-this" data-speed="0.1" />
        <div class="container-fluid">
            <div class="row">
                <div class="col-12 col-lg-6 offset-lg-3 text-center">
                    <h2><?php the_field("approach_title"); ?></h2>
                    <div class="content">
                        <?php the_field("approach_copy"); ?>
                    </div>
                </div>
            </div>
            <div class="approach-sections">

                <?php
                $Right         = false;
                $Counter       = 0;
                $TotalApproach = count(get_field("approach"));
                $LastNorm      = $TotalApproach - 1;
    
                while(have_rows("approach")) {
                    the_row();

                    $Counter++;
    
                    $Right = !$Right;
    
                    $Col = "";
    
                    if($Right) {
                        $Col = "col-12 col-lg-5 offset-lg-6 text-left";
                    }
                    else {
                        $Col = "col-12 col-lg-5 offset-lg-1 left-block text-right";
                    }

                    if($Counter == $TotalApproach) {
                        $Col = "col-12 col-lg-6 offset-lg-3 text-center last-item";
                    }
                    ?>
    
                    <div class="row">
                        <div class="<?php print($Col); ?>">
                            <div class="approach-block <?php if($LastNorm == $Counter) { print('angle-change'); } ?> wow fadeInUp">
                                <div class="numbered-circle">
                                    <?php
                                    if($Counter == $TotalApproach) {
                                    ?>

                                        <img src="<?php the_field("last_approach_icon"); ?>" class="approach-last-icon" />

                                    <?php
                                    }
                                    else {
                                        print($Counter);
                                    }
                                    ?>
                                </div>
                                <div class="line"></div>
                                <h3><?php the_sub_field("title"); ?></h3>
                                <div class="content">
                                    <?php the_sub_field("copy"); ?>
                                </div>
                            </div>
                        </div>
                    </div>
    
                <?php
                }
                ?>

            </div>
            <div class="row">
                <div class="col text-center">
                    <h2 class="nm"><?php the_field("services_title"); ?></h2>
                </div>
            </div>
        </div>
    </div>

    <div class="section bg-lightgrey full-screen" id="services-panel-wrapper">
        <img src="<?php print(get_template_directory_uri()); ?>/assets/img/arrowright.svg" class="services-up-arrow" />
        <img src="<?php print(get_template_directory_uri()); ?>/assets/img/arrowright.svg" class="services-down-arrow" />
        <div class="dt">
        <div class="dc">
        <div class="container-fluid large">
            <div class="row">
                <div class="col-4 col-lg-2">

                    <?php
                    if(have_rows("services")) {
                        $Counter = 0;

                        while(have_rows("services")) {
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
                <div class="col-8 col-lg-10">

                    <?php
                    if(have_rows("services")) {
                        $Counter = 0;

                        while(have_rows("services")) {
                            the_row();

                            $Counter++;
                            ?>

                                <div class="service-panel" id="service-panel-<?php print($Counter); ?>">
                                    <div id="anchor-<?php the_sub_field("anchor_link_tag"); ?>" data-bullet="service-bullet-<?php print($Counter); ?>" data-panel="service-panel-<?php print($Counter); ?>"></div>
                                    <div class="row">
                                        <div class="col-12 col-lg-6">
                                            <h2><?php the_sub_field("title"); ?></h2>
                                            <div class="content">
                                                <?php the_sub_field("copy"); ?>
                                            </div>
                                        </div>
                                        <div class="col-0 col-lg-6">
                                            <?php the_sub_field("icon"); ?>
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
    </div>

    <div class="section">
        <div class="container-fluid">
            <div class="row">
                <div class="col text-center">
                    <h2><?php the_field("case_studies_title") ?></h2>
                </div>
            </div>
            <div class="row">

                <?php
                $Delay = 0;

                if(have_rows("case_studies")) {
                    while(have_rows("case_studies")) {
                        the_row();

                        $Delay += 0.1;

                        $CaseStudy   = get_sub_field("case_study");
                        $HeaderImage = wp_get_attachment_image_src(get_post_thumbnail_id($CaseStudy->ID), "case-study-tile");
                        ?>

                        <div class="col-6 col-lg-3">
                            <a href="<?php print(get_permalink($CaseStudy->ID)); ?>">
                                <div class="case-study-tile wow fadeInUp" data-wow-delay="<?php print($Delay); ?>s">
                                    <img src="<?php print($HeaderImage[0]); ?>" alt="<?php print(get_field("company_name", $CaseStudy->ID)); ?>" />
                                    <h3><?php print(get_field("company_name", $CaseStudy->ID)); ?></h3>
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

    <div class="section bg-darkblue">
        <div class="container-fluid">
            <div class="row">
                <div class="col-8 offset-2">
                    <div class="slick-slider quotes">

                        <?php
                        while(have_rows("quotes")) {
                            the_row();
                            ?>

                                <div class="slick-slide">
                                    <div class="quote-mark">&ldquo;</div>
                                    <?php the_sub_field("quote"); ?>
                                    <div class="client-info"><?php the_sub_field("client_name"); ?> <span></span> <?php the_sub_field("client_role"); ?></div>
                                    <div class="company-info"><?php the_sub_field("client_company"); ?></div>
                                    <div class="company-logo"><img src="<?php the_sub_field("logo"); ?>" alt="<?php the_sub_field("client_company"); ?>" /></div>
                                </div>

                        <?php
                        }
                        ?>

                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="section">
        <div class="container-fluid">
            <div class="row">
                <div class="col text-center">
                    <h2><?php the_field("insights_title"); ?></h2>
                </div>
            </div>
            <div class="row">

                <?php
                $Delay = 0;

                if(have_rows("insights")) {
                    while(have_rows("insights")) {
                        the_row();

                        $Delay += 0.1;

                        $CaseStudy   = get_sub_field("insight");
                        $HeaderImage = wp_get_attachment_image_src(get_post_thumbnail_id($CaseStudy->ID), "case-study-tile");
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
