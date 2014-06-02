<?php

function register_property_processing() {
    add_action('ninja_forms_post_process', 'process_property_form');
}
add_action('init', 'register_property_processing');

function process_property_form() {
    global $ninja_forms_processing;
    $form_id = $ninja_forms_processing->get_form_ID();
    if ($form_id == 2) {
        // Now can do stuff with property form
    }
}