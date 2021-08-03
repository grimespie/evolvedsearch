<?php

/**
 * Core framework
 *
 * Enqueues bootstrap and other assets.
 */
include_once("core/init.php");


/**
 * CPTs
 *
 * Create custom post types.
 */
include_once("cpt/all.php");


/**
 * Menus
 *
 * Create header, footer and other menus.
 */
function fwk_menus() {
    register_nav_menu("primary", __("Primary Menu", "theme")); 
    register_nav_menu("footer-1", __("Footer Menu 1", "theme"));
    register_nav_menu("footer-2", __("Footer Menu 2", "theme"));
    register_nav_menu("footer-3", __("Footer Menu 3", "theme"));
    register_nav_menu("mobile-menu", __("Mobile Menu", "theme"));
}

add_action("after_setup_theme", "fwk_menus");


/**
 * Options Page
 *
 * Create a global options page for ACF
 */
function my_acf_op_init() {
    if(function_exists('acf_add_options_page')) {
        $option_page = acf_add_options_page(array(
            'page_title'    => __('Evolved Settings'),
            'menu_title'    => __('Evolved Settings'),
            'menu_slug'     => 'evolved-general-settings',
            'capability'    => 'edit_posts',
            'redirect'      => false
        ));
    }
}

add_action('acf/init', 'my_acf_op_init');



/**
 * Images
 *
 * Set image crop sizes
 */
add_image_size("insights-main-square", 450, 450, true);
add_image_size("case-study-tile", 700, 700, true);
add_image_size("sector-square", 900, 900, true);
add_image_size("profile-picture", 500, 500, true);
add_image_size("block-image-small", 600, 600, true);
add_image_size("block-image-large", 1200, 600, true);
add_image_size("insights-form-image", 670, 420, true);



/**
 * Stats
 *
 * Seup stats for animation and styling
 */
function setup_stat($stat) {
    if(preg_match("/^\+([0-9]+)(\%)/", $stat, $matches)) {
        $stat = '+<span class="num" data-num="' . $matches[1] . '">' . $matches[1] . '</span><span class="percent">%</span>';
    }
    else if(preg_match("/^([0-9]+)(\+)/", $stat, $matches)) {
        $stat = '<span class="num" data-num="' . $matches[1] . '">' . $matches[1] . '</span>+';
    }
    else if(preg_match("/^([0-9]+)(\%)/", $stat, $matches)) {
        $stat = '<span class="num" data-num="' . $matches[1] . '">' . $matches[1] . '</span><span class="percent">%</span>';
    }

    return($stat);
}



function get_global_email_template() {
        ob_start();

        get_template_part("templates/email/email", "global");

        $template = ob_get_contents();

        ob_end_clean();

        return($template);
}

function get_email_userfields_row($label, $value) {
        $userfields_row = '<tr><td align="left"><br><span style="color:#555555;font-size:18px;line-height:120%">' . $label . '</span><br><span style="font-weight:bold;font-family:\'Helvetica Neue\',Helvetica,Arial,sans-serif;color:#333333;font-size:18px;margin:0 0 20px">' . $value . '</span></td></tr>';

        return($userfields_row);
}

function send_evolved_email($to, $subject, $message, $attachments) {
    $headers = "MIME-Version: 1.0" . "\r\n" . "From: Evolved Search <no-reply@evolvedsearch.co.uk>" . "\r\n" . 'Content-type: text/html; charset=iso-8859-1' . "\r\n";

    wp_mail($to, $subject, $message, $headers, $attachments);
}

function send_contact_email() {
    $to      = "info@evolvedsearch.co.uk";
    $subject = "Page Contact Form";
    $message = get_global_email_template();

    $user_fields     = array();
    $user_fields_str = "";

    if($_POST["full_name"] != "") {
        array_push($user_fields, array("Name", $_POST["full_name"]));
    }

    if($_POST["email"] != "") {
        array_push($user_fields, array("Email", $_POST["email"]));
    }

    if($_POST["telephone"] != "") {
        array_push($user_fields, array("Telephone", $_POST["telephone"]));
    }

    if($_POST["business_name"] != "") {
        array_push($user_fields, array("Business Name", $_POST["business_name"]));
    }

    if($_POST["url"] != "") {
        array_push($user_fields, array("URL", $_POST["url"]));
    }

    if($_POST["message"] != "") {
        array_push($user_fields, array("Message", $_POST["message"]));
    }

    $interestedin_pos = array("digitalpr", "seo", "content", "ppc", "all");
    $interestedin_str = "";

    foreach($interestedin_pos as $interest) {
        if(isset($_POST[$interest])) {
            if($interestedin_str == "") {
                $interestedin_str = $interest;
            }
            else {
                $interestedin_str .= ", " . $interest;
            }
        }
    }

    if($interestedin_str != "") {
        array_push($user_fields, array("Interested In", $interestedin_str));
    }

    $message = preg_replace("/__EMAILTITLE__/", $subject, $message);

    foreach($user_fields as $user_field) {
        $user_fields_str .= get_email_userfields_row($user_field[0], $user_field[1]);
    }

    $message = preg_replace("/__USERFIELDS__/", $user_fields_str, $message);

    send_evolved_email($to, $subject, $message, $attachments);

    return(true);
}

