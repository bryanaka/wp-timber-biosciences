<?php

//Require all form handlers in the lib/onestop folder
$onestop_form_handlers_dir = BIOSCIENCES_PATH.'/lib/onestop';
foreach(scandir($onestop_form_handlers_dir) as $filename) {
    $path = $onestop_form_handlers_dir . '/' . $filename;
    if (is_file($path)) {
        require_once $path;
    }
}


function register_form_processors() {
    add_action('ninja_forms_post_process', 'process_form');
}
add_action('init', 'register_form_processors');

function process_form() {
    global $ninja_forms_processing;

    $form_id = $ninja_forms_processing->get_form_ID();
    $form = $ninja_forms_processing->get_all_fields();

    switch($form_id) {
        case 2: // Property form
            process_properties_form($form);
            break;
        case 3:
            process_facilities_form($form);
            break;
        case 4:
            process_travel_form($form);
            break;
    }

}