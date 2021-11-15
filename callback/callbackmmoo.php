<?php
require_once('../config.php');


// vui lòng không để lộ api và link callback để bảo mật web

date_default_timezone_set('Asia/Ho_Chi_Minh');


// vui lòng tự bọc hàm để bảo mật tránh bị tấn công XSS, SQL
$noidung = check_string($_POST['noidung']);
$tien = abs($_POST['tien']);
$idapi = check_string($_POST['idapi']);
$key = check_string($_POST['api_key']);
$tranid =  check_string($_POST['tranid']);

$check1 = md5($id_api.$api_key);
$check2 = md5($idapi.$key);
if($key != ''){
    if($check1 == $check2){
        // Thực hiện cộng tiền cho khách
        $time = date("d/m/y");
          $ketnoi->query("UPDATE users SET `money` = `money` + '$tien', `total_nap` = `total_nap` + '$tien' WHERE `username` = '".$noidung."' ");
   $create = $ketnoi->query("INSERT INTO momo SET 
                                `tranId` = '$tranid',
                                `username` = '".$noidung."',
                                `time` = '$time',
                                `tien` = '$tien'");
        
    }
}