function send_application_email($vacancy_title) {
    $to      = array("info@evolvedsearch.co.uk", "sinead@evolvedsearch.co.uk");
    $subject = "Application Form";
    $message = get_global_email_template();

    $user_fields     = array();
    $user_fields_str = "";

    $applying_for = "Speculative application";

    if($vacancy_title) {
        $applying_for = $vacancy_title;
    }

    array_push($user_fields, array("Vacancy", $applying_for));

    if($_POST["first_name"] != "") {
        array_push($user_fields, array("First Name", $_POST["first_name"]));
    }

    if($_POST["last_name"] != "") {
        array_push($user_fields, array("Last Name", $_POST["last_name"]));
    }

    if($_POST["email"] != "") {
        array_push($user_fields, array("Email", $_POST["email"]));
    }

    $message = preg_replace("/__EMAILTITLE__/", $subject, $message);

    foreach($user_fields as $user_field) {
        $user_fields_str .= get_email_userfields_row($user_field[0], $user_field[1]);
    }

    $message = preg_replace("/__USERFIELDS__/", $user_fields_str, $message);


    $CV_Server_File = "";
    $CL_Server_File = "";

    // Files
    if(isset($_FILES["cv"]["name"])) {
        $WPUploadDir = wp_upload_dir();
        $target_dir  = $WPUploadDir["basedir"] . "/applications/";
        $target_url  = $WPUploadDir["baseurl"] . "/applications/";
        $extension   = pathinfo(basename($_FILES["cv"]["name"]), PATHINFO_EXTENSION);

        if($extension != "") {
            $target_file = $target_dir . preg_replace("/ /", "-", $_POST["first_name"] . "-" . $_POST["last_name"] . "-cv-" . get_the_ID()) . "." . $extension;
            $file_url    = $target_url . preg_replace("/ /", "-", $_POST["first_name"] . "-" . $_POST["last_name"] . "-cv-" . get_the_ID()) . "." . $extension;

            move_uploaded_file($_FILES["cv"]["tmp_name"], $target_file);

            $CV_URL = $file_url;
            $CV_Server_File = $target_file;
        }
    }

    if(isset($_FILES["cl"]["name"])) {
        $WPUploadDir = wp_upload_dir();
        $target_dir  = $WPUploadDir["basedir"] . "/applications/";
        $target_url  = $WPUploadDir["baseurl"] . "/applications/";
        $extension   = pathinfo(basename($_FILES["cl"]["name"]), PATHINFO_EXTENSION);

        if($extension != "") {
            $target_file = $target_dir . preg_replace("/ /", "-", $_POST["first_name"] . "-" . $_POST["last_name"] . "-cl-" . get_the_ID()) . "." . $extension;
            $file_url    = $target_url . preg_replace("/ /", "-", $_POST["first_name"] . "-" . $_POST["last_name"] . "-cl-" . get_the_ID()) . "." . $extension;

            move_uploaded_file($_FILES["cl"]["tmp_name"], $target_file);

            $CL_URL = $file_url;
            $CL_Server_File = $target_file;
        }
    }


    $upload_dir_info = wp_upload_dir();
    $attachments     = array();

    if($CV_URL != "") {
        array_push($attachments, str_replace($upload_dir_info["baseurl"], $upload_dir_info["basedir"], $CV_URL));
    }

    if($CL_URL != "") {
        array_push($attachments, str_replace($upload_dir_info["baseurl"], $upload_dir_info["basedir"], $CL_URL));
    }


    // send_evolved_email($to, $subject, $message, $attachments);





    // Add to People HR

    // Split up name details
    /*
    $Name = $_POST["full_name"];
    $NameSegments = explode(" ", trim($Name));

    $FirstName = array_shift($NameSegments);
    $LastName  = implode(" ", $NameSegments);
    */

    $FirstName = $_POST["first_name"];
    $LastName  = $_POST["last_name"];

    $VacancyReference = "";

    // Get post id and vacancy refernce - if we have the vacancy_title in this funciton, then we are coming from a vacancy page rather than speculative
    if($vacancy_title) {
        $VacancyReference = get_post_meta(get_the_ID(), "peoplehr_vacancy_ref", true);
    }
    else {
        // if we are here then its speculative and we cant post to People HR.
        return(true);
    }

    $ApplicantDetails = array(
                          "APIKey" => "c42818f5-b8b2-4c14-a26f-e978bf2f788a",
                          "Action" => "CreateNewApplicant",
                          "VacancyReference" => $VacancyReference,
                          "FirstName" => $FirstName,
                          "LastName" => $LastName,
                          "Email" => $_POST["email"],
                          "Skills" => "dummy"
                         );

    $ch = curl_init();

    curl_setopt($ch,CURLOPT_URL, "https://api.peoplehr.net/Applicant");
    curl_setopt($ch,CURLOPT_POST, true);
    curl_setopt($ch,CURLOPT_POSTFIELDS, json_encode($ApplicantDetails));
    curl_setopt($ch,CURLOPT_RETURNTRANSFER, true);

    //execute post
    $result = curl_exec($ch);

    if(is_user_logged_in()) {
        var_dump($result);
    }

    $ApplicantReturn = json_decode($result);

    // If the create applicant was a success, then we upload any associated files to PeopleHR also
    if(!$ApplicantReturn->isError) {
        // Get file details for CV if it exists
        if($CV_Server_File) {
            $path = $CV_Server_File;
            $type = pathinfo($path, PATHINFO_EXTENSION);
            $data = file_get_contents($path);
            $base64 = base64_encode($data);

            $FileDetails = array(
                                 "APIKey" => "c42818f5-b8b2-4c14-a26f-e978bf2f788a",
                                 "Action" => "uploadapplicantdocument",
                                 "ApplicantId" => $ApplicantReturn->Result->ApplicantId,
                                 "DocumentName" => basename($path),
                                 "File" => $base64
                                );

            $ch = curl_init();

            curl_setopt($ch,CURLOPT_URL, "https://api.peoplehr.net/Applicant");
            curl_setopt($ch,CURLOPT_POST, true);
            curl_setopt($ch,CURLOPT_POSTFIELDS, json_encode($FileDetails));
            curl_setopt($ch,CURLOPT_RETURNTRANSFER, true);

            //execute post
            $result = curl_exec($ch);

            if(is_user_logged_in()) {
                var_dump($result);
            }

            $FileReturn = json_decode($result);
        }

        // Get file details for CL if it exists
        if($CL_Server_File) {
            $path = $CL_Server_File;
            $type = pathinfo($path, PATHINFO_EXTENSION);
            $data = file_get_contents($path);
            $base64 = base64_encode($data);

            $FileDetails = array(
                                 "APIKey" => "c42818f5-b8b2-4c14-a26f-e978bf2f788a",
                                 "Action" => "uploadapplicantdocument",
                                 "ApplicantId" => $ApplicantReturn->Result->ApplicantId,
                                 "DocumentName" => basename($path),
                                 "File" => $base64
                                );

            $ch = curl_init();

            curl_setopt($ch,CURLOPT_URL, "https://api.peoplehr.net/Applicant");
            curl_setopt($ch,CURLOPT_POST, true);
            curl_setopt($ch,CURLOPT_POSTFIELDS, json_encode($FileDetails));
            curl_setopt($ch,CURLOPT_RETURNTRANSFER, true);

            //execute post
            $result = curl_exec($ch);

            if(is_user_logged_in()) {
                var_dump($result);
            }

            $FileReturn = json_decode($result);
        }
    }

    return(true);
}



