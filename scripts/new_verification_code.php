<?php
        require "mail.php";
        require_once "database.php";
        session_start();
        $email = $_SESSION['email'];
        $verificationCode = str_pad(rand(1000, 9999), 4, '0', STR_PAD_LEFT);
        $sql = "UPDATE verification SET code=$verificationCode WHERE email = '$email'";
        if(mysqli_query($conn, $sql)){
            $subject = "Email verification";
            $mailSent = send_mail($email, $subject, $verificationCode );
            if ($mailSent) {
                header("Location: verification.php");
                die();
            }else{
                die("Something went wrong");
            }
        }

?>