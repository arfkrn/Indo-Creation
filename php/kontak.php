<?php 
	
	use PHPMailer\PHPMailer\PHPMailer;
	use PHPMailer\PHPMailer\Exception;

		require '../vendor/autoload.php';
	
	$namaPengirim = $_POST["user"];
	$emailPengirim = $_POST["email"];
	$pesanPengirim = $_POST["pesan"];

	if (isset($_POST["kirim"])) {
		$mail = new PHPMailer(true);

	    //Server settings
	    $mail->isSMTP();                                            //Send using SMTP
	    $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
	    $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
	    $mail->Username   = 'indocreation1@gmail.com';                     //SMTP username
	    $mail->Password   = 'Iniakunindocreation123';                               //SMTP password
	    $mail->Port       = 587;                                    //TCP port to connect to; use 587 if you have

	    //Recipients
	    $mail->setFrom($emailPengirim, $namaPengirim);
	    $mail->addAddress('indocreation1@gmail.com', 'Indo Creation');     //Add a recipient
	    $mail->addReplyTo($emailPengirim, $namaPengirim);

	    //Content
	    $mail->isHTML(true);                                  //Set email format to HTML
	    $mail->Subject = 'Contact us';
	    $mail->Body    = $pesanPengirim;

	    $mail->send();
	}

 ?>