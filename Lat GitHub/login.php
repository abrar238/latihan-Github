<?php 
session_start();
$SesNik = isset($_SESSION['Nik'])?$_SESSION['Nik']:null;
if (empty($SesNik)) {
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <title>Login Area | Finance Integration</title>
    <link href="css/login/font-icons/font-awesome/css/font-awesome.min.css" rel="stylesheet" />

    <link href="plugins/login/bootstrap/css/bootstrap.css" rel="stylesheet" />
    <link href="plugins/login/node-waves/waves.css" rel="stylesheet" />
    <link href="plugins/login/animate-css/animate.css" rel="stylesheet" />
    <link href="css/login/style.css" rel="stylesheet">
    <style type="text/css">
        .alert-danger {
            padding:7px 10px !important;
            font-size: 12px;
            font-weight:400;
            background: #fc7c7c;
        }
        .msg {
            margin-bottom:14px !important;
            font-weight:600;
        }
        .input-group {
            margin-bottom: 15px;
        }
    </style>

</head>

<body class="login-page">
    <div class="login-box">
        <div class="logo">
            <a href="javascript:void(0);">SiASET<b>IT</b></a>
            <small>Sistem Informasi Aset IT</small>
        </div>
        <div class="card">
            <div class="body">
                <form id="FromLogin">
                    <div class="msg">Login</div>
                    <div id="Validasi"></div>
                    <div class="input-group">
                        <input type="text" class="form-control" name="Username" id="Username" placeholder="Username">
                    </div>
                    <div class="input-group">
                        <input type="password" class="form-control" name="Password" id="Password" placeholder="Password">
                    </div>
                    <div class="row">
                        <div class="col-sm-12">
                            <button type="button" class="btn bg-pink waves-effect" onclick="Login()">LOG IN</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <script src="plugins/login/jquery/jquery.min.js"></script>
    <script src="plugins/login/bootstrap/js/bootstrap.js"></script>
    <script src="plugins/login/node-waves/waves.js"></script>
    <script src="plugins/admin.js"></script>
    <script type="text/javascript">
        function Login()  {
            var Forms = ['Username','Password'];
            for (i=0;i<=Forms.length-1;i++) {
                if ($("#"+Forms[i]).val() == "") {
                    $("#"+Forms[i]).focus();
                    $("#Validasi").html("<div class='alert alert-danger'>Lengkapi "+Forms[i]+" !</div>");
                    return false;
                }
            }

            data=$("#FromLogin").serialize();
            $.ajax({
                type    : "POST",
                url     : "proseslogin.php",
                data    : "proses=login&"+data,
                beforeSend: function () { 
                    setTimeout(function () { $('.page-loader-wrapper').fadeIn(); }, 50);
                },
                success :function(result) {
                    if (result=="sukses") {
                        setTimeout(function () { $('.page-loader-wrapper').fadeOut(); }, 50);
                        window.location.href='index.php';
                    } else {
                        setTimeout(function () { $('.page-loader-wrapper').fadeOut(); }, 50);
                        $("#Validasi").html("<div class='alert alert-danger'>Gagal Login !</div>");
                    }
                }
            });
        }
    </script>

</body>
</html>

<?php 
} else {
    header("location:index.php");
} 
?>
