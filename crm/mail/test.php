<?php
include ("../config.php");
$addes = mysqli_query($link,"select * from frominfo_bp where id='$_POST[from]'");
$address = mysqli_fetch_array($addes);
$from = $address['email'];
$pass = $address['password'];
$signature = htmlspecialchars_decode($address['signature']);
//SMTP needs accurate times, and the PHP time zone MUST be set
//This should be done in your php.ini, but this is how to do it if you don't have access to that
date_default_timezone_set('Etc/UTC');

require 'PHPMailerAutoload.php';

$table= $_POST['table'];

if($_POST['check_list'] != ''){
 $id_str = $_POST['check_list'];
//retrieve data from database
 $sql="select * from $table where id in($id_str)";
}
 $result=mysqli_query($link, $sql);

 while($row=mysqli_fetch_array($result))
 {

//Create a new PHPMailer instance
/*$mail = new PHPMailer();

//Tell PHPMailer to use SMTP
$mail->isSMTP();

//Enable SMTP debugging
// 0 = off (for production use)
// 1 = client messages
// 2 = client and server messages
$mail->SMTPDebug = 1;

//Ask for HTML-friendly debug output
$mail->Debugoutput = 'html';

//Set the hostname of the mail server
$mail->Host = 'smtp.gmail.com';

//Set the SMTP port number - 587 for authenticated TLS, a.k.a. RFC4409 SMTP submission
$mail->Port = 587;

//Set the encryption system to use - ssl (deprecated) or tls
//$mail->SMTPSecure = 'tls';
$mail->SMTPSecure = "tls";

//Whether to use SMTP authentication
$mail->SMTPAuth = true;

//Username to use for SMTP authentication - use full email address for gmail
$mail->Username = 'laxman.bigperl@gmail.com';

//Password to use for SMTP authentication
$mail->Password = 'bigperl@123';

//Set who the message is to be sent from
$mail->setFrom('laxman.bigperl@gmail.com', 'BigPerl Solutions Pvt Ltd');*/

require 'class.phpmailer.php';
$mail = new PHPMailer();
$mail->IsSMTP();
$mail->Mailer = 'smtp';
$mail->SMTPAuth = true;
$mail->Host = 'smtp.gmail.com'; 
$mail->Port = 465;
$mail->SMTPSecure = 'ssl';
$mail->Username = "laxman.bigperl@gmail.com";
$mail->Password = "bigperl@123";
 
$mail->IsHTML(true); // if you are going to send HTML formatted emails
$mail->SingleTo = true; // if you want to send a same email to multiple users. multiple emails will be sent one-by-one.
$mail->addAddress("laxman.bigperl@gmail.com","User 1");

//Set an alternative reply-to address
$mail->addReplyTo($from, 'Bigperl solutions Pvt Ltd');
$email = $row['Email'];
$name = $row['Title']."&nbsp;".$row['Name'];
$mail->addAddress($email);
//Set the subject line
$mail->Subject = $_POST['mail_subject'];

//Read an HTML message body from an external file, convert referenced images to embedded,
//convert HTML into a basic plain-text alternative body
//$mail->msgHTML(file_get_contents('contents.html'), dirname(__FILE__));

$body = 'Hello '.$name.'<br/>'.$_POST['post_description']."<br/>".$signature;
$mail->msgHTML($body);
//Replace the plain text body with one created manually
$mail->AltBody = 'This is a plain-text message body';

//Attach an image file
$mail->addAttachment('BigPerl_Solutions_ppt.pptx');

//send the message, check for errors
if($mail->send()){
	header("location:../student.php?status=success");
}else{
	print_r( $mail->ErrorInfo );
}
}


?>

