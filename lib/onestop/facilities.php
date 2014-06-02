<?php

function register_facilities_processing() {
    add_action('ninja_forms_post_processing', 'process_facilities_form');
}
add_action('init', 'register_facilities_processing');

function process_facilities_form() {
    global $ninja_forms_processing;
    $form_id = $ninja_forms_processing->get_form_ID();

    if ($form_id == 3) {
        //Do stuff with facilities form submission
    }
}