<?php
use Timber as Timber;

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
    $item_1 = array(
        'doe_number' => $form[45],
        'description' => $form[26],
        'model' => $form[27],
        'serial_number' => $form[28],
        'offsite_address' => $form[29]
    );
    $items = array($item_1);

    $context = array(
        'requestor_name' => $requestor_name,
        'requestor_lab_id' => $requestor_lab_id,
        'requestor_location' => $requestor_location,
        'requestor_phone' => $requestor_phone,
        'requestor_email' => $requestor_email,
        'alternate_name' => $alternate_name,
        'alternate_lab_id' => $alternate_lab_id,
        'alternate_location' => $alternate_location,
        'alternate_email' => $alternate_email,
        'alternate_phone' => $alternate_phone,
        'items' => $items
    );

    // Get HTML form of email body
    $message = Timber::compile('templates/property.twig', $context);

    // Set email headers

    // for multiple recipients, you can use a comma
    $to  = 'pbdproperty@lbl.gov'; //. ', '; // note the comma

    // subject
    $subject = 'Property Pass Authorization Request';

    // To send HTML mail, the Content-type header must be set
    $headers  = 'MIME-Version: 1.0' . "\n";
    $headers .= 'Content-type: text/html; charset=utf-8' . "\n";

    // Additional headers
    $headers .= 'To: PBD Property <pbdproperty@example.com>' . "\n";
    $headers .= 'From: PBD-Do-Not-Reply <do-not-reply@lbl.gov>, '.$requestor_name.' <'.$requestor_email.'>' . "\n";
    $headers .= "Reply-To: PBD-Do-Not-Reply <do-not-reply@lbl.gov>" . "\n";
    $headers .= 'Cc: '.$requestor_name.' <'.$requestor_email.'>, '.$alternate_name.' <'.$alternate_email.'>'."\n";
    //$headers .= 'Bcc: birthdaycheck@example.com' . "\r\n";

    mail($to, $subject, $message, $headers);
}