function send_insight_email($insight_title) {
    $to      = array("info@evolvedsearch.co.uk");
    $subject = $insight_title;
    $message = get_global_email_template();

    $user_fields     = array();
    $user_fields_str = "";

    array_push($user_fields, array("Insight", $insight_title));

    if($_POST["first_name"] != "") {
        array_push($user_fields, array("First Name", $_POST["first_name"]));
    }

    if($_POST["last_name"] != "") {
        array_push($user_fields, array("Last Name", $_POST["last_name"]));
    }

    if($_POST["email"] != "") {
        array_push($user_fields, array("Email", $_POST["email"]));
    }

    if($_POST["company"] != "") {
        array_push($user_fields, array("Company", $_POST["company"]));
    }

    if(isset($_POST["hear_services"])) {
        array_push($user_fields, array("I'm interested in hearing about your services", "Yes"));
    }
    else {
        array_push($user_fields, array("I'm interested in hearing about your services", "No"));
    }

    if(isset($_POST["just_report"])) {
        array_push($user_fields, array("I just want the report", "Yes"));
    }
    else {
        array_push($user_fields, array("I just want the report", "No"));
    }

    $message = preg_replace("/__EMAILTITLE__/", $subject, $message);

    foreach($user_fields as $user_field) {
        $user_fields_str .= get_email_userfields_row($user_field[0], $user_field[1]);
    }

    $message = preg_replace("/__USERFIELDS__/", $user_fields_str, $message);

    send_evolved_email($to, $subject, $message, $attachments);

    return(true);
}



