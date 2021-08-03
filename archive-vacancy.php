<?php
$FormSubmit  = false;
$FormSuccess = false;

if(isset($_POST["full_name"])) {
    $FormSubmit  = true;
    $FormSuccess = send_application_email(false);

    if($FormSuccess) {
        header("Location: https://www.evolvedsearch.co.uk/thank-you-for-your-application/");
        exit();
    }
}

get_header();
?>

<div id="template-careers">
    <div class="section bg-image bg-image-lh no-padding-bottom bg-no-mobile" style="background-image: url('<?php the_field("careers_header_image", "options"); ?>');">

        <?php get_template_part("templates/moving", "circle"); ?>

        <div class="dt">
            <div class="dc">
                <div class="container-fluid" data-speed="35">
                    <div class="row">
                        <div class="col-12 col-lg-4 offset-lg-8 text-center">
                            <div class="header-label"><?php the_field("careers_header_label", "options"); ?></div>
                            <h1><?php the_field("careers_header_title", "options"); ?></h1>
                            <div class="content dark">
                                <?php the_field("careers_header_copy", "options"); ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <img src="<?php the_field("careers_header_image", "options"); ?>" class="full-width mobile" />

    <div class="section">
        <div class="container-fluid">
            <div class="row">
                <div class="col text-center">
                    <h2 class="vacancy-title">Current Vacancies</h2>
                </div>
            </div>
            <div class="row">

                <?php
                $Current = new WP_Query(array("post_type" => "vacancy", "post_status" => "publish", "posts_per_page" => -1, "meta_key" => "is_this_vacancy_closed", "meta_value" => 0));

                foreach($Current->posts as $Job) {
                ?>

                    <div class="col-12 col-lg-3">
                        <a href="<?php print(get_permalink($Job->ID)); ?>">
                            <div class="vacancy-tile">
                                <h3><?php print($Job->post_title); ?></h3>
                                <div class="icon-item"><span class="icon"><i class="fal fa-users"></i></span>Team: <?php the_field("service", $Job->ID); ?></div>
                                <div class="icon-item"><span class="icon"><i class="fal fa-calendar-alt"></i></span>Deadline: <?php print(date(get_option("date_format"), strtotime(get_field("deadline", $Job->ID)))); ?></div>
                            </div>
                        </a>
                    </div>

                <?php
                }
                ?>

            </div>
        </div>
    </div>

    <div class="section bg-lightgrey border-top">
        <div class="container-fluid">
            <div class="row">
                <div class="col text-center">
                    <h2 class="vacancy-title">Past Vacancies</h2>
                </div>
            </div>
            <div class="row">

                <?php
                $Current = new WP_Query(array("post_type" => "vacancy", "post_status" => "publish", "posts_per_page" => -1, "meta_key" => "is_this_vacancy_closed", "meta_value" => 1));
                $Counter = 0;

                foreach($Current->posts as $Job) {
                    $Counter++;
                    ?>

                    <div class="col-12 col-lg-3">
                        <a href="<?php print(get_permalink($Job->ID)); ?>">
                            <div class="vacancy-tile">
                                <h3><?php print($Job->post_title); ?></h3>
                                <div class="icon-item"><span class="icon"><i class="fal fa-users"></i></span>Team: <?php the_field("service", $Job->ID); ?></div>
                                <div class="icon-item"><span class="icon"><i class="fal fa-calendar-alt"></i></span>Deadline: <?php print(date(get_option("date_format"), strtotime(get_field("deadline", $Job->ID)))); ?></div>
                            </div>
                        </a>
                    </div>

                <?php
                    if($Counter == 4) {
                    ?>

                        </div>
                        <div class="row old-archive">

                    <?php
                    }
                }
                ?>

            </div>
            <div class="show-more-wrapper"><a class="button btn-blue">Show More</a></div>
        </div>
    </div>

    <div class="section bg-image" style="background-image: url('<?php the_field("careers_section_2_bg_image", "options"); ?>');">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12 col-lg-5">
                    <h2><?php the_field("careers_section_2_title", "options"); ?></h2>
                    <div class="content">
                        <?php the_field("careers_section_2_copy", "options"); ?>
                    </div>
                </div>
                <div class="col-10 offset-1 col-lg-5 offset-lg-2">
                    <div class="slick-slider quotes">

                        <?php
                        $CulturePage = get_field("culture_page", "options");
                        $StaffQuotes = get_field("staff_quotes", $CulturePage->ID);
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

    <div id="vacancy-footer-submit" class="section bg-image bg-image-rhalf" style="background-image: url('<?php the_field("form_section_image", "options"); ?>');">
        <img src="<?php the_field("form_section_image", "options"); ?>" class="mobile replace" alt="<?php the_field("form_section_title", "options"); ?>" />
        <div class="container-fluid">
            <div class="row">
                <div class="col-12 col-lg-5">
                    <h2 class="dark"><?php the_field("form_section_title", "options"); ?></h2>

                    <?php
                    if(($FormSubmit) && ($FormSuccess)) {
                    ?>

                        <div class="content dark"><?php the_field("form_submit_success", "options"); ?></div>

                    <?php
                    }
                    else {
                    ?>

                    <form action="<?php bloginfo("url"); ?>/careers/#vacancy-footer-submit" method="post" enctype="multipart/form-data">
                        <input type="text" name="full_name" required placeholder="Name" />
                        <input type="email" name="email" required placeholder="Email" />
                        <div class="row">
                            <div class="col-5">
                                <label>CV:</label>
                                <input type="file" name="cv" id="cv" />
                                <label for="cv" class="file-label"><div class="ic"><i class="fal fa-paperclip"></i></div><span>Attach File</span></label>
                            </div>
                            <div class="col-5">
                                <label>Cover letter:</label>
                                <input type="file" name="cl" id="cl" />
                                <label for="cl" class="file-label"><div class="ic"><i class="fal fa-file-check"></i></div><span>Attach File</span></label>
                            </div>
                        </div>
                        <input type="submit" name="Submit" class="button btn-blue" />
                    </form>

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
