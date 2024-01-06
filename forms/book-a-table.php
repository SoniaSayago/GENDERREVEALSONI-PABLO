<!-- <?php
  /**
  * Requires the "PHP Email Form" library
  * The "PHP Email Form" library is available only in the pro version of the template
  * The library should be uploaded to: vendor/php-email-form/php-email-form.php
  * For more info and help: https://bootstrapmade.com/php-email-form/
  */

  // Replace contact@example.com with your real receiving email address
  // $receiving_email_address = 'ssayagos@gmail.com';

  // if( file_exists($php_email_form = '../assets/vendor/php-email-form/php-email-form.php' )) {
  //   include( $php_email_form );
  // } else {
  //   die( 'Unable to load the "PHP Email Form" Library!');
  // }

  // $book_a_table = new PHP_Email_Form;
  // $book_a_table->ajax = true;
  
  // $book_a_table->to = $receiving_email_address;
  // $book_a_table->from_name = $_POST['name'];
  // $book_a_table->from_email = $_POST['email'];
  // $book_a_table->subject = "New table booking request from the website";

  // Uncomment below code if you want to use SMTP to send emails. You need to enter your correct SMTP credentials
  /*
  $book_a_table->smtp = array(
    'host' => 'example.com',
    'username' => 'example',
    'password' => 'pass',
    'port' => '587'
  );
  */

  // $book_a_table->add_message( $_POST['name'], 'Name');
  // $book_a_table->add_message( $_POST['email'], 'Email');
  // $book_a_table->add_message( $_POST['phone'], 'Phone', 4);
  // $book_a_table->add_message( $_POST['date'], 'Date', 4);
  // $book_a_table->add_message( $_POST['time'], 'Time', 4);
  // $book_a_table->add_message( $_POST['people'], '# of people', 1);
  // $book_a_table->add_message( $_POST['message'], 'Message');

  // echo $book_a_table->send();
?> -->

<?php

// use assets/vendor/php-email-form;

use "../assets/vendor/php-email-form";

if(isset($_POST['name']) && isset($_POST['email'])){
    $name = $_POST['name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $people = $_POST['people'];
    $message = $_POST['message'];

    require_once "assets/vendor/php-email-form/PHPMailer.php";
    require_once "assets/vendor/php-email-form/SMTP.php";
    require_once "assets/vendor/php-email-form/Exception.php";

    $mail = new PHPMailer();

    //smtp settings
    $mail->isSMTP();
    $mail->Host = "smtp.gmail.com";
    $mail->SMTPAuth = true;
    $mail->Username = "soniaypablo2022@gmail.com";
    $mail->Password = 'xeguqbyxhwdqvvwi';
    $mail->Port = 465;
    $mail->SMTPSecure = "ssl";

    //email settings
    $mail->isHTML(true);
    $mail->setFrom($email, $name);
    $mail->addAddress("soniaypablo2022@gmail.com");
    $mail->Subject = ("$email ($subject)");
    $mail->Body = $body;

    if($mail->send()){
        $status = "success";
        $response = "Email is sent!";
    }
    else
    {
        $status = "failed";
        $response = "Something is wrong: <br>" . $mail->ErrorInfo;
    }

    exit(json_encode(array("status" => $status, "response" => $response)));
}

?>