function alter_case_study_query($query) {
    global $wp_query;

    if(!is_admin() && $query->is_main_query() && is_post_type_archive("case-study")) {
        $query->set("meta_key", "main_page_order");
        $query->set("orderby", "meta_value_num");
        $query->set("order", "ASC");

        return;
    }
}

add_action("pre_get_posts", "alter_case_study_query");



function seo_cpt_og_image() {
    if(is_archive()) {
        if(is_post_type_archive("case-study")) {
            $Image = get_field("case_studies_og_image", "option");
            ?>

            <meta property="og:image" content="<?php print($Image["sizes"]["large"]); ?>" />
            <meta property="og:image:width" content="1024" />
            <meta property="og:image:height" content="640" />

        <?php
        }

        if(is_post_type_archive("vacancy")) {
            $Image = get_field("careers_og_image", "option");
            ?>

            <meta property="og:image" content="<?php print($Image["sizes"]["large"]); ?>" />
            <meta property="og:image:width" content="1024" />
            <meta property="og:image:height" content="640" />

        <?php
        }
    }
}

add_action("wp_head", "seo_cpt_og_image");




function peoplehr_vacancy_ref_metabox( ) {
    global $wp_meta_boxes;

    add_meta_box('peoplehr_vacancy_ref', __('People HR Vacancy Ref'), 'peoplehr_vacancy_ref_metabox_html', 'vacancy', 'normal', 'high');
}

add_action( 'add_meta_boxes_vacancy', 'peoplehr_vacancy_ref_metabox' );

function peoplehr_vacancy_ref_metabox_html() {
    global $post;

    $ApplicantDetails = array(
                              "APIKey" => "c42818f5-b8b2-4c14-a26f-e978bf2f788a",
                              "Action" => "GetAllVacancies"
                             );

    $ch = curl_init();

    curl_setopt($ch,CURLOPT_URL, "https://api.peoplehr.net/Vacancy");
    curl_setopt($ch,CURLOPT_POST, true);
    curl_setopt($ch,CURLOPT_POSTFIELDS, json_encode($ApplicantDetails));
    curl_setopt($ch,CURLOPT_RETURNTRANSFER, true);

    //execute post
    $result = curl_exec($ch);

    $Vacancies = json_decode($result);
    ?>

    <label>Select associated PeopleHR vacancy:</label>
    <select name="peoplehr_vacancy_ref">
    <option value="">-- select a vacancy --</option>

    <?php
    foreach($Vacancies->Result as $Vacancy) {
        $Selected = "";

        if(get_post_meta($post->ID, "peoplehr_vacancy_ref", true) == $Vacancy->Reference) {
            $Selected = "selected";
        }

        print('<option ' . $Selected . ' value="' . $Vacancy->Reference . '">' . $Vacancy->VacancyName . '</option>');
    }
    ?>

    </select>

<?php
}

function peoplehr_vacancy_ref_save_post() {
    if(empty($_POST)) return; //why is prefix_teammembers_save_post triggered by add new? 
    global $post;

    update_post_meta($post->ID, "peoplehr_vacancy_ref", $_POST["peoplehr_vacancy_ref"]);
}   

add_action( 'save_post_vacancy', 'peoplehr_vacancy_ref_save_post' );   



?>
