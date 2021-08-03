        <footer>
            <div class="section bg-darkblue">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-12 col-lg-4">
                            <img src="<?php print(get_template_directory_uri()); ?>/assets/img/logo.svg" id="footer-logo" />
                            <p class="footer-address"><?php the_field("address", "option"); ?></p>
                            <p class="footer-phone"><?php the_field("phone_number", "option"); ?></p>
                            <p class="footer-email"><?php the_field("email_address", "option"); ?></p>
                            <p class="footer-copyright">&copy;<?php print(date("Y")); ?> <?php the_field("copyright", "option"); ?></p>
                            <p class="footer-companyno"><?php the_field("company_number", "option"); ?></p>
                        </div>
                        <div class="col">
                            <ul class="footer-links">

                            <?php
                            $ServicesPage = get_field("services_page", "options");
                            $Count        = 0;
                            ?>

                            <li><a href="<?php print(get_permalink($ServicesPage->ID)); ?>"><?php print($ServicesPage->post_title); ?></a></li>

                            <?php
                            while(have_rows("services", $ServicesPage->ID)) {
                                the_row();

                                $Count++;
                                ?>

                                    <li><a href="<?php print(get_permalink($ServicesPage->ID)); ?>?#<?php the_sub_field("anchor_link_tag"); ?>"><?php the_sub_field("title"); ?></a></li>

                            <?php
                            }
                            ?>

                            </ul>
                        </div>
                        <div class="col">

                            <?php
                            wp_nav_menu(array(
                                              "menu" => "About Menu",
                                              "container" => "nav"
                                             ));
                            ?>

                        </div>
                        <div class="col">

                            <ul class="footer-links">
                            <li><a href="<?php bloginfo("url"); ?>/insights/">Insights</a></li>

                            <?php
                            $LatestPosts = new WP_Query(array("post_type" => "post", "posts_per_page" => 3, "post_status" => "publish"));

                            foreach($LatestPosts->posts as $Post) {
                            ?>

                                <li><a href="<?php print(get_permalink($Post->ID)); ?>"><?php print($Post->post_title); ?></a></li>

                            <?php
                            }
                            ?>

                            </ul>
                        </div>
                        <div class="col-12 col-lg-2 text-center">
                            <a href="<?php the_field("facebook_link", "options"); ?>" target="_blank"><div class="social-btn"><i class="fab fa-facebook-square"></i></div></a>
                            <a href="<?php the_field("twitter_link", "options"); ?>" target="_blank"><div class="social-btn"><i class="fab fa-twitter"></i></div></a>
                            <a href="<?php the_field("linkedin_link", "options"); ?>" target="_blank"><div class="social-btn"><i class="fab fa-linkedin-in"></i></div></a>
                            <a href="<?php the_field("instagram_link", "options"); ?>" target="_blank"><div class="social-btn"><i class="fab fa-instagram"></i></div></a>
                            <br/>

                            <?php $ContactPage = get_field("contact_page", "options"); ?>
                            <a href="<?php print(get_permalink($ContactPage->ID)); ?>" class="button">Give us a call</a>
                        </div>
                    </div>
                </div>
            </div>
        </footer>

        <?php wp_footer(); ?>

        <script type="text/javascript" src="https://secure.raab3frog.com/js/163205.js"></script>
        <noscript><img src="https://secure.raab3frog.com/163205.png" alt="" style="display:none;" /></noscript>
        <!-- Start of HubSpot Embed Code -->
        <script type="text/javascript" id="hs-script-loader" async defer src="//js.hs-scripts.com/9127120.js"></script>
        <!-- End of HubSpot Embed Code -->
    </body>
</html>
