<?php
require("config.php");

session_start();
if(isset($_POST['submit']))
{
    sleep(3);
    $username = check_string($_POST['username']);
    $password = check_string($_POST['password']);
    $query = $ketnoi->query("SELECT * FROM users WHERE username = '$username' ")->fetch_array();
    if ($username == "" || $password =="") 
    {
        echo "<script>alert('Thất Bại, Vui lòng điền vào ô trống !');</script>";
    }
    else if(empty($query))
    {
        echo '<script>alert("Tài khoản không tồn tại trong hệ thống !");</script>';
    }
    else if($password != $query['password'])
    {
        echo '<script>alert("Mật khẩu không chính xác");</script>';
    }
    else
    {
        $_SESSION['username'] = $username;
        //GHI NHẬT KÝ HOẠT ĐỘNG
        
        
        die('<script>setTimeout(function(){ location.href = "/" },1000);</script>');
    
    
    
    
    }
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

<!-- NGUYỄN VŨ TRƯỜNG HUY  -->
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
								<h3 class="text-center p-b-20 fw-400">Đăng nhập tài khoản</h3>
								<div class="form-row">
									<div class="form-group floating-label col-md-12">
										<label>Tài khoản</label>
      <label for="login-mail"><i class="fa fa-user"></i></label>
      <input id="login-mail" type="text" name="username" class="form-control"  placeholder="Username" required>
    </div>
    <div class="form-group floating-label col-md-12">
										<label>Mật Khẩu</label>
      <label for="login-password"><i class="fa fa-lock"></i></label>
      <input id="login-password" type="password" name="password" class="form-control" placeholder="Password" required>
    </div>
 
    <button  type="submit" name="submit" onclick="check()" class="btn btn-primary btn-block btn-lg">Đăng nhập</button>
<center><p class="text-center p-t-10">Chưa có tài khoản? 
								<a class="text-underline" href="/register.php">Đăng ký</a> </center>
							</p>
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
