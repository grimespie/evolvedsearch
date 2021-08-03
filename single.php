<?php
$FormSubmit  = false;
$FormSuccess = false;

if(isset($_POST["first_name"])) {
    $FormSubmit  = true;
    $FormSuccess = send_insight_email(get_the_title());

    if($FormSuccess) {
        header("Location: https://www.evolvedsearch.co.uk/thank-you-for-downloading-our-insights/");
        exit();
    }
}


get_header();

$HeaderImage = wp_get_attachment_image_src(get_post_thumbnail_id(get_the_ID()), "orig");
?>

<div id="template-blogpost">

    <?php
    while(have_posts()) : the_post();
    ?>

        <div class="section bg-blur-wrapper <?php if(!get_field("is_insight")) { print('blog-header-padding'); } ?>">
            <div class="bg-blur-container">
                <div class="bg-image bg-blur" style="background-image: url('<?php print($HeaderImage[0]); ?>);"></div>
            </div>
            <div class="overlay"></div>
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12 col-lg-6 offset-lg-3 text-center">

                        <?php
                        if(get_field("is_insight")) {
                        ?>

                            <div class="header-label">Insights</div>

                        <?php
                        }
                        else {
                        ?>

                            <div class="header-label">Blog</div>

                        <?php
                        }
                        ?>

                        <h1><?php the_title(); ?></h1>

                        <?php
                        if(!get_field("is_insight")) {
                        ?>

                            <div class="blog-details">
                                <div class="icon-item wow fadeInUp"><span class="icon"><i class="fal fa-calendar-alt" aria-hidden="true"></i></span><?php print(get_the_date(get_option("date_format"))); ?></div>
                                <div class="icon-item wow fadeInUp" data-wow-delay="0.1s"><span class="icon"><i class="fal fa-clock" aria-hidden="true"></i></span>A 7 minute read</div>
                            </div>

                        <?php
                        }
                        ?>

                    </div>
                </div>
            </div>
        </div>

        <?php
        if(get_field("is_insight")) {
        ?>

            <div class="section">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-12 col-lg-5 offset-lg-1">
                            <div class="content big-intro insight-form-wrapper">

                                <?php
                                if(get_field("form_thumbnail")) {
                                    $Thumbnail = get_field("form_thumbnail");
                                    print('<img src="' . $Thumbnail["sizes"]["insights-form-image"] . '" alt="' . get_the_title() . '" class="attachment-insights-form-image" />');
                                }
                                else {
                                    the_post_thumbnail("insights-form-image");
                                }
                                ?>

                                <div class="insight-box">
                                    <h3>Get the full report:</h3>

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
                                        <input type="text" name="company" placeholder="Company" required />
                                        <div class="form-agree">
                                            <input required type="checkbox" name="agreement" value="1" id="agree" />
                                            <label for="agree"></label>
                                            <p>I agree to the <a href="https://www.evolvedsearch.co.uk/privacy/" target="_blank">Privacy Terms & Conditions</a></p>
                                        </div>



                                            <div class="form-hear-services">
                                                <input type="checkbox" name="hear_services" value="1" id="hear-services" />
                                                <label for="hear-services"></label>
                                                <p>I'm interested in hearing about your services</p>
                                            </div>
                                            <div class="form-just-report">
                                                <input type="checkbox" name="just_report" value="1" id="just-report" />
                                                <label for="just-report"></label>
                                                <p>I just want the report</p>
                                            </div>


                                        <input type="submit" name="Submit" class="button btn-blue" />
                                    </form>

                                <?php
                                }
                                ?>

                                </div>
                            </div>
                        </div>
                        <div class="col-12 col-lg-5">
                            <div class="content big-intro">
                                <?php the_content(); ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        <?php
        }
        else {
        ?>

        <div class="section section-overlap">
            <div class="author-details">
                <a href="<?php print(get_author_posts_url($post->post_author)); ?>">
                    <?php $ProfilePicture = get_field("profile_picture", "user_" . $post->post_author); ?>
                    <img src="<?php print($ProfilePicture["sizes"]["profile-picture"]); ?>" alt="<?php the_author_meta("display_name", $post->post_author); ?>" class="profile-picture" />
                    <div class="author-name"><?php the_author_meta("display_name", $post->post_author); ?></div>
                    <div class="author-role"><?php the_field("job_title", "user_" . $post->post_author); ?></div>
                </a>
            </div>
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12 col-lg-6 offset-lg-3">
                        <div class="content big-intro">
                            <?php the_content(); ?>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12 col-lg-6 offset-lg-3">
                        <div class="blog-bottom">
                            <div class="row">
                                <div class="col-6">
                                    <?php $ProfilePicture = get_field("profile_picture", "user_" . $post->post_author); ?>
                                    <a href="<?php print(get_author_posts_url($post->post_author)); ?>">
                                        <img src="<?php print($ProfilePicture["sizes"]["profile-picture"]); ?>" alt="<?php the_author_meta("display_name", $post->post_author); ?>" class="profile-picture" />
                                        <div class="author-name"><?php the_author_meta("display_name", $post->post_author); ?></div>
                                    </a>
                                </div>
                                <div class="col-6 text-right">
                                    <a onclick="window.open('https://www.facebook.com/sharer.php?u=<?php the_permalink(); ?>', 'newwindow', 'width=500, height=250'); return false;" href="https://www.facebook.com/sharer.php?u=<?php the_permalink(); ?>" target="_blank">
                                        <div class="share-btn"><i class="fab fa-facebook-square" aria-hidden="true"></i></div>
                                    </a>
                                    <a onclick="window.open('https://twitter.com/share?url=<?php the_permalink(); ?>&amp;text=<?php the_title(); ?>', 'newwindow', 'width=500, height=250'); return false;" href="https://twitter.com/share?url=<?php the_permalink(); ?>&amp;text=<?php the_title(); ?>" target="_blank">
                                        <div class="share-btn"><i class="fab fa-twitter" aria-hidden="true"></i></div>
                                    </a>
                                    <a onclick="window.open('https://www.linkedin.com/shareArticle?mini=true&amp;url=<?php the_permalink(); ?>', 'newwindow', 'width=500, height=250'); return false;" href="https://www.linkedin.com/shareArticle?mini=true&amp;url=<?php the_permalink(); ?>" target="_blank">
                                        <div class="share-btn"><i class="fab fa-linkedin-in" aria-hidden="true"></i></div>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <?php
            }
            ?>

            <?php
            $prev_post = get_adjacent_post(false, '', false);

            if(!empty($prev_post)) {
            ?>

                <a href="<?php print(get_permalink($prev_post->ID)); ?>">
                    <div class="prev-post">
                        <div class="prev-dets">
                            <div class="content"><p><?php print($prev_post->post_title); ?></p></div>
                            <div class="blog-details">
                                <div class="icon-item"><span class="icon"><i class="fal fa-calendar-alt" aria-hidden="true"></i></span><?php print(date(get_option("date_format"), strtotime($prev_post->post_date_gmt))); ?></div>
                                <div class="icon-item" data-wow-delay="0.1s"><span class="icon"><i class="fal fa-clock" aria-hidden="true"></i></span>A 7 minute read</div>
                            </div>
                        </div>
                        <div class="arrow">
                            <svg id="Layer_1" data-name="Layer 1" xmlns="http://www.w3.org/2000/svg" width="50" height="10" viewBox="0 0 50 10"><title>arrowleft</title><line x1="9.6" y1="5" x2="47.05" y2="5" fill="none" stroke="#ffffff" stroke-miterlimit="10" stroke-width="0.75"/><polygon points="11.08 7.18 2.95 5 11.08 2.82 11.08 7.18" fill="#ffffff"/></svg>
                        </div>
                    </div>
                </a>

            <?php
            }

            $next_post = get_adjacent_post(false, '', true);

            if(!empty($next_post)) {
            ?>

                <a href="<?php print(get_permalink($next_post->ID)); ?>">
                    <div class="next-post">
                        <div class="next-dets">
                            <div class="content"><p><?php print($next_post->post_title); ?></p></div>
                            <div class="blog-details">
                                <div class="icon-item"><span class="icon"><i class="fal fa-calendar-alt" aria-hidden="true"></i></span><?php print(date(get_option("date_format"), strtotime($next_post->post_date_gmt))); ?></div>
                                <div class="icon-item" data-wow-delay="0.1s"><span class="icon"><i class="fal fa-clock" aria-hidden="true"></i></span>A 7 minute read</div>
                            </div>
                        </div>
                        <div class="arrow">
                            <svg id="Layer_1" data-name="Layer 1" xmlns="http://www.w3.org/2000/svg" width="50" height="10" viewBox="0 0 50 10"><title>arrowright</title><line x1="40.4" y1="5" x2="2.95" y2="5" fill="none" stroke="#ffffff" stroke-miterlimit="10" stroke-width="0.75"/><polygon points="38.92 2.82 47.05 5 38.92 7.18 38.92 2.82" fill="#ffffff"/></svg>
                        </div>
                    </div>
                </a>

            <?php
            }
            ?>

        </div>

        <div class="section bg-darkblue">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12 text-center">
                        <h2>Related insights:</h2>
                    </div>
                </div>
                <div class="row">

                    <?php
                    $RelatedPosts = new WP_Query(array("post_type" => "post", "post_status" => "publish", "posts_per_page" => 4, "post__not_in" => array(get_the_ID()), "category__in" => wp_get_post_categories(get_the_ID(), array('fields' => 'ids'))));
                    $Delay = 0;

                    foreach($RelatedPosts->posts as $RelatedPost) {
                        $Delay += 0.1;
                        ?>

                        <div class="col-6 col-lg-3">
                            <a href="<?php print(get_permalink($RelatedPost->ID)); ?>">
                                <div class="case-study-tile wow fadeInUp" data-wow-delay="<?php print($Delay); ?>s">
                                    <?php print(get_the_post_thumbnail($RelatedPost->ID, "insights-main-square")); ?>
                                    <h3><?php print($RelatedPost->post_title); ?></h3>
                                </div>
                            </a>
                        </div>

                    <?php
                    }
                    ?>

                </div>
            </div>
        </div>

        <?php
        if(!get_field("is_insight")) {
            get_template_part("templates/page", "form");
        }
        ?>

    <?php
    endwhile;
    ?>

</div>

<?php
get_footer();
?>
