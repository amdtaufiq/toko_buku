<?php

	include_once("function/koneksi.php");
	include_once("function/helper.php");

  $pesan = $_GET['pesan'];
	$query = mysqli_query($koneksi, "SELECT * FROM user WHERE email = '$email'");
	$row = mysqli_fetch_assoc($query);
	// $password = base64_decode($row["password"]);
	// echo $password; die();
	require 'PHPMailer-master/PHPMailerAutoload.php';

	$mail = new PHPMailer();
  
  //Enable SMTP debugging.
  $mail->SMTPDebug = 1;
  //Set PHPMailer to use SMTP.
  $mail->isSMTP();
  //Set SMTP host name
  $mail->Host = "smtp.gmail.com";
  $mail->SMTPOptions = array(
                    'ssl' => array(
                        'verify_peer' => false,
                        'verify_peer_name' => false,
                        'allow_self_signed' => true
                    )
                );
  //Set this to true if SMTP host requires authentication to send email
  $mail->SMTPAuth = TRUE;
  //Provide username and password
  $mail->Username = "amdt8661q@gmail.com";
  $mail->Password = "";
  //If SMTP requires TLS encryption then set it
  $mail->SMTPSecure = "false";
  $mail->Port = 587;
  //Set TCP port to connect to
  
  $mail->From = "olshopecommerce@gmail.com";
  $mail->FromName = "Olshop";
  
  $mail->addAddress($row["email"]);
  
  $mail->isHTML(true);
 
  $mail->Subject = "lupa password";
  $mail->Body = "<i>kode : </i>".$row["password"]."<br> copy kode diatas dan cek disini : https://www.md5online.org/ ";
  $mail->AltBody = "copy kode diatas dan cek disini : https://www.md5online.org/ ";
  if(!$mail->send())
  {
   echo "Mailer Error: " . $mail->ErrorInfo;
  }
  else
  {
   echo "cek your email";
	header("location: ".BASE_URL."index.php?page=login");
  }
?>