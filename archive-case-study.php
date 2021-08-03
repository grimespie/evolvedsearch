<?php
get_header();
?>

<div id="template-casestudies">
    <div class="section full-screen bg-image bg-darkblue" style="background-image: url('<?php the_field("casestudies_header_image", "options"); ?>');">

        <?php get_template_part("templates/moving", "circle"); ?>

        <div class="dt pa">
            <div class="dc">
                <div class="container-fluid" data-speed="35">
                    <div class="row">
                        <div class="col-12 col-lg-8 offset-lg-2 text-center">
                            <div class="header-label"><?php the_field("casestudies_header_label", "options"); ?></div>
                            <h1><?php the_field("casestudies_header_title", "options"); ?></h1>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="section bg-darkblue">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12 col-lg-6 offset-lg-3 text-center">
                    <h2><?php the_field("casestudies_header_sub_title", "options"); ?></h2>
                    <div class="content">
                        <?php the_field("casestudies_header_copy", "options"); ?>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="section bg-darkblue no-padding-top">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12 text-center">
                    <div id="filters">
                        <div class="filter mixitup-control-active wow fadeInUp" data-filter="all">All</div>

                        <?php
                        $terms = get_terms('case-study-category', array(
                                               'hide_empty' => true,
                                          ));

                        $Delay = 0;

                        foreach($terms as $term) {
                            $Delay += 0.1;
                        ?>

                            <div class="filter wow fadeInUp" data-filter=".<?php print($term->slug); ?>" data-wow-delay="<?php print($Delay); ?>s"><?php print($term->name); ?></div>

                        <?php
                        }
                        ?>

                    </div>
                </div>
            </div>
            <div class="row" id="grid">
                <div class="col-12">

                <?php
                while(have_posts()) : the_post();
                    $Stats     = array();
                    $Count     = 0;
                    $Terms     = get_the_terms(get_the_ID(), "case-study-category");
                    $TermList  = "";

                    while(have_rows("stats", $CaseStudy->ID)) {
                        the_row();

                        $Stats[$Count]["stat"]        = get_sub_field("stat");
                        $Stats[$Count]["description"] = get_sub_field("description");
                        $Count++;
                    }

                    foreach($Terms as $Term) {
                        $TermList .= " " . $Term->slug;
                    }
                    ?>

                        <div class="case-study-card mix2 <?php print($TermList); ?>">
                            <?php the_post_thumbnail("case-study-tile"); ?>
                            <div class="case-study-card-det">
                                <h3><?php the_field("company_name"); ?></h3>
                                <div class="row">
                                    <div class="col-6 col-lg-2">
                                        <div class="stats">
                                            <div class="stat"><?php print(setup_stat($Stats[0]["stat"])); ?></div>
                                            <div class="content"><p><?php print($Stats[0]["description"]); ?></p></div>
                                        </div>
                                    </div>
                                    <div class="col-6 col-lg-2">
                                        <div class="stats">
                                            <div class="stat"><?php print(setup_stat($Stats[1]["stat"])); ?></div>
                                            <div class="content"><p><?php print($Stats[1]["description"]); ?></p></div>
                                        </div>
                                    </div>
                                    <div class="col-12 col-lg-5">
                                        <div class="content dark">
                                            <?php the_content(); ?>
                                        </div>
                                    </div>
                                    <div class="col-12 col-lg-3 text-center">
                                        <a href="<?php print(get_permalink(get_the_ID())); ?>" class="button btn-blue">Read more</a>
                                    </div>
                                </div>
                            </div>
                        </div>

                <?php
                endwhile;
                ?>

                </div>
            </div>
        </div>
    </div>

    <div class="section">
        <div class="container-fluid">
            <div class="row">
                <div class="col text-center">
                    <div class="content large dark wow fadeInUp">
                        <?php the_field("case_studies_client_logos_title", "options"); ?>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-10 offset-1">
                    <div class="slick-slider five">

                            <?php
                            $Delay = 0;

                            while(have_rows("case_studies_client_logos", "options")) {
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

    <div class="section bg-darkblue bg-image bg-image-lhs" style="background-image: url('<?php the_field("case_studies_services_image", "options"); ?>');">
        <img src="<?php the_field("case_studies_services_image", "options"); ?>" class="mobile replace" alt="<?php the_field("case_studies_services_title", "options"); ?>" />
        <div class="container-fluid">
            <div class="row">
                <div class="col-12 col-lg-5">
                </div>
                <div class="col-12 col-lg-6 offset-lg-1">
                    <div class="row">
                        <div class="col">
                            <h2><?php the_field("case_studies_services_title", "options"); ?></h2>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12 col-lg-6">

                                <?php
                                $Counter = 0;

                                while(have_rows("services", get_option("page_on_front"))) {
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

    <?php get_template_part("templates/page", "form"); ?>

</div>

<?php
get_footer();
?>
