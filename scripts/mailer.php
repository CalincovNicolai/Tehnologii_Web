<?php

if ($_POST) {
    $to = "theblackdstels@gmail.com";
    $email = filter_var($_POST["email"], FILTER_SANITIZE_EMAIL);
    $subject = filter_var($_POST["subject"], FILTER_SANITIZE_STRING);
    $message = filter_var($_POST["message"], FILTER_SANITIZE_STRING);
    $body = "Message: $message\nE-mail: $email";

    $headers = 'From: ' . $email . "\r\n" .
        'Reply-To: ' . $email . "\r\n" .
        'X-Mailer: PHP/' . phpversion();

    if (@mail($to, $subject, $body)) {
        $output = json_encode(array('success' => true));
        die($output);
    } else {
        $output = json_encode(array('success' => false));
        die($output);
    }
}
