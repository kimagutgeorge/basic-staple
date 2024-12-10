<?php
error_reporting(E_ERROR | E_PARSE);
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

$action=$_GET['action'];
if(empty($action)){
    echo "Access Denied";
}else{

//Load Composer's autoloader
require '../vendor/autoload.php';
if($action=='btn-contact'){
 //Create an instance; passing `true` enables exceptions
 $mail = new PHPMailer(true);
 
 try {
     //Server settings
     $mail->SMTPDebug =0;                      
     $mail->isSMTP();                                         
     $mail->Host       = 'smtp.gmail.com';                     
     $mail->SMTPAuth   = true;                                 
     $mail->Username   = ' ';  //your email                 
     $mail->Password   = '';       //password                       
     $mail->SMTPSecure = 'ssl';            
     $mail->Port       = 465;                      
 
     //Recipients
     $mail->setFrom('', '');  //('senderemail', 'recepient Name');
     $mail->addAddress('');    //recepient email 
     $mail->addReplyTo($_POST['email'], $_POST['name']);
 
 
     //Content //Set email format to HTML
     $mail->Subject = $_POST['name'];
     $mail->Body    = $_POST['message'];
     
    
     $mail->send();
     echo "Thank You. We will get back to you soon";
 } catch (Exception $e) {
     echo "Mail sending Failed";
}
}
}
?>