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

/*SIEUTHECAO.VN - HỆ THỐNG ĐỔI THẺ CÀO SIÊU RẺ*/
if(isset($_POST['btnNapCard']) && isset($_SESSION['username']))
{
    $loaithe = check_string($_POST['loaithe']);
    $menhgia = check_string($_POST['menhgia']);
    $seri = check_string($_POST['seri']);
    $pin = check_string($_POST['pin']);
    $code = random('qwertyuiopasdfghjklzxcvbnm1234567890QWERTYUIOPASDFGHJKLZXCVBNM', 12);
    $thucnhan = $menhgia - $menhgia * 22 / 100;
    if (strlen($seri) < 5 || strlen($pin) < 5)
    {
        echo '<script type="text/javascript">alert(Mã thẻ hoặc seri không đúng định dạng!");</script>';
    }
    else
    {
        $json = json_decode(curl_get('https://doicardnhanh.com/api/card-auto.php?type='.$loaithe.'&menhgia='.$menhgia.'&seri='.$seri.'&pin='.$pin.'&APIKey='.$api_key_card.'&callback='.$site_domain.'callback/callback.php&content='.$code), true);
        if (isset($json['data']))
        {
            if ($json['data']['status'] == 'error')
            {
                echo '<script type="text/javascript">alert("'.$json['data']['msg'].'");</script>';
            }
            else if ($json['data']['status'] == 'success')
            {
              $create = $ketnoi->query("INSERT INTO `cards` SET 
              `code` = '".$code."',
              `seri` = '".$seri."',
              `pin` = '".$pin."',
              `loaithe` = '".$loaithe."',
              `menhgia` = '".$menhgia."',
              `thucnhan` = '".$thucnhan."',
              `username` = '".$my_username."',
              `status` = 'xuly',
              `note` = '',
              `createdate` = now() ");
              if($create)
              {
                die('<script type="text/javascript">alert("'.$json['data']['msg'].'");setTimeout(function(){ location.href = "" },1000);</script>');
              }
              else
              {
                echo '<script type="text/javascript">alert(Không thẻ lưu card vào data!");</script>';
              }
            }
        }
    }
}
/*SIEUTHECAO.VN - HỆ THỐNG ĐỔI THẺ CÀO SIÊU RẺ*/



?>





<section class="admin-content">
    <div class="container p-t-20">
        <div class="row">
            <div class="col-12 m-b-10"><h3><?=$site_brand;?></h3></div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="card m-b-30">
                    <div class="card-header"><h5 class="card-title m-b-0">Gửi thẻ cào (auto)</h5></div>
                    <div class="card-body">
                        <form action="" method="post">
                            <div class="row">
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label class="form-label">Loại thẻ:</label>
                                        <select class="form-control" name="loaithe">
                                            <option value="true">--- Chọn loại thẻ ---</option>
                                            <option value="VIETTEL">VIETTEL (Chiết khấu 19)%</option>
                                            <option value="MOBIFONE">MOBIFONE (Chiết khấu 24)%</option>
                                            <option value="VINAPHONE">VINAPHONE (Chiết khấu 19)%</option>
                                            <option value="VIETNAMOBILE">VIETNAMOBILE (Chiết khấu 18)%</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label class="form-label">Mệnh giá:</label>
                                        <select class="form-control" name="menhgia">
                                            <option value="true">--- Chọn mệnh giá thẻ ---</option>
                                            <option value="10000">10.000 VNĐ</option>
                                            <option value="20000">20.000 VNĐ</option>
                                            <option value="30000">30.000 VNĐ</option>
                                            <option value="50000">50.000 VNĐ</option>
                                            <option value="100000">100.000 VNĐ</option>
                                            <option value="200000">200.000 VNĐ</option>
                                            <option value="300000">300.000 VNĐ</option>
                                            <option value="500000">500.000 VNĐ</option>
                                            <option value="1000000">1.000.000 VNĐ</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group"><label class="form-label">Seri:</label><input type="number" class="form-control" name="seri" placeholder="Nhập số seri của thẻ" value="" /></div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group"><label class="form-label">Code:</label><input type="number" class="form-control" name="pin" placeholder="Nhập mã thẻ" value="" /></div>
                                </div>
                            </div>
                            <div class="form-group"><button type="submit" name="btnNapCard" class="btn btn-primary btn-block btn-lg">Nạp ngay</button></div>
                        </form>
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
                                <div title="Toggle SortBy" class="text-center" style="cursor: pointer;">SERI</div>
                                <div style="margin-top: 5px;"><input placeholder="Từ khóa ..." class="form-control form-control-sm" value="" style="min-width: 90px;" /></div>
                            </th>
                            <th colspan="1" role="columnheader">
                                <div title="Toggle SortBy" class="text-center" style="cursor: pointer;">PIN</div>
                                <div style="margin-top: 5px;"><input placeholder="Từ khóa ..." class="form-control form-control-sm" value="" style="min-width: 90px;" /></div>
                            </th>
                            <th colspan="1" role="columnheader">
                                <div title="Toggle SortBy" class="text-center" style="cursor: pointer;">Loại Thẻ</div>
                                <div style="margin-top: 5px;"><input placeholder="Từ khóa ..." class="form-control form-control-sm" value="" style="min-width: 90px;" /></div>
                            </th>
                            <th colspan="1" role="columnheader">
                                <div title="Toggle SortBy" class="text-center" style="cursor: pointer;">Mệnh Giá</div>
                                <div style="margin-top: 5px;"><input placeholder="Từ khóa ..." class="form-control form-control-sm" value="" style="min-width: 90px;" /></div>
                            </th>
                            <th colspan="1" role="columnheader">
                                <div title="Toggle SortBy" class="text-center" style="cursor: pointer;">Thực Nhận</div>
                                <div style="margin-top: 5px;"><input placeholder="Từ khóa ..." class="form-control form-control-sm" value="" style="min-width: 90px;" /></div>
                            </th>

                            <th colspan="1" role="columnheader">
                                <div title="Toggle SortBy" class="text-center" style="cursor: pointer;">Thời Gian</div>
                                <div style="margin-top: 5px;"><input placeholder="Từ khóa ..." class="form-control form-control-sm" value="" style="min-width: 90px;" /></div>
                            </th>
                            <th colspan="1" role="columnheader">
                                <div title="Toggle SortBy" class="text-center" style="cursor: pointer;">Trạng Thái</div>
                                <div style="margin-top: 5px;"><input placeholder="Từ khóa ..." class="form-control form-control-sm" value="" style="min-width: 90px;" /></div>
                            </th>  
                            <th colspan="1" role="columnheader">
                                <div title="Toggle SortBy" class="text-center" style="cursor: pointer;">Ghi Chú</div>
                                <div style="margin-top: 5px;"><input placeholder="Từ khóa ..." class="form-control form-control-sm" value="" style="min-width: 90px;" /></div>
                            </th>    
                        </tr>
                    </thead>
                    <tbody role="rowgroup">
<?php
$i = 0;
$result = $ketnoi->query("SELECT * FROM `cards` WHERE `username` = '".$user['username']."' ORDER BY id desc ");
while( $row = $result->fetch_assoc() ){
?>
                        <tr>
                            <td role="cell"><?=$row["seri"]?></td></td>
                            <td role="cell"><?=$row["pin"]?></td>
                            <td role="cell"><?=$row["loaithe"]?></td>
                            <td role="cell"><?=$row["menhgia"]?></td>
                            <td role="cell">
                                <p><b class="text-danger"><?=$row["thucnhan"]?></b>&nbsp;<sup>VNĐ</sup></p>
                            </td>
                            <td role="cell"><?=$row["createdate"]?></td>
                            <td role="cell"><?=$row["status"]?></td>
                            <td role="cell"><?=$row["note"]?></td>
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