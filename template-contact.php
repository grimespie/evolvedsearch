<?php
/*
 *
 * Template Name: Contact Page
 *
 */

$FormSubmit  = false;
$FormSuccess = false;

if(isset($_POST["full_name"])) {
    $FormSubmit  = true;
    $FormSuccess = send_contact_email();
}

get_header();

$HeaderImage = wp_get_attachment_image_src(get_post_thumbnail_id(get_the_ID()), "orig");
?>

<div id="template-contact">

    <div class="section twothirds-screen bg-darkblue bg-image" style="background-image: url('<?php print($HeaderImage[0]); ?>');">

        <img src="<?php print(get_template_directory_uri()); ?>/assets/img/header_mask.png" class="fs-mask-bottom" alt="Mask Header"/>
        <div class="dt pa">
            <div class="dc">
                <div class="container-fluid" data-speed="35">
                    <div class="row">
                        <div class="col text-center">
                            <div class="header-label "><?php the_title(); ?></div>
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

    <div class="section" id="contact-form">
        <div class="container-fluid">
            <div class="row">
                <div class="col text-center">
                    <h2><?php the_field("form_title"); ?></h2>
                </div>
            </div>
            <div class="col-12 col-lg-10 offset-lg-1">

            <?php
                    if(($FormSubmit) && ($FormSuccess)) {
                    ?>

                        <div class="content text-center dark"><?php the_field("form_submit_message"); ?></div>

                    <?php
                    }
                    else {
                    ?>

                <form action="<?php print(get_permalink(get_the_ID())); ?>#contact-form" method="post">
                    <div class="row">
                        <div class="col-12 col-lg-4">
                            <input type="text" name="full_name" required placeholder="Name" value="" />
                            <input type="email" name="email" required placeholder="Email" value="" />
                            <input type="text" name="telephone" placeholder="Telephone" value="" />
                        </div>
                        <div class="col-12 col-lg-4">
                            <input type="text" name="business_name" placeholder="Business name" value="" />
                            <input type="text" name="url" placeholder="URL" value="" />
                            <div class="row">
                                    <div class="col-4">
                                        <label>Interested in:</label><br/>
                                        <input type="checkbox" name="digitalpr" value="" id="form-interest-outreach" />
                                        <label for="form-interest-outreach">Digital PR</label>
                                    </div>
                                    <div class="col-4">
                                        <input type="checkbox" name="seo" value="" id="form-interest-seo" />
                                        <label for="form-interest-seo">SEO</label><br/>
                                        <input type="checkbox" name="content" value="" id="form-interest-content" />
                                        <label for="form-interest-content">Content</label>
                                    </div>
                                    <div class="col-4">
                                        <input type="checkbox" name="ppc" value="" id="form-interest-ppc" />
                                        <label for="form-interest-ppc">PPC</label><br/>
                                        <input type="checkbox" name="all" value="" id="form-interest-all" />
                                        <label for="form-interest-all">All</label>
                                    </div>
                                </div>
                        </div>
                        <div class="col-12 col-lg-4">
                            <textarea name="message" placeholder="Message here (optional)"></textarea>
                            <input type="submit" value="Submit" class="button btn-blue" />
                            <div class="form-agree">
                                <input required type="checkbox" name="agreement" value="1" id="agree" />
                                <label for="agree"></label>
                                <p>I agree to the <a href="https://www.evolvedsearch.co.uk/privacy/" target="_blank">Privacy Terms & Conditions</a></p>
                            </div>
                        </div>
                    </div>
                </form>

                <?php
                }
                ?>

            </div>
        </div>
    </div>

    <div class="section bg-lightblue" id="map-section">
        <?php the_field("map_embed"); ?>
        <div class="container-fluid">
            <div class="row">
                <div class="col-8">
                </div>
                <div class="col-4">
                    <h2><?php the_field("address_title"); ?></h2>
                    <div class="content light">
                        <p><?php the_field("address"); ?></p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="section bg-darkblue" id="contacts-section">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12 col-lg-8 offset-lg-2 text-center">
                    <h2><?php the_field("contacts_title"); ?></h2>
                    <div class="content large">
                        <?php the_field("contacts"); ?>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="section">
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

                        <a href="<?php the_sub_field("button_link"); ?>" class="button btn-blue"><?php the_sub_field("button_text"); ?></a>

                    <?php
                    }
                    ?>

                </div>
            </div>
        </div>
    </div>

</div>

<?php
get_footer();
?>
