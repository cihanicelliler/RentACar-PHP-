<?php
// header("Content-Type:text/html; charset=UTF-8");

// use PHPMailer\PHPMailer\PHPMailer;
// use PHPMailer\PHPMailer\SMTP;
// use PHPMailer\PHPMailer\Exception;

// require 'Frameworks/PHPMailer/src/Exception.php';
// require 'Frameworks/PHPMailer/src/PHPMailer.php';
// require 'Frameworks/PHPMailer/src/SMTP.php';


// if (isset($_POST["FirstName"])) {
//     $FirstName = $_POST["FirstName"];
// } else {
//     $FirstName = "";
// }
// if (isset($_POST["LastName"])) {
//     $LastName = $_POST["LastName"];
// } else {
//     $LastName = "";
// }
// if (isset($_POST["Subject"])) {
//     $Subject = $_POST["Subject"];
// } else {
//     $Subject = "";
// }
// if (isset($_POST["Message"])) {
//     $Message = $_POST["Message"];
// } else {
//     $Message = "";
// }

// if (($FirstName != "") and  ($LastName != "") and ($Subject != "") and ($Message!="")) {
 

// //    $Mail = new PHPMailer(true);
//     try{
//         $Mail->SMTPDebug			=	0;
//         $Mail->isSMTP();
//         $Mail->Host				=	'icellilercihan@gmail.com';
//         $Mail->SMTPAuth			=	true;
//         $Mail->CharSet			=	'UTF-8';
//         $Mail->Username			=	'icellilercihan@gmail.com';
//         $Mail->Password			=	'123456';
//         $Mail->SMTPSecure			=	'tls';
//         $Mail->Port				=	587;
//         $Mail->SMTPOptions		=	array(
//                                                 'ssl' => [
//                                                     'verify_peer' => false,
//                                                     'verify_peer_name' => false,
//                                                     'allow_self_signed' => true
//                                                 ],
//                                             );
//         $Mail->setFrom('icellilercihan@gmail.com', 'Cihan İçelliler');
//         $Mail->addAddress('icellilercihan@gmail.com', 'Cihan İçelliler');
//         $Mail->addReplyTo($FirstName, $LastName);
//         $Mail->isHTML(true);
//         $Mail->Subject			=	$Subject;
//         $Mail->MsgHTML($Message);
//         //$Mail->Body    = 'Mailin Gövdesi';
//         //$Mail->AltBody = 'Mailin Gövdesi (HTML mail kabul etmeyen sunucular için)';
//         $Mail->send();
//         echo 'Mail Gönderildi';
//     }catch(Exception $e) {
//         echo 'Mail Gönderim Hatası<br />Hata Açıklaması : ', $Mail->ErrorInfo;
//     }
// } else {
//     header("Location:index.php?PageNo=3");
//     exit();
// }
?>