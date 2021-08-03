<?php
get_header();
?>

<div id="template-insights">
    <div class="section twothirds-screen bg-darkblue bg-image" style="background-image: url('<?php the_field("insights_header_image", "options"); ?>');">

        <?php get_template_part("templates/moving", "circle"); ?>

        <img src="<?php print(get_template_directory_uri()); ?>/assets/img/header_mask.png" class="fs-mask-bottom" alt="Mask Header"/>
        <div class="dt pa">
            <div class="dc">
                <div class="container-fluid" data-speed="35">
                    <div class="row">
                        <div class="col text-center">

<?php
if(is_author()) {
?>

    <h1><?php the_author_meta("display_name", $post->post_author); ?> <?php the_field("insights_header_title", "options"); ?></h1>

<?php
}
else {
?>

    <h1><?php the_field("insights_header_title", "options"); ?></h1>

<?php
}
?>

                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12 col-lg-6 offset-lg-3 text-center">
                            <div class="content">
                                <?php the_field("insights_header_copy", "options"); ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="section">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12 text-center">
                    <div id="filters">
                        <div class="filter mixitup-control-active wow fadeInUp" data-filter="all">All</div>

                        <?php
                        $terms = get_terms('category', array(
                                               'hide_empty' => true,
                                          ));

                        $Delay = 0;

                        foreach($terms as $term) {
                            $Delay += 0.1;

                            if(($term->name == "Uncategorised") || ($term->name == "Uncategorized")) {
                                continue;
                            }
                            ?>

                            <div class="filter wow fadeInUp" data-filter=".<?php print($term->slug); ?>" data-wow-delay="<?php print($Delay); ?>s"><?php print($term->name); ?></div>

                        <?php
                        }
                        ?>

                    </div>
                </div>
            </div>
            <div class="row" id="grid">
                <div class="col-12 text-justify">

                <?php
                while(have_posts()) : the_post();
                    $Terms    = get_the_terms(get_the_ID(), "category");
                    $TermList = "";

                    foreach($Terms as $Term) {
                        $TermList .= " " . $Term->slug;
                    }
                    ?>

                            <a href="<?php print(get_permalink(get_the_ID())); ?>">
                        <div class="case-study-tile mix <?php print($TermList); ?>">
                                <?php the_post_thumbnail("insights-main-square"); ?>
                                <h3><?php the_title(); ?></h3>
                        </div>
                        </a>

                <?php
                endwhile;
                ?>

                    <div class="mix-gap"></div>
                    <div class="mix-gap"></div>
                    <div class="mix-gap"></div>
                    <div class="mix-gap"></div>
                </div>
            </div>
        </div>
    </div>

    <?php get_template_part("templates/page", "form"); ?>

</div>

<?php
get_footer();
?>
