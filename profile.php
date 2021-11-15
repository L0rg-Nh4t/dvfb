<?php
require("head.php");
if (isset($_POST["action"])){
    $action=$_POST["action"];
    if ($_POST["old_password"] == $user["password"]){
        $ketnoi->query('UPDATE `users` SET password="'.$_POST["new_password"].'" WHERE username="'.$user["username"].'";');
        echo '<script>alert("Thành Công Đổi Mật Khẩu Thành : '.$_POST["new_password"].' Cho Username : '.$user["username"].'");</script>';
    }
}
?>



<section class="admin-content">
    
        <div class="bg-dark m-b-30">
            <div class="container">
                <div class="row p-b-60 p-t-60">
                </div>
            </div>
        </div>
        <div class="container pull-up">
            <div class="row">
                <div class="col-md-7">
                    <div class="card m-b-30">
                        <div class="card-header"><h5 class="card-title m-b-0">Thông tin tài khoản</h5></div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group"><label>Họ và tên:</label><input type="text" class="form-control" readonly="" value="<?=$user["username"];?>" /></div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group"><label>Email:</label><input type="text" class="form-control" readonly="" value="<?=$user["email"];?>" /></div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group"><label>Số dư:</label><input type="text" class="form-control" readonly="" value="<?=$user["money"];?> VNĐ" /></div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group"><label>Đã nạp:</label><input type="text" class="form-control" readonly="" value="<?=$user["total_nap"];?> VNĐ" /></div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group"><label>Đã tiêu:</label><input type="text" class="form-control" readonly="" value="<?=$user["total_nap"] - $user["money"];?> VNĐ" /></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-5">
                    <div class="card m-b-30">
                        <div class="card-header"><h5 class="card-title m-b-0">Đổi mật khẩu</h5></div>
                        <div class="card-body">
                            <form action="" method="POST">
                                <input type="hidden" class="form-control" name="action" value="change_pass" />
                                <div class="form-group"><label>Mật khẩu cũ:</label><input type="password" class="form-control" placeholder="Nhập mật khẩu cũ" name="old_password" value="" required /></div>
                                <div class="form-group"><label>Mật khẩu mới:</label><input type="password" class="form-control" placeholder="Nhập mật khẩu mới" name="new_password" value="" required /></div>
                                <div class="form-group"><label>Mật khẩu mới:</label><input type="password" class="form-control" placeholder="Nhập lại mật khẩu mới" name="confirm_new_password" value="" required /></div>
                                <div class="form-group"><button type="submit" class="btn btn-primary btn-block btn-lg">Thay đổi</button></div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
</div></div>
</section>





<?php
require("footer.php");
?>