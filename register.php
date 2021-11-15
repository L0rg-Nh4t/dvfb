<?php
require("config.php");
session_start();
if(isset($_POST['submit']))
{
    sleep(3);
    $username = check_string($_POST['username']);
    $email = check_string($_POST['email']);
    $password = check_string($_POST['password']);
    $query_username = $ketnoi->query("SELECT * FROM users WHERE username = '$username' ");
    $query_email = $ketnoi->query("SELECT * FROM users WHERE email = '$email' ");
    if($query_username->num_rows != 0)
    {
        echo '<script type="text/javascript">alert("Tài khoản đã tồn tại trong hệ thống !");</script>';
    }
    else if($query_email->num_rows != 0)
    {
        echo '<script type="text/javascript">alert("Địa chỉ Email đã tồn tại !");</script>';
    }
    else
    {
        $create = $ketnoi->query("INSERT INTO `users` SET 
        `password` = '".$password."',
        `username` = '".$username."',
        `email` = '".$email."',
        `money` = '0',
        `level` = '0',
        `total_nap` = '0',
        `time` = now()");
        if ($create)
        {
            $_SESSION['username'] = $username;
            die('<script type="text/javascript">setTimeout(function(){ location.href = "/" },1000);</script>');
        }}
    }
?>
<!DOCTYPE html>
<html lang="en" >
<head>
  <meta charset="UTF-8">
  <title><?=$site_brand;?> - Đăng Nhập</title>
  <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.2.0/css/font-awesome.min.css'>
    <link rel="stylesheet" href="/css/bostrap.min.css">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
</head>
<body>
<!--------------------------------------------------------|
| DỊCH VỤ THIẾT KẾ WEB NGUYỄN VŨ TRƯỜNG HUY               |
|       ZALO : 0369784374                                 |
|---------------------------------------------------------!>
<br><br>
  <div class="container p-t-30">
    <div class="row">

    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="card m-b-30">

    <form class="user" action="" method="post">
 
                <div class="card-body"> 
					<div class="row align-items-center">
						<div class="mx-auto col-md-8">
							<form>
								<div class="p-b-20 text-center"> 
									<p>
										<img src="<?=$url_logo;?>" width="80" alt="">
									</p>
									<p class="admin-brand-content"><?=$site_brand;?></p>
								</div>
								<h3 class="text-center p-b-20 fw-400">Đăng kí tài khoản</h3>
								<div class="form-row">
									<div class="form-group floating-label col-md-12">
										<label>Email</label>
      <label for="login-mail"><i class="fa fa-envelope"></i></label>
      <input id="login-mail" type="text" name="email" class="form-control" placeholder="Email" required>
    </div>
    <div class="form-group floating-label col-md-12">
										<label>Tài Khoản</label>
      <label for="login-mail"><i class="fa fa-user"></i></label>
      <input id="login-mail" type="text" name="username" class="form-control"  placeholder="Username" required>
    </div>
    <div class="form-group floating-label col-md-12">
										<label>Mật Khẩu</label>
      <label for="login-password"><i class="fa fa-lock"></i></label>
      <input id="login-password" type="password" name="password" class="form-control" placeholder="Password" required>
 
    </div>

    <button  type="submit" name="submit" onclick="check()" class="btn btn-primary btn-block btn-lg">Đăng kí</button>
    <center><p class="text-center p-t-10">Bạn đã có tài khoản? <a class="text-underline" href="login.php">Đăng nhập</a></p></center>
  </div>
  <div class="finished">
 
  </div>
</div>


<!-- //--- ## SVG SYMBOLS ############# -->
<svg style="display:none;">
  <symbol id="svg-check" viewBox="0 0 130.2 130.2">
    <polyline points="100.2,40.2 51.5,88.8 29.8,67.5 "/>
  </symbol>
</svg>
<!-- partial -->
  <script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js'></script>

<script>
function check() {
  $(".login")
    .addClass("loading")
    .delay(2200)
    .queue(function() {
      $(this).addClass("active");
    });
}
  </script>

</body>
</html>
