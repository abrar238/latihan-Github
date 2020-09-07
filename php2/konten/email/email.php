<h3>Message</h3>

<?php 
    if(isset($_POST['submit'])){

        require 'PHPMailerAutoload.php';

        $mail=new PHPMailer;
        $mail->SMTPDebug=4;
        $mail->isSMTP();

        $mail->Host = 'smtp.gmail.com';
        $mail->SMTPAuth= true;
        $mail->Username=EMAIL;
        $mail->Password=PASS;
        $mail->SMTPSecure='tls';
        $mail->Port=587;

        $mail->setForm(EMAIL,'schnee');
        $mail->addAddress($_POST['email']); 

        $mail->addReplyTo(EMAIL); 

        $mail->isHTML(true);   

        $mail->Subject=$_POST['subjek'];
        $mail->Body=$_POST['pesan'];
        $mail->AltBody=$_POST['file'];

        if($mail->send()){
            echo 'pesan gagal dikirim';
            echo 'Mailer Error'.$mail->ErrorInfo;
        }else{
        echo 'pesan terkirim';
        }   
    }
 ?>



<form  method="POST">

<div class="form-group row">
    <label for="exampleInputEmail1" class="col-sm-1 col-form-label">Kepada</label>
    <div class="form-group col-md-3">
    <input type="email" name="email_penerima" class="form-control form-control-sm" id="exampleInputEmail1" aria-describedby="emailHelp" style="height: 25px">
	</div>
</div>

<div class="form-group row">
    <label for="exampleInputEmail1" class="col-sm-1 col-form-label">Subjek</label>
    <div class="form-group col-md-3">
    <input class="form-control form-control-sm" type="text" name="subjek" style="height: 25px">
	</div>
</div>

<div class="form-group row">
    <label for="Pesan" class="col-sm-1 col-form-label">Pesan</label><br>
    <div class="form-group col-md-3">
    <textarea class="form-control" id="pesan" name="pesan" style="width:250px"></textarea>
	</div>
</div>

    <input type="file" name="file" class="form-control-file" id="exampleFormControlFile1"><br>

<button type="submit" value="submit" name="submit"class="btn btn-outline-primary btn-sm">Kirim</button>

</form>