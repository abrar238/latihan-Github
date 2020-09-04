<?php include "koneksi.php"; 
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Example</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <link rel="stylesheet" href="css/bootstrap.min.css">
  <script src="js/jquery-3.5.1.min.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <script type="jquery/jquery-ui.min.js"></script>
  <style type="text/css">
  body{
    font-size: 15px;
    font-family: Times New Rowman;
    position: sticky-top;
  }
</style>
</head>

<body>
<nav class="navbar navbar-expand-lg navbar-dark bg-dark " style="height:30px ">
  <a class="navbar-brand " href="#">
  Navbar</a>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item active">
        <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#">About</a>
      </li>
    </ul>
    <form class="form-inline my-2 my-lg-0">
      </label>
       <img class="rounded-circle" src="img/lg.jpg " alt="logo" style="width:25px;"><label for="name" style="color:white"><?php echo $_SESSION['username'];?>
    </form>
  </div>
</nav>
      <div class="row">
      <div class="col-xs">
      <?php include 'menus.php'; ?>
      </div>
      <div class="container">
          <div class="col-xl">
      <?php include 'home.php'; ?>
      </div>
        </div>
      </div>
</body>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.4.0/fullcalendar.css" />
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.18.1/moment.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.4.0/fullcalendar.min.js"></script>
</html>