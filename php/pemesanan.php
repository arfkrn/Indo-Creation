<?php 

	include 'koneksi.php';

	use PHPMailer\PHPMailer\PHPMailer;
	use PHPMailer\PHPMailer\Exception;

	require '../vendor/autoload.php';

	function pemesanan($data){
		global $koneksi;

		$tipe = $data["tipe"];
		$nama = $data["nama"];
		$noTelp = $data["notelp"];
		$email = $data["email"];
		$catatan = $data["catatan"];



		// upload file
		$namaFile = $_FILES["desain"]["name"];
		$tempName = $_FILES["desain"]["tmp_name"];
		$error = $_FILES["desain"]["error"];
			
		if ($error === 4){
			echo "<script>
				alert('tolong pilih file!');
			</script>;";

			return false;
		}

		$extensiValid = ["jpg", "jpeg", "xd"];
		$extensiUpld = explode(".", $namaFile);
		$extensiUpld = strtolower($extensiUpld[1]);

		if (!in_array($extensiUpld, $extensiValid)) {
			echo "<script>
				alert('extensi file tidak valid!');
			</script>;";

			return false;
		}

		move_uploaded_file($tempName, "../uploaded file/" . $namaFile);
		if (mysqli_query($koneksi, "INSERT INTO pemesanan VALUES('', '$nama', 'noTelp', '$email', '$tipe', '$catatan', '$namaFile')")) {
			$mail = new PHPMailer(true);

	    //Server settings
	    $mail->isSMTP();                                            //Send using SMTP
	    $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
	    $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
	    $mail->Username   = 'indocreation1@gmail.com';                     //SMTP username
	    $mail->Password   = 'Iniakunindocreation123';                               //SMTP password
	    $mail->Port       = 587;                                    //TCP port to connect to; use 587 if you have

	    //Recipients
	    $mail->setFrom('indocreation1@gmail.com', 'Indo Creation');
	    $mail->addAddress($email, $nama);     //Add a recipient
	    $mail->addReplyTo('indocreation1@gmail.com', 'Indo creation');

	    //Content
	    $mail->isHTML(true);                                  //Set email format to HTML
	    $mail->Subject = 'Pemesanan ' . $tipe;
	    $mail->Body    = 'Terimakasih telah percaya kepada layanan kami';

	    $mail->send();

	    return true;
		}

		

	}

?>