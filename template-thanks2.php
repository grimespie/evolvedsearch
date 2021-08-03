<?php

/**
 *
 * Template Name: Thanks - Insights
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

    <div class="section bg-darkblue">
        <div class="container-fluid">
            <div class="row">
                <div class="col text-center">
                    <h2>Latest insights:</h2>
                </div>
            </div>
            <div class="row justify-content-lg-center">

                <?php
                $Delay = 0;

                $Insights = new WP_Query(array("post_type" => "post", "posts_status" => "publish", "posts_per_page" => 4));

                foreach($Insights->posts as $CaseStudy) {
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
                ?>

            </div>
        </div>
    </div>

</div>

<?php
get_footer();
?>
