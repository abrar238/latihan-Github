<?php 
session_start();
  $cek=isset($_SESSION['$username' & '$password']);
  if (empty($cek)) {
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <title>Example</title>
<meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <script src="js/jquery-3.5.1.min.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <link rel="stylesheet" href="css/bootstrap.min.css">
</head>

<body>
<style type="text/css">
  body{
    background-image:url("img/imgs.jpg"); 
    background-size: cover;
    background-attachment: fixed;
    font-size: 15px;
    font-family: Times New Rowman;
  }

  .card{
      background-color: rgba(0,0,0,0.4);
      color: white;
      width: 280px;
      position: absolute;
      top: 150px;
      left: 50%;
      transform: translateX(-50%);
  }
  .card-title{
    font-size: 20px; 
  }
  .form-grop{
    font-size: 15px;
  }
</style>
          <div class="container-sm">
                <div class="card  border-white shadow p-3 mb-5">
                <div class="card-body">
                  <h5 class="card-title">Sign In </h5>
                  <p class="card-text">
                    <form method="POST" action="proseslogin.php" >
                      <div class="form-group">
                        <label for="formGroupExampleInput" >Username</label>
                        <input type="text" class="form-control" id="formGroupExampleInput" name="username" style="height: 30px">
                      </div>
                      <div class="form-group">
                        <label for="exampleInputPassword1">Password </label>
                        <input type="password" class="form-control" id="exampleInputPassword1" name="password" style="height: 30px">
                      </div>
                      <button type="submit" class="btn btn-primary btn-sm" name="login_btn">Submit</button>
                    </form>
                  </p>
                </div>
              </div>
            </div>
</body>
</html>
<?php 
} else {
    header("location:index.php");
} 
?>