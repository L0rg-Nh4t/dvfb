<?php
session_start();
require("head.php");
if(!isset($_SESSION['username']))
{
    header('location: login.php');
}

if ($user["level"]=="0"){
    $capdo="Thường";
}
if ($user["level"]=="1"){
    $capdo="Đại Lý";
}
if ($user["level"]=="3"){
    $capdo="ADMIN";
}
?>


<section class="admin-content">
    <div class="container p-t-20">
        <div class="row">
            <div class="col-12 m-b-10"><h3><?=$site_brand;?></h3></div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="card m-b-30">
                    <div class="card-header"><h5 class="card-title m-b-0">Chuyển tiền ATM (Admin Duyệt)</h5></div>
                    <div class="card-body">
                        <div class="table-responsive text-center">
                            <table class="table table-borderless mb-0">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Số tài khoản</th>
                                        <th>Chủ tài khoản</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>MBBANK</td>
                                        <td>
                                            <b class="text-success" id="username_tsr">0670105925555</b> <a class="copy"
                            data-clipboard-target="#username_tsr"><i class="fa fa-copy"></i></a>
                                        </td>
                                        <td><b class="text-success">Bùi Văn Quyết</b></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        <p class="text-danger text-center pt-1">Vui lòng nhập đúng nội dung chuyển khoản bên dưới để được công tiền (click để coppy cho chuẩn).</p>
                        <div class="d-flex justify-content-center">
                            <div class="card-pair"><b class="text-danger" id="content_momo">NEWVIPFB <?=$user["username"]?></b><a class="copy"
                            data-clipboard-target="#content_momo"><i class="fa fa-copy"></i></a></div>
                            
                        </div>
                        
                    </div>
                </div>
            </div>
        </div>
        
    </div>
    <hr>
</section>
    </hr>



       



       <!-- Modal Logout -->
          <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabelLogout"
            aria-hidden="true">
            <div class="modal-dialog" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalLabelLogout">Ohh No!</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                <div class="modal-body">
                  <p>Are you sure you want to logout?</p>
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-outline-primary" data-dismiss="modal">Cancel</button>
                  <a href="logout.php" class="btn btn-primary">Logout</a>
                </div>
              </div>
            </div>
          </div>

        </div>
        
        <?php require("footer.php"); ?>