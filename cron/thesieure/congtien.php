<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
require("get_tx.php");
date_default_timezone_set('Asia/Ho_Chi_Minh');
foreach ($tx as $trans){
    $ma_gd=$trans->{"ma_gd"};
    $all_tx=file_get_contents("trans.txt");
    foreach (explode(PHP_EOL,$all_tx) as $gd){
        if ($ma_gd == $gd){
            continue 2;
        }
    }
    
    if (strpos($all_tx, $ma_gd) !== false) {
        continue;
    }
    
    $tien=$trans->{"so_tien"};
    if (strpos($tien, '-') !== false) {
        continue;
    }
    $trang_thai=$trans->{"trang_thai"};
    $noi_dung=$trans->{"noi_dung"};
    if (strpos($noi_dung, $site_nd_tsr) !== false) {
    }else{
        continue;
    }
    
    $username=explode($site_nd_tsr." ", $noi_dung)[1];
    $so_tien_nap=str_replace("đ","",$tien);
    $so_tien_nap=str_replace(",","",$so_tien_nap);
    
    require_once('../../config.php');


        $time = date("d/m/y");
        $ketnoi->query("UPDATE users SET `money` = `money` + '".abs($so_tien_nap)."', `total_nap` = `total_nap` + '".abs($so_tien_nap)."' WHERE `username` = '".$username."' ");
    
       $create = $ketnoi->query("INSERT INTO tsr SET 
                                `tranId` = '$ma_gd',
                                `username` = '".$username."',
                                `time` = '$time',
                                `tien` = '$so_tien_nap'");
    
    
    
    $file = fopen("trans.txt", "a+");
    fwrite($file,$ma_gd."\n");
    fclose($file);
}
?>