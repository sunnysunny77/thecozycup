<?php

function boot_contact_form()
{
    $to_email = $_POST["to_email"];
    $subject = $_POST["subject"];
    $name = $_REQUEST["name"];
    $email = $_REQUEST["email"];
    $message = $_REQUEST["message"];
    $headers = "MIME-Version: 1.0" . "\r\n";
    $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
    $body = "
    <html>
    <p>You have a message from the contact us page on your website:</p>
    <b>Name: </b>".$name."
    <br><b>Email: </b>".$email."
    <br><b>Message: </b>".$message."
    </html>";
    $mail = mail($to_email, $subject, $body, $headers);
    if (!$mail) {
        print_r(error_get_last()['message']);
    } else {
        echo "Thanks, message sent.";
    }
    exit();
}
add_action('wp_ajax_contact_form', "boot_contact_form");
add_action('wp_ajax_nopriv_contact_form', 'boot_contact_form');

function boot_product_form()
{
    $to_email = $_POST["to_email"];
    $subject = $_POST["subject"];
    $title = $_POST["title"];
    $post_id = $_POST["post_id"];
    $price = get_post_meta($post_id, 'price', true);
    $quantity = $_POST["quantity"];
    $total = $quantity * $price;
    $address = $_REQUEST["address"];
    $name = $_REQUEST["name"];
    $email = $_REQUEST["email"];
    $message = $_REQUEST["message"];
    $headers = "MIME-Version: 1.0" . "\r\n";
    $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
    $body = "
    <html>
    <p>You have a message from the product page on your website:</p>
    <b>Title: </b>".$title."
    <br><b>Address: </b>".$address."
    <br><b>Price: </b>".$price."
    <br><b>Quantity: </b>".$quantity."
    <br><b>Total: </b>".$total."
    <br><b>Name: </b>".$name."
    <br><b>Email: </b>".$email."
    <br><b>Message: </b>".$message."
    </html>";
    $mail = mail($to_email, $subject, $body, $headers);
    if (!$mail) {
        print_r(error_get_last()['message']);
    } else {
        echo "Thanks, message sent.";
    }
    exit();
}
add_action('wp_ajax_product_form', "boot_product_form");
add_action('wp_ajax_nopriv_product_form', 'boot_product_form');