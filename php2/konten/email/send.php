<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;


include('phpmailer/Exception.php');
include('phpmailer/PHPMailer.php');
include('phpmailer/SMTP.php');

$email_pengirim = 'schneer4@gmail.com'; 
$nama_pengirim = 'schnee'; 
$email_penerima = $_POST['email_penerima']; 
$subjek = $_POST['subjek']; 
$pesan = $_POST['pesan']; 
$attachment = $_FILES['attachment']['name']; 
$mail = new PHPMailer;
$mail->isSMTP();

$mail->Host = 'smtp.gmail.com';
$mail->Username = $email_pengirim; 
$mail->Password = 'schnee@23'; 
$mail->Port = 465;
$mail->SMTPAuth = true;
$mail->SMTPSecure = 'ssl';


$mail->setFrom($email_pengirim, $nama_pengirim);
$mail->addAddress($email_penerima, '');
$mail->isHTML(true); 


ob_start();
include "content.php";
$content = ob_get_contents(); 
ob_end_clean();

$mail->Subject = $subjek;
$mail->Body = $content;

if(empty($attachment)){ 
    $send = $mail->send();

    if($send){ 
        echo "<br><h3>pesan berhasil dikirim</h3><hr><br><a href='?hal=message'>Kembali ke Form</a>";
    }else{ 
        echo "<br><h3>pesan gagal dikirim</h3><hr><br><a href='?hal=message'>Kembali ke Form</a>";
        
    }
}else{ 
    $tmp = $_FILES['attachment']['tmp_name'];
    $size = $_FILES['attachment']['size'];

    if($size <= 25000000){ 
        $mail->addAttachment($tmp, $attachment); 

        $send = $mail->send();

        if($send){ 
            echo "<br><h3>pesan berhasil dikirim</h3><hr><br><a href='?hal=message'>Kembali ke Form</a>";
        }else{ 
            echo "<br><h3>pesan gagal dikirim</h3><hr><br><a href='?hal=message'>Kembali ke Form</a>";

        }
    }else{ 
        echo "<br><h3>Ukuran file attachment maksimal 25 MB</h3><hr><br><a ?hal=message'>Kembali ke Form</a>";
    }
}
?>
