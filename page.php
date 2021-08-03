<?php
get_header();
?>

<div id="template-page">

    <div class="section" id="page-title">
        <div class="container-fluid">
            <div class="row">
                <div class="col text-center">
                    <h1><?php the_title(); ?></h1>
                </div>
            </div>
        </div>
    </div>

    <div class="section no-padding-top">
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

    <?php get_template_part("templates/page", "form"); ?>

</div>

<?php
get_footer();
?>
