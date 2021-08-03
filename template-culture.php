<?php
/*
 *
 * Template Name: Culture Page
 *
 */

get_header();

$HeaderImage = wp_get_attachment_image_src(get_post_thumbnail_id(get_the_ID()), "orig");
?>

<div id="template-culture">

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

    <div class="section bg-image" style="background-image: url('<?php the_field("section_1_bg_image"); ?>');">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12 col-lg-5">
                    <h2 class="dark"><?php the_field("section_1_title"); ?></h2>
                    <div class="content dark">
                        <?php the_field("section_1_copy"); ?>
                    </div>
                </div>
                <div class="col-10 offset-1 col-lg-5 offset-lg-2">
                    <div class="slick-slider quotes dark">

                        <?php
                        $StaffQuotes = get_field("staff_quotes");
                        shuffle($StaffQuotes);

                        foreach($StaffQuotes as $quote) {
                            $Image = $quote["image"];
                            ?>

                                <div class="slick-slide">
                                    <div class="quote-mark">&ldquo;</div>
                                    <?php print($quote["quote"]); ?>
                                    <img src="<?php print($Image["sizes"]["profile-picture"]); ?>" alt="<?php print($quote["persons_name"]); ?>" class="quote-image" />
                                    <div class="client-info"><?php print($quote["persons_name"]); ?> <span></span> <?php print($quote["role"]); ?></div>
                                    <div class="company-info"><?php print($quote["joined"]); ?></div>
                                </div>

                        <?php
                        }
                        ?>

                    </div>
                </div>
            </div>
        </div>
    </div>

    <img src="<?php the_field("benefits_image"); ?>" class="full-width mobile" />

    <div id="benefits-section" class="section bg-darkblue bg-image bg-image-r3rd bg-no-mobile" style="background-image: url('<?php the_field("benefits_image"); ?>');">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12 col-lg-8">
                    <h2><?php the_field("benefits_title"); ?></h2>
                </div>
            </div>
            <div class="row">
                <div class="col-12 col-lg-4 show-last-line">

                    <?php
                    $Counter = 0;

                    while(have_rows("benefits")) {
                        the_row();

                        $Counter++;
                        ?>

                        <div class="benefit-line">
                            <div class="icon"><?php the_sub_field("icon"); ?></div>
                            <p><?php the_sub_field("copy"); ?><i class="fal fa-plus"></i><span class="desc" style="display: none;"><?php the_sub_field("description"); ?></span></p>
                            <div class="dotted-line"></div>
                        </div>

                        <?php
                        if($Counter == 5) {
                        ?>

                            </div>
                            <div class="col-12 col-lg-4">

                        <?php
                        }
                    }
                    ?>

                </div>
            </div>
        </div>
    </div>

    <div class="section negative-padding-bottom">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12 col-lg-6 offset-lg-3 text-center">
                    <h2><?php the_field("charity_title"); ?></h2>
                    <div class="content">
                        <?php the_field("charity_copy"); ?>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-10 offset-1">
                    <div class="slick-slider three">

                        <?php
                        $Delay = 0;

                        while(have_rows("charity_blog_posts")) {
                            the_row();

                            $BlogPost    = get_sub_field("blog_post");
                            $HeaderImage = wp_get_attachment_image_src(get_post_thumbnail_id($BlogPost->ID), "case-study-tile");
                            $Delay       += 0.1;
                            ?>

                                <div class="slick-slide wow fadeInUp" data-wow-delay="<?php print($Delay); ?>s">
                                    <a href="<?php print(get_permalink($BlogPost->ID)); ?>">
                                        <div class="case-study-tile">
                                            <img src="<?php print($HeaderImage[0]); ?>" alt="<?php print(get_field("company_name", $BlogPost->ID)); ?>" />
                                            <h3><?php print($BlogPost->post_title); ?></h3>
                                        </div>
                                    </a>
                                </div>

                        <?php
                        }
                        ?>

                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="culture-divider">
        <img src="<?php print(get_template_directory_uri()); ?>/assets/img/culture_divider.png" />
    </div>

    <div class="section bg-darkblue">
        <div class="container-fluid">
            <div class="row">
                <div class="col text-center">
                    <h2><?php the_field("leaders_title"); ?></h2>
                </div>
            </div>
            <div class="row leadership2-wrapper">

                <?php
                $Delay = 0;

                while(have_rows("leaders")) {
                    the_row();

                    $Delay += 0.1;

                    $Image = get_sub_field("image");
                    ?>

                    <div class="col-4 col-md">
                        <div class="leadership-tile2 wow fadeInUp" data-wow-delay="<?php print($Delay); ?>s">
                            <img src="<?php print($Image["sizes"]["insights-main-square"]); ?>" alt="<?php the_sub_field("name"); ?>" />
                            <div class="persons-name"><?php the_sub_field("name"); ?></div>
                            <div class="persons-role"><?php the_sub_field("role"); ?></div>
                        </div>
                    </div>

                <?php
                }
                ?>

            </div>
        </div>
    </div>

    <div class="section bg-darkblue bg-image large-padding-bottom" style="background-image: url('<?php the_field("cta_bg_image"); ?>');">
        <div class="container-fluid">
            <div class="row">
                <div class="col text-center">
                    <h2><?php the_field("next_cta_title"); ?></h2>
                </div>
            </div>
            <div class="row">
                <div class="col text-center multi-buttons">

                    <?php
                    while(have_rows("next_cta_buttons")) {
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

    <?php get_template_part("templates/page", "instagram"); ?>
    
    <?php get_template_part("templates/page", "form"); ?>

</div>

<?php
get_footer();
?>
