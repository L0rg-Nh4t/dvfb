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
        <div class="container">
        <div class="row">
            <div class="col-12 m-b-10"><h3><?=$site_brand;?></h3></div>
        </div>
        <div class="row">
            <div class="col-md-12 m-b-10">
                <div class="card m-b-30">
                    <div class="card-header"><h5 class="card-title m-b-0">Chuyển tiền (auto)</h5></div>
                    <div class="card-body">
                        <div class="table-responsive text-center">
                            <table class="table table-borderless mb-0">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>SĐT</th>
                                        <th>Chủ tài khoản</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>MOMO</td>
                                        <td>
                                            <b class="text-success" id="username_momo">0336853148</b> <a class="copy"
                            data-clipboard-target="#username_momo"><i class="fa fa-copy"></i></a>
                                        </td>
                                        <td><b class="text-success">NGUYỄN ANH KIỆT</b></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        <p class="text-danger text-center pt-1">Vui lòng nhập đúng nội dung chuyển khoản bên dưới để được công tiền (click để coppy cho chuẩn).</p>
                        <div class="d-flex justify-content-center">
                            <div class="card-pair"><b class="text-danger" id="content_momo" value="<?=$noidungmomo;?> <?=$user["username"]?>"><?=$noidungmomo;?> <?=$user["username"]?> </b><a class="copy"
                            data-clipboard-target="#content_momo"><i class="fa fa-copy"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
    </div>
    <hr>
</section>
    </hr>

<div class="container p-t-20">
    <div class="card m-b-30">
<div class="card m-b-30">
    <div class="card-header"><h5 class="card-title m-b-0">Lịch sử nạp</h5></div>
    <div class="card-body">
        <div>
            <div class="row mb-3">
                <div class="col-6 col-md-6 text-left"><input type="number" min="1" max="1" class="form-control form-control-sm" placeholder="Trang" value="1" style="max-width: 90px;" /></div>
                <div class="col-6 col-md-6 text-right">
                    <select id="custom-select-show" type="select" class="form-control form-control-sm" style="max-width: 90px; float: right;">
                        <option value="10">10 hàng</option>
                        <option value="20">20 hàng</option>
                        <option value="30">30 hàng</option>
                        <option value="40">40 hàng</option>
                        <option value="50">50 hàng</option>
                        <option value="100">100 hàng</option>
                        <option value="1">Tất cả (1 hàng)</option>
                    </select>
                </div>
            </div>
            <div class="table-responsive">
                <table role="table" class="table table-sm table-bordered table-striped table-hover">
                    <thead>
                        <tr role="row">
                            <th colspan="1" role="columnheader">
                                <div title="Toggle SortBy" class="text-center" style="cursor: pointer;">Thời gian</div>
                                <div style="margin-top: 5px;"><input placeholder="Từ khóa ..." class="form-control form-control-sm" value="" style="min-width: 90px;" /></div>
                            </th>
                            <th colspan="1" role="columnheader">
                                <div title="Toggle SortBy" class="text-center" style="cursor: pointer;">Mã giao dịch</div>
                                <div style="margin-top: 5px;"><input placeholder="Từ khóa ..." class="form-control form-control-sm" value="" style="min-width: 90px;" /></div>
                            </th>
                            <th colspan="1" role="columnheader">
                                <div title="Toggle SortBy" class="text-center" style="cursor: pointer;">Số tiền</div>
                                <div style="margin-top: 5px;"><input placeholder="Từ khóa ..." class="form-control form-control-sm" value="" style="min-width: 90px;" /></div>
                            </th>
                            <th colspan="1" role="columnheader">
                                <div title="Toggle SortBy" class="text-center" style="cursor: pointer;">Nội dung</div>
                                <div style="margin-top: 5px;"><input placeholder="Từ khóa ..." class="form-control form-control-sm" value="" style="min-width: 90px;" /></div>
                            </th>
                        </tr>
                    </thead>
                    <tbody role="rowgroup">
<?php
$i = 0;
$result = mysqli_query($ketnoi,"SELECT * FROM `momo` WHERE `username` = '".$user['username']."'");
while($row = mysqli_fetch_assoc($result)){ ?>
                        <tr>
                            <td role="cell"><?=$row["time"]?></td></td>
                            <td role="cell"><?=$row["tranId"]?></td>
                            <td role="cell">
                                <p><b class="text-danger"><?=$row["tien"]?></b>&nbsp;<sup>VNĐ</sup></p>
                            </td>
                            <td role="cell"><?=$row["username"]?></td>
                        </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
            <div class="row pt-3 mb-3">
                <div class="col-6 col-md-6 text-left">
                    <button type="button" disabled="" class="btn-sm btn btn-primary disabled">Trang đầu</button><button type="button" disabled="" class="ml-1 btn-sm btn btn-primary disabled">«</button>
                </div>
                <div class="col-6 col-md-6 text-right">
                    <button type="button" disabled="" class="mr-1 btn-sm btn btn-primary disabled">»</button><button type="button" disabled="" class="btn-sm btn btn-primary disabled">Trang cuối</button>
                </div>
            </div>
        </div>
    </div>
</div>

       
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