<?php
/*
 *
 * Template Name: Expertise Page
 *
 */

get_header();

$HeaderImage = wp_get_attachment_image_src(get_post_thumbnail_id(get_the_ID()), "orig");
?>

<div id="template-expertise">

    <div class="section full-screen bg-darkblue bg-image" style="background-image: url('<?php print($HeaderImage[0]); ?>');">
                <div class="container-fluid" data-speed="35">
                    <div class="row">
                        <div class="col text-center">
                            <div class="header-label "><?php yoast_breadcrumb(); ?></div>
                            <h1><?php the_field("headline"); ?></h1>
                            <h2><?php the_field("sub_headline"); ?></h2>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12 col-lg-6 offset-lg-3 text-center">
                            <div class="content">
                                <?php the_content(); ?>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-10 offset-1">
                            <div class="slick-slider five awards">

                                <?php
                                $Delay = 0;

                                while(have_rows("awards", get_option("page_on_front"))) {
                                    the_row();

                                    $Delay += 0.1;
                                    ?>

                                    <div class="slick-slide wow fadeInUp" data-wow-delay="<?php print($Delay); ?>s">
                                        <img src="<?php the_sub_field('award'); ?>" />
                                    </div>

                                <?php
                                }
                                ?>

                            </div>
                        </div>
                    </div>
                </div>
    </div>

    <div class="section bg-lightblue no-padding-bottom">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12 col-lg-6 offset-lg-3 text-center">
                    <h2><?php the_field("sectors_title"); ?></h2>
                    <div class="content light">
                        <?php the_field("sectors_copy"); ?>
                    </div>
                </div>
            </div>
        </div>
        <div id="sectors-wrapper">

            <?php
            while(have_rows("sectors")) {
                the_row();

                $BGImage = get_sub_field("bg_image");
                $Sector  = get_sub_field("sector");
                ?>

                <div class="sector-square">
                    <img src="<?php print($BGImage["sizes"]["sector-square"]); ?>" alt="<?php print($Sector->post_title); ?>" />
                    <div class="dt">
                        <div class="dc">
                            <h3><?php print($Sector->post_title); ?></h3>
                             <div class="orig">
                                 <div class="view-hover">+</div>
                             </div>
                             <div class="hover">
                                 <div class="content light">
                                     <?php the_sub_field("copy"); ?>
                                 </div>
                                 <a href="<?php print(get_permalink($Sector->ID)); ?>" class="button">Find out more</a>
                             </div>
                        </div>
                    </div>
                </div>

            <?php
            }
            ?>

        </div>
    </div>

    <div class="section bg-darkblue">
        <div class="container-fluid">
            <div class="row">
                <div class="col text-center">
                    <h2>Related insights:</h2>
                </div>
            </div>
            <div class="row justify-content-lg-center">

                <?php
                $Delay = 0;

                if(have_rows("insights")) {
                    while(have_rows("insights")) {
                        the_row();

                        $CaseStudy   = get_sub_field("insight");
                        $HeaderImage = wp_get_attachment_image_src(get_post_thumbnail_id($CaseStudy->ID), "insights-main-square");
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
