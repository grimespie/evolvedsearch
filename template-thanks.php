<?php

/**
 *
 * Template Name: Thanks
 *
 */

get_header();
?>

<div id="template-thanks">

    <div class="section no-padding-bottom" id="page-title">
        <div class="container-fluid">
            <div class="row">
                <div class="col text-center">
                    <h1><?php the_title(); ?></h1>
                </div>
            </div>
        </div>
    </div>

    <div class="section no-padding-top" style="padding-top: 0;">
        <div class="container-fluid">
            <div class="row">
                <div class="col-10 offset-1">
                    <div class="content">
                        <?php the_content(); ?>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="section bg-lightblue bg-image bg-image-lhalf" style="background-image: url('<?php the_field("careers_benefits_image", "options"); ?>');">
        <img src="<?php the_field("careers_benefits_image", "options"); ?>" class="mobile replace" alt="Career Benefits" />
        <div class="container-fluid">
            <div class="row">
                <div class="col-12 col-lg-5 offset-lg-7 text-center">
                    <h2><?php the_field("careers_benefits_title", "options"); ?></h2>
                    <div class="content">
                        <?php the_field("careers_benefits_copy", "options"); ?>
                    </div>
                    <a href="<?php the_field("careers_benefits_button_link", "options"); ?>" class="button"><?php the_field("careers_benefits_button_text", "options"); ?></a>
                </div>
            </div>
        </div>
    </div>


    <?php get_template_part("templates/page", "instagram"); ?>

</div>

<?php
get_footer();
?>
