<?php
$FormSubmit  = false;
$FormSuccess = false;

if(isset($_POST["full_name"])) {
    $FormSubmit  = true;
    $FormSuccess = send_contact_email();
}
?>

<div id="page-form">
    <div class="section">

        <?php
        $Images = get_field("page_form_images", "options");
        shuffle($Images);

        $Image = $Images[0]["image"];
        ?>

        <img class="hide-mobile" src="<?php print($Image); ?>" alt="Page Contact Form" />
        <div class="container-fluid">
            <div class="row">

            <?php
                    if(($FormSubmit) && ($FormSuccess)) {
                    ?>

                        <div class="col-12 col-lg-6">
                            <div class="row">
                                <div class="col">
                                    <h2><?php the_field("page_form_title", "options"); ?></h2>
                                    <div class="content"><p>Thank you for contacting us. We will be in touch soon.</p></div>
                                </div>
                            </div>
                        </div>

                    <?php
                    }
                    else {
                    ?>

                <form action="#page-form" method="post">
                <div class="col-12 col-lg-6">
                    <div class="row">
                        <div class="col">
                            <h2><?php the_field("page_form_title", "options"); ?></h2>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12 col-lg-6">
                            <input type="text" name="full_name" required placeholder="Name" value="" />
                            <input type="email" name="email" required placeholder="Email" value="" />
                            <input type="text" name="telephone" placeholder="Telephone" value="" />
                        </div>
                        <div class="col-12 col-lg-6">
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
                    </div>
                    <div class="row">
                        <div class="col">
                            <input type="submit" class="button btn-blue" value="Submit" />
                            <div class="form-agree">
                                <input required type="checkbox" name="agreement" value="1" id="agree" />
                                <label for="agree"></label>
                                <p>I agree to the <a href="https://www.evolvedsearch.co.uk/privacy/" target="_blank">Privacy Terms & Conditions</a></p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-lg-5"></div>
                </form>

                <?php
                }
                ?>

            </div>
        </div>
    </div>
</div>
