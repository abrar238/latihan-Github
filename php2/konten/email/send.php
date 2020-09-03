<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

include ('PHPMailer/Exception.php');
include ('PHPMailer/PHPMailer.php');
include ('PHPMailer/SMTP.php');

$email_pengirim = 'abrar.sputra@gmail.com';
$nama_pengirim = 'schnee';
$email_penerima = $_POST['email_penerima'];
$subjek = $_POST['subjek'];
$pesan = $_POST['pesan'];
$file = $_FILES['file']['tmp_name'];

$mail= new PHPMailer();

$mail->isSMTP();
$mail->isHTML(true);
$mail->SMTPAuth=true;
$mail->SMtpSecure='ssl';
$mail->Host = 'smtp.gmail.com';
$mail->Username = 'schnee';
$mail->Password = 'Sersan@109';
$mail->Port = 465;


$mail->setFrom($email_pengirim, $email_penerima);
$mail->addAddress($email_penerima, 'noreply');

$mail->Subject=$subjek;
$mail->Body=$pesan;
	
if(empty($file)){ 
    $send = $mail->send();
    if($send){ 
        header('location:?hal=message berhasil');
    }else{ 
        header('location:?hal=message gagal');
    }
}else{ 
    $tmp = $_FILES['file']['tmp_name'];
    $size = $_FILES['file']['size'];
    if($size <= 25000000){ 
        $mail->addAttachment($tmp, $file);
        $send = $mail->send();
        if($send){ 
            header('location:?hal=message berhasil');
        }else{ 
            header('location:?hal=message error');
           
        }
    }else{ 
        header('location:?hal=message error');
    }
}
 ?>

