<?php require("head.php"); ?>
<?php
session_start();
if(!isset($_SESSION['username']))
{
    header('location: login.php');
}


if( isset($_POST['submit']) && isset($_POST['link_post']) && isset($_POST['amount'])){
$amount=$_POST['amount'];
$link_post=$_POST['link_post'];

if(isset($_POST['note'])){
$note=$_POST['note'];
}else{
    $note="";
}
    if ($amount < 100) 
	{
		die('<script type="text/javascript">alert("Số Lượng Không Được Dưới 100");setTimeout(function(){ location.href = "" },1000);</script>');
    }
    
    $total_pay = $amount * $ratelike;
    
        if ($user['money'] < $total_pay){
            die('<script type="text/javascript">alert("Bạn Không Có Đủ Số Dư");setTimeout(function(){ location.href = "" },1000);</script>');
        }

$url="https://muasubngon.com/api/service/order-like-post";


$ch = curl_init();
    curl_setopt( $ch, CURLOPT_RETURNTRANSFER, 1 );
    curl_setopt( $ch, CURLOPT_URL, $url);
    curl_setopt( $ch, CURLOPT_POST, 3);
    curl_setopt( $ch, CURLOPT_POSTFIELDS, "link_post=".$link_post."&amount=".$amount."&note=".$note);
	$headers = array(
		"Authorization: Bearer ".$muasubngon_token
	 );
	curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);

    $a = json_decode(curl_exec($ch), true);
    curl_close( $ch );



