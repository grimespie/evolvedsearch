<?php
get_header();
?>

<div id="template-page">

    <div class="section" id="page-title">
        <div class="container-fluid">
            <div class="row">
                <div class="col text-center">
                    <h1>404</h1>
                </div>
            </div>
        </div>
    </div>

    <div class="section no-padding-top">
        <div class="container-fluid">
            <div class="row">
                <div class="col-10 offset-1 text-center">
                    <h2>It looks like the content you are looking for has moved or the link is broken.</h2>
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
