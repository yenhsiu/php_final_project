<?php
// Import PHPMailer classes into the global namespace
// These must be at the top of your script, not inside a function

$to='yan00098@gmail.com';
$subject="熱音社新成員申請";
$content='id:'.$_POST['id'].'<br/>grade:'.$_POST['grade'].'<br/>name:'.$_POST['name'].'<br/>e-mail: '.$_POST['email'];
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
require '/PHPMailer/src/Exception.php';
require '/PHPMailer/src/PHPMailer.php';
require '/PHPMailer/src/SMTP.php';
// Instantiation and passing `true` enables exceptions
$mail = new PHPMailer(true);

try {
    //Server settings
    $mail->SMTPDebug = 0; //show所有訊息  可改1                                    // Enable verbose debug output
    $mail->isSMTP();                                            // Set mailer to use SMTP
    $mail->Host       = 'smtp.gmail.com';  // Specify main and backup SMTP servers
    $mail->SMTPAuth   = true;                                   // Enable SMTP authentication
    $mail->Username   = 'yan00098@gmail.com';                     // SMTP username
    $mail->Password   = 'hgule1225';                               // SMTP password
    $mail->SMTPSecure = 'ssl';                                  // Enable TLS-(587) encryption, `ssl` -(465)also accepted
    $mail->Port       = 465;                                    // TCP port to connect to

    //Recipients
    $mail->setFrom('from@example.com', 'Mailer');
    //$mail->addAddress('a1065527@mail.nuk.edu.tw', 'Joe User');     // Add a recipient
    $mail->addAddress('a1065536@mail.nuk.edu.tw');
    $mail->addAddress($to);  
    //$mail->addAddress('a1065504@mail.nuk.edu.tw');  
    //$mail->addAddress('j9841842@gmail.com');              // Name is optional
    $mail->addReplyTo('info@example.com', 'Information');
    $mail->addCC('cc@example.com');//附件
    $mail->addBCC('bcc@example.com');//

    // Attachments
    //$mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
    //$mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name

    // Content
    $mail->isHTML(true);  
    $subject = "=?utf-8?B?".base64_encode($subject)."?=";                                // Set email format to HTML
    $mail->Subject = $subject;
    $mail->Body    = nl2br($content);
    //$mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

    $mail->send();
    echo '<h1>申請成功</h1>';
    header("Refresh:1;url='xd.php");
} catch (Exception $e) {
    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
}