<?php
get_header();

$HeaderImage = wp_get_attachment_image_src(get_post_thumbnail_id(get_the_ID()), "orig");
?>

<div id="template-case-study">

    <?php while(have_posts()) : the_post(); ?>

        <img src="<?php print($HeaderImage[0]); ?>" class="full-width mobile" />

        <div class="section bg-darkblue bg-image bg-image-rh bg-no-mobile" style="background-image: url('<?php print($HeaderImage[0]); ?>');">
            <img src="<?php print(get_template_directory_uri()); ?>/assets/img/services-bg1.png" alt="Case Study BG 1" class="case-study-bg-1">
            <div class="container-fluid" data-speed="35">
                <div class="row">
                    <div class="col-12 col-lg-5">
                        <div class="header-label ">Case Studies</div>
                        <h1><?php the_title(); ?></h1>
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
                        <div class="small-title">At a glance:</div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-10 offset-1">
                    <div class="row">

                    <?php
                    $NumberStats = count(get_field("stats"));
                    $ColCount    = floor(12 / $NumberStats);
                    $Delay       = 0;

                    while(have_rows("stats")) {
                        the_row();

                        $Delay += 0.1;
                        ?>

                            <div class="col-12 col-lg-<?php print($ColCount); ?> text-center">
                                <div class="stat-wrapper wow fadeInUp" data-wow-delay="<?php print($Delay); ?>s">
                                    <div class="stat"><?php print(setup_stat(get_sub_field("stat"))); ?></div>
                                    <p><?php the_sub_field("description"); ?></p>
                                </div>
                            </div>

                    <?php
                    }
                    ?>

                    </div>
                    </div>
                </div>
            </div>
        </div>

        <?php
        if(have_rows("awards")) {
        ?>

        <div class="section small-padding-top no-padding-bottom">
            <div class="container-fluid">
                <div class="row">
                    <div class="col text-center">
                        <h2 style="margin-bottom: 0;"><?php the_field("awards_title"); ?></h2>
                    </div>
                </div>
                <div class="row">
                    <div class="col-10 offset-1">
                        <div class="slick-slider five awards">

                            <?php
                            $Delay = 0;

                            while(have_rows("awards")) {
                                the_row();

                                $Delay += 0.1;
                                ?>

                                <div class="slick-slide wow fadeInUp" data-wow-delay="<?php print($Delay); ?>s">
                                    <img src="<?php the_sub_field("award"); ?>" />
                                </div>

                            <?php
                            }
                            ?>

                        </div>
                    </div>
                </div>
            </div>
        </div>

        <?php
        }
        ?>

        <div class="section">
            <div class="container-fluid">

                <?php
                while(have_rows("top_sections")) {
                    the_row();
                    ?>

                        <div class="row copy-section">
                            <div class="col-12 col-lg-3 offset-lg-2 text-lg-right">
                                <h2><?php the_sub_field("section_title"); ?></h2>
                            </div>
                            <div class="col-12 col-lg-5">
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

        <div class="section bg-darkblue">
            <div class="container-fluid">
                <div class="row copy-section">
                    <div class="col-12 col-lg-3 offset-lg-2 text-lg-right">
                        <h2><?php the_field("highlights_title"); ?></h2>
                    </div>
                    <div class="col-12 col-lg-5">

                        <?php
                        while(have_rows("highlights")) {
                            the_row();
                            ?>

                                <div class="highlight">
                                    <div class="hstat"><?php the_sub_field("stat"); ?></div>
                                    <div class="content"><p><?php the_sub_field("description"); ?></p></div>
                                </div>

                        <?php
                        }
                        ?>

                    </div>
                </div>
            </div>
        </div>

        <div class="block-images-wrapper">

            <?php
            $Delay = 0;

            while(have_rows("image_section")) {
                the_row();

                $Image = get_sub_field("image");
                $Delay += 0.1;
                ?>

                <img src="<?php print($Image["sizes"]["block-image-" . get_sub_field('image_size')[0]]); ?>" class="block-image-<?php print(get_sub_field('image_size')[0]); ?> wow fadeInUp" data-wow-delay="<?php print($Delay); ?>s" />

            <?php
            }
            ?>

            <div class="clearfix"></div>
        </div>

        <div class="section">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-10 offset-1 col-lg-6 offset-lg-3 text-center">
                        <div class="quote-wrapper">
                            <div class="quote-mark">&ldquo;</div>
                            <?php the_field("quote"); ?>
                            <div class="client-info"><?php the_field("quote_by"); ?> <span></span> <?php the_field("quote_by_role"); ?></div>
                            <div class="company-info"><?php the_field("company_name"); ?></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    <?php get_template_part("templates/page", "form"); ?>

    <?php endwhile; ?>

</div>

<?php
get_footer();
?>
