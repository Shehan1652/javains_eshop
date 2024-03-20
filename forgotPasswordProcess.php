<?php

include "connection.php";

include "SMTP.php";
include "PHPMailer.php";
include "Exception.php";

use PHPMailer\PHPMailer\PHPMailer;

if(isset($_GET["e"])){
    
    $email = $_GET["e"];

    $rs = Database::search("SELECT * FROM `user` WHERE `email` = '".$email."'");
    $num = $rs->num_rows;

    if ($num == 1){

        $code = uniqid();
        Database::iud("UPDATE `user` SET `verification_code` = '".$code."' WHERE `email` = '".$email."'");

        //email code
        $mail = new PHPMailer;
        $mail->IsSMTP();
        $mail->Host = 'smtp.gmail.com';
        $mail->SMTPAuth = true;
        $mail->Username = '**************************************';
        $mail->Password = '*************************';
        $mail->SMTPSecure = 'ssl';
        $mail->Port = 465;
        $mail->setFrom('*************************', 'Reset Password');
        $mail->addReplyTo('************************', 'Reset Password');
        $mail->addAddress($e);
        $mail->isHTML(true);
        $mail->Subject = '****************************';
        $bodyContent = '**************************';
        $bodyContent .= '******************';
        $mail->Body    = $bodyContent;
        
    }else{
        echo ("Invalid Email Address.");
    }

}else{
    echo ("Please enter your email address in email field.");
}

?>