<?php
include "koneksi.php";
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <title>Example</title>
<meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="css/bootstrap.min.css">
  <script src="js/jquery-3.5.1.min.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>
</head>

<body>
<br>
<div class="container">
 <div class="row">
    <div class="col">
      
    </div>
            <div class="col">
                <div class="card shadow p-3 mb-5 bg-white rounded" style="width: 23rem;">
                <div class="card-body">
                  <h5 class="card-title">Silakan Login Terlebih Dahulu</h5>
                  <p class="card-text">

                    <form method="POST" action="proseslogin.php" >
                      <div class="form-group">
                        <label for="formGroupExampleInput">Username</label>
                        <input type="text" class="form-control" id="formGroupExampleInput" name="username">
                      </div>
                      <div class="form-group">
                        <label for="exampleInputPassword1">Password</label>
                        <input type="password" class="form-control" id="exampleInputPassword1" name="password">
                      </div>
                      <button type="submit" class="btn btn-primary">Submit</button>
                    </form>

                  </p>
                </div>
              </div>
            </div>
    <div class="col">
      
    </div>
  </div>

</div>
</body>