if ($a["message"] == "Mua thành công")
{
    


$ketnoi->query("UPDATE `users` SET 
                `money` =  `money` - '".$total_pay."'
                    WHERE `username` =  '".$user['username']."' ");
 
$create = $ketnoi->query("INSERT INTO `like` SET 
                                `order_code` = '".$a["data"]["order_code"]."',
                                `username` = '".$user["username"]."',
                                `amount` = '".$a["data"]["amount"]."',
                                `link_post` = '".$a["data"]["link_post"]."'");
                                

echo '<script type="text/javascript">alert("'.$a["message"].'");</script>';

}else{
echo '<script type="text/javascript">alert("'.$a["message"].'");</script>';
}
    
}

?>

        
        
<div class="container p-t-30">
    <div class="row">
        <div class="col-12 m-b-10"><h3><?=$site_brand;?></h3></div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="card m-b-30">
                <div class="card-header"><h5 class="card-title m-b-30">Thêm đơn</h5></div>
                <div class="card-body">
                    <form action="" method="post">
                                                    
                        <div class="form-group row">
                            <label class="col-md-2">Link bài viết:</label>
                            <div class="col-md-10"><input type="url" class="form-control" name="link_post" placeholder="Nhập link bài viết cần tăng" value="" /></div>
                        </div>
                        <div class="form-group row">
                            <label class="col-md-2">Số lượng:</label>
                            <div class="col-md-10"><input type="number" class="form-control" oninput="check()" id="amount" name="amount" placeholder="Nhập số lượng cần mua" value="100" /></div>
                        </div>
                        <div class="form-group row">
                            <label class="col-md-2">Ghi chú:</label>
                            <div class="col-md-10"><textarea class="form-control" name="note" rows="5" placeholder="Nhập ghi chú nếu cần"></textarea></div>
                        </div>
                        <div class="form-group row">
                            <div class="col-md-2"></div>
                            <div class="col-md-10">
                                <div class="alert alert-warning" role="alert">
                                    <h3 class="mb-0 text-danger">CHÚ Ý DỊCH VỤ!</h3>
                                    <ul class="pt-2">
                                        <li>Mua bằng link bài viết đã mở chế độ công khai, đã mở nút like.</li>
                                        <li>Tất cả đều là người dùng Việt Nam.</li>
                                        <li>Đơn càng to thì lên sẽ càng nhanh</li>
                                        <li>Sau khi mua thì chỉ từ 1p đến 20p bắt đầu chạy.</li>
                                        <li>Chế độ bảo hành trong 10 ngày khi tụt trên 10% sẽ được buff lại số đã tụt.</li>
                                        <li>Chúng tôi không hoàn tiền cho đơn đã thanh toán.</li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-sm-12 text-center">
                                <div class="alert alert-dismissible alert-success">
                                    <h3 class="font-bold">
                                        Tổng thanh toán: <span class="bold green"><span id="total_payment" class="text-danger"><?=$ratelike * 100?></span> VNĐ</span>
                                    </h3>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn btn-success btn-block btn-lg" name="submit"><i class="fa fa-shopping-cart"></i> Thanh toán</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
<hr>    
</div>
</hr>
<div class="container p-t-20">
<div class="row">
        <div class="col-md-12">
            <div class="card m-b-30">
            <div class="row">
                <div class="col-md-12">
                    <div class="card m-b-30">
                        <div class="card-header"><h5 class="card-title m-b-0">Danh sách đơn</h5></div>
                        <div class="card-body">
                            <div>
                                <div class="row mb-3">
                                    <div class="col-6 col-md-6 text-left"><input type="number" min="1" max="0" class="form-control form-control-sm" placeholder="Trang" value="1" style="max-width: 90px;" /></div>
                                    <div class="col-6 col-md-6 text-right">
                                        <select id="custom-select-show" type="select" class="form-control form-control-sm" style="max-width: 90px; float: right;">
                                            <option value="10">10 hàng</option>
                                            <option value="20">20 hàng</option>
                                            <option value="30">30 hàng</option>
                                            <option value="40">40 hàng</option>
                                            <option value="50">50 hàng</option>
                                            <option value="100">100 hàng</option>
                                            <option value="0">Tất cả (0 hàng)</option>
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
                                                    <div title="Toggle SortBy" class="text-center" style="cursor: pointer;">Link</div>
                                                    <div style="margin-top: 5px;"><input placeholder="Từ khóa ..." class="form-control form-control-sm" value="" style="min-width: 90px;" /></div>
                                                </th>
                                                <th colspan="1" role="columnheader">
                                                    <div title="Toggle SortBy" class="text-center" style="cursor: pointer;">Số lượng</div>
                                                    <div style="margin-top: 5px;"><input placeholder="Từ khóa ..." class="form-control form-control-sm" value="" style="min-width: 90px;" /></div>
                                                </th>
                                                <th colspan="1" role="columnheader">
                                                    <div title="Toggle SortBy" class="text-center" style="cursor: pointer;">Đã tăng</div>
                                                    <div style="margin-top: 5px;"><input placeholder="Từ khóa ..." class="form-control form-control-sm" value="" style="min-width: 90px;" /></div>
                                                </th>
                                                <th colspan="1" role="columnheader">
                                                    <div title="Toggle SortBy" class="text-center" style="cursor: pointer;">Ghi chú</div>
                                                    <div style="margin-top: 5px;"><input placeholder="Từ khóa ..." class="form-control form-control-sm" value="" style="min-width: 90px;" /></div>
                                                </th>
                                                <th colspan="1" role="columnheader">
                                                    <div title="Toggle SortBy" class="text-center" style="cursor: pointer;">Tổng thanh toán</div>
                                                    <div style="margin-top: 5px;"><input placeholder="Từ khóa ..." class="form-control form-control-sm" value="" style="min-width: 90px;" /></div>
                                                </th>
                                                <th colspan="1" role="columnheader"><div title="Toggle SortBy" class="text-center" style="cursor: pointer;">Trạng thái</div></th>
                                            </tr>
                                        </thead>
                                        <tbody role="rowgroup">
                                            <?php
                                            
$url="https://muasubngon.com/api/service/list-like-post";
$code="MSN_W615VVITNXIT";
$ch = curl_init();
    curl_setopt( $ch, CURLOPT_RETURNTRANSFER, 1 );
    curl_setopt( $ch, CURLOPT_URL, $url);
	$headers = array(
		"Authorization: Bearer ".$muasubngon_token
	 );
	 curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);

    $a =curl_exec($ch);
?>



<?php
$result = mysqli_query($ketnoi,"SELECT * FROM `like` WHERE `username` = '".$user['username']."'");
while($row = mysqli_fetch_assoc($result)){
	foreach (json_decode($a,true)["data"] as $arr){
		$order_code = $arr["order_code"];
		if ($order_code == $row["order_code"]){
            
			?>
			
			<tr>
    <td role="cell"><?=$arr["created_at"]?></td>
    <td role="cell"><?=$arr["order_code"]?></td>
    <td role="cell"><?=$arr["link_post"]?></td>
    <td role="cell"><?=$arr["amount"]?></td>
    <td role="cell"><?=$arr["buff"]?></td>
    <td role="cell"><textarea class="form-control" rows="3" readonly="" style="min-width: 150px;"><?=$arr["note"]?></textarea></td>
    <td role="cell">
        <p><b class="text-danger"><?=$arr["amount"] * $ratelike?></b>&nbsp;<sup>VNĐ</sup></p>
    </td>
    <td role="cell">
        <div><button type="button" class="btn btn-info btn-sm"><?=$arr["status"]?></button></div>
    </td>
</tr>

			
<?php
		}
	}
}
    curl_close( $ch );



?>


                                            
                                            

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




  






<script>
function check() {
    var x = document.getElementById("amount");
    result = x.value * <?=$ratelike?>;
    $("#total_payment").html(result);
}
</script>
</html>
<?php require("footer.php"); ?>

