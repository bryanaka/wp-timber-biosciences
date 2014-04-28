<?php
function process_property_form($form) {
    // Have to write a formatted email when submitting this email
    $requestor_name = $form[6];
    $requestor_lab_id = $form[7];
    $requestor_location = $form[8];
    $requestor_phone = $form[12];
    $requestor_email = $form[11];
    $alternate_name = $form[13];
    $alternate_lab_id = $form[14];
    $alternate_location = $form[15];
    $alternate_email = $form[16];
    $alternate_phone = $form[17];
    $doe_number = $form[45];
    $description = $form[26];
    $model = $form[27];
    $serial_number = $form[28];
    $offsite_address = $form[29];
}