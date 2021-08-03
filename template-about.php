<?php
/*
 *
 * Template Name: About Page
 *
 */

get_header();

$HeaderImage = wp_get_attachment_image_src(get_post_thumbnail_id(get_the_ID()), "orig");
?>

<div id="template-about">

    <div class="section full-screen bg-darkblue bg-image" style="background-image: url('<?php print($HeaderImage[0]); ?>');">
        <img src="<?php print(get_template_directory_uri()); ?>/assets/img/header_mask.png" class="fs-mask-bottom" alt="About Mask Header"/>
        <div class="dt pa">
            <div class="dc">
                <div class="container-fluid" data-speed="35">
                    <div class="row">
                        <div class="col text-center">
                            <div class="header-label "><?php yoast_breadcrumb(); ?></div>
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

    <div class="section small-padding-top bg-image" id="about-bg-1" style="background-image: url('<?php print(get_template_directory_uri()); ?>/assets/img/about-bg2.png');">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12 col-lg-8 offset-lg-2 text-center">
                    <h2><?php the_field("section_1_title"); ?></h2>
                    <div class="content">
                        <?php the_field("section_1_copy"); ?>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="section bg-darkblue">
        <div class="container-fluid">
            <div class="row">
                <div class="col text-center">
                    <div class="content large">
                        <p><?php the_field("awards_title"); ?></p>
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
            <div class="row">
                <div class="col text-center">
                    <a href="<?php the_field("awards_button_link"); ?>" class="button sec-element-margin-top"><?php the_field("awards_button_text"); ?></a>
                </div>
            </div>
        </div>
    </div>

    <img src="<?php the_field("section_3_image"); ?>" class="full-width mobile" />

    <div class="section bg-image-left-half bg-no-mobile" style="background-image: url('<?php the_field("section_3_image"); ?>');">
        <img src="<?php print(get_template_directory_uri()); ?>/assets/img/about-services-line.png" alt="About Line" class="about-section-3-line" />
        <div class="container-fluid">
            <div class="row">
                <div class="col-12 col-lg-6">
                </div>
                <div class="col-12 col-lg-5 offset-lg-1 text-center">
                    <h2><?php the_field("section_3_title"); ?></h2>
                    <div class="content">
                        <?php the_field("section_3_copy"); ?>
                    </div>
                    <a href="<?php the_field("section_3_button_link"); ?>" class="button btn-blue sec-element-margin-top"><?php the_field("section_3_button_text"); ?></a>
                </div>
            </div>
        </div>
    </div>

    <div class="section bg-darkblue no-padding-bottom">
        <div class="container-fluid">
            <div class="row">
                <div class="col text-center">
                    <h2>The Evolved story so far:</h2>
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <div id="timeline">
                        <div class="timeline-inner">

                            <?php
                            $First   = true;
                            $Counter = 0;

                            while(have_rows("timeline")) {
                                the_row();

                                $Image = get_sub_field("image");
                                $Counter++;
                                ?>

                                <div class="entry <?php if($First) { print('active'); } ?> entry-<?php print($Counter); ?>" data-entry="<?php print($Counter); ?>">
                                    <div class="circle"></div>
                                    <div class="image"><img src="<?php print($Image["sizes"]["insights-main-square"]); ?>" /></div>
                                    <div class="line"></div>
                                    <div class="date"><?php the_sub_field("date"); ?></div>
                                    <div class="title"><?php the_sub_field("title"); ?></div>
                                    <div class="content">
                                        <?php the_sub_field("copy"); ?>
                                        <div class="slick-left-arrow slick-arrow"><img src="<?php print(get_template_directory_uri()); ?>/assets/img/arrowleft.svg"></div>
                                        <div class="slick-right-arrow slick-arrow"><img src="<?php print(get_template_directory_uri()); ?>/assets/img/arrowright.svg"></div>
                                    </div>
                                </div>

                                <?php
                                $First = false;
                            }
                            ?>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="about-divider">
        <img src="<?php print(get_template_directory_uri()); ?>/assets/img/about_divider.png" />
    </div>

    <div class="section bg-lightblue">
        <div class="container-fluid">
            <div class="row">
                <div class="col text-center">
                    <h2><?php the_field("section_4_title"); ?></h2>
                </div>
            </div>
            <div class="row leadership-wrapper same-height">

                <?php
                $Delay = 0;

                while(have_rows("leaders")) {
                    the_row();

                    $Delay += 0.1;
                    ?>

                    <div class="col-12 col-lg-4 text-center">
                        <div class="leadership-tile wow fadeInUp" data-wow-delay="<?php print($Delay); ?>s">
                            <img src="<?php the_sub_field("image"); ?>" alt="<?php the_sub_field("name"); ?>" />
                            <div class="persons-name"><?php the_sub_field("name"); ?></div>
                            <div class="persons-role"><?php the_sub_field("role"); ?></div>
                            <div class="content">
                                <?php the_sub_field("copy"); ?>
                            </div>
                        </div>
                    </div>

                <?php
                }
                ?>

            </div>
        </div>
    </div>

    <div class="section bg-darkblue">
        <div class="container-fluid">
            <div class="row">
                <div class="col text-center">
                    <h2><?php the_field("cta_title"); ?></h2>
                </div>
            </div>
            <div class="row">
                <div class="col text-center multi-buttons">

                    <?php
                    while(have_rows("cta_buttons")) {
                        the_row();
                        ?>

                        <a href="<?php the_sub_field("button_link"); ?>" class="button"><?php the_sub_field("button_text"); ?></a>

                    <?php
                    }
                    ?>

                </div>
            </div>
        </div>
    </div>

    <?php get_template_part("templates/page", "form"); ?>

</div>

<?php
get_footer();
?>
