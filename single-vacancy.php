<?php
$FormSubmit  = false;
$FormSuccess = false;

if(isset($_POST["first_name"])) {
    $FormSubmit  = true;
    $FormSuccess = send_application_email(get_the_title());

    if($FormSuccess) {
        header("Location: https://www.evolvedsearch.co.uk/thank-you-for-your-application/");
        exit();
    }
}

get_header();
?>

<div id="template-career">
    <div class="section bg-image" style="background-image: url('<?php the_field("single_careers_header_bg_image", "options"); ?>');">

        <?php get_template_part("templates/moving", "circle"); ?>

        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="header-label"><?php the_field("careers_header_label", "options"); ?></div>
                    <h1><?php the_title(); ?></h1>
                    <div class="icon-item"><span class="icon"><i class="fal fa-money-bill-wave"></i></span><?php the_field("salary"); ?></div>
                    <div class="icon-item"><span class="icon"><i class="fal fa-calendar-alt"></i></span>Deadline: <?php print(date(get_option("date_format"), strtotime(get_field("deadline")))); ?></div>
                    <div class="icon-item"><span class="icon"><i class="fal fa-clock"></i></span><?php the_field("type"); ?></div>
                    <div class="icon-item"><span class="icon"><i class="fal fa-users"></i></span><?php the_field("service"); ?></div>
                    <div class="icon-item"><span class="icon"><i class="fal fa-map-marker-alt"></i></span><?php the_field("location"); ?></div>
                </div>
            </div>
        </div>
    </div>

    <div class="section" id="vacancy-sections">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12 col-lg-8">
                    <div class="content">

                <?php
                while(have_rows("sections")) {
                    the_row();
                    ?>

                        <h2><?php the_sub_field("title"); ?></h2>
                        <?php the_sub_field("copy"); ?>

                <?php
                }
                ?>

                    </div>
                </div>
            </div>
        </div>

        <?php
        if(!get_field("is_this_vacancy_closed")) {
        ?>

        <div class="apply-box">
            <h3>Apply now:</h3>

            <?php
                    if(($FormSubmit) && ($FormSuccess)) {
                    ?>

                        <div class="content dark"><?php the_field("form_submit_success", "options"); ?></div>

                    <?php
                    }
                    else {
                    ?>

            <form action="" method="post" enctype="multipart/form-data">
                <input type="text" name="first_name" placeholder="First Name" required />
                <input type="text" name="last_name" placeholder="Last Name" required />
                <input type="email" name="email" placeholder="Email" required />
                <label>CV:</label>
                <input type="file" name="cv" id="cv" />
                <label for="cv" class="file-label"><div class="ic"><i class="fal fa-paperclip"></i></div><span>Attach File</span></label>
                <label>Cover letter:</label>
                <input type="file" name="cl" id="cl" />
                <label for="cl" class="file-label"><div class="ic"><i class="fal fa-file-check"></i></div><span>Attach File</span></label>
                <div class="form-agree">
                    <input required type="checkbox" name="agreement" value="1" id="agree" />
                    <label for="agree"></label>
                    <p>I agree to the <a href="https://www.evolvedsearch.co.uk/privacy/" target="_blank">Privacy Terms & Conditions</a></p>
                </div>
                <input type="submit" name="Submit" class="button btn-blue" />
            </form>

            <?php
            }
            ?>

        </div>

        <?php
        }
        ?>

    </div>

    <?php get_template_part("templates/page", "instagram"); ?>
</div>

<?php
get_footer();
?>
