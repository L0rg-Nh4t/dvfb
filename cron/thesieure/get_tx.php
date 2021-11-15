<?php
require_once('../../config.php');
require("lib/simple_html_dom.php");
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
$ckfile = 'cookie.txt'; // nhớ tạo thêm file đó

$gdarr=[];
$page=1;

while (true){
$url = 'https://thesieure.com/wallet/transfer?page='.$page;
// Khởi tạo CURL
$ch = curl_init($url);
// Thiết lập có return
curl_setopt ($ch, CURLOPT_COOKIEJAR, $ckfile);
curl_setopt ($ch, CURLOPT_COOKIEFILE, $ckfile);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
$result = curl_exec($ch);

if (strpos($result, 'Đăng nhập tài khoản') !== false) {
    $url = 'https://thesieure.com/account/login';
    $ch = curl_init ($url);
    curl_setopt ($ch, CURLOPT_COOKIEJAR, $ckfile);
    curl_setopt ($ch, CURLOPT_COOKIEFILE, $ckfile);
    curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 30);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
    curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
    $output = curl_exec ($ch);
    $rs = str_get_html(curl_exec($ch));
    $_csrf_token = $rs -> find("input[name=_token]", 0) -> value;
    curl_close($ch);




    $url = 'https://thesieure.com/account/login';
    $poststring = 'phoneOrEmail='.$site_tk_tsr.'&password='.$site_mk_tsr.'&_token=' .$_csrf_token;
    $ch = curl_init ($url);
    curl_setopt ($ch, CURLOPT_COOKIEJAR, $ckfile);
    curl_setopt ($ch, CURLOPT_COOKIEFILE, $ckfile);
    curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 30);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
    curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
    curl_setopt ($ch, CURLOPT_POST, 1);
    curl_setopt ($ch, CURLOPT_POSTFIELDS, $poststring);
    curl_setopt($ch, CURLINFO_HEADER_OUT, true);
    $output = curl_exec ($ch);
    $headers = curl_getinfo($ch, CURLINFO_HEADER_OUT);
    curl_close($ch);
    continue;
}

curl_close($ch);

if (strpos($result, 'Thành công') !== false) {

$rs = str_get_html($result);
$lol =  $rs->find('tbody', 2);

foreach($lol->find('tr') as $article) {
        
    $ma_GD = $article->find('td', 0)->plaintext;
    $so_tien = $article->find('td', 1);
    $txt_sotien = $so_tien->find('span', 0)->plaintext;
    $nguoigui_nhan = $article->find('td', 2);
    $txt_nguoiguinhan = $nguoigui_nhan->find('span', 0)->plaintext;
    $ngay_tao = $article->find('td', 3)->plaintext;
    $trang_thai = $article->find('td', 4);
    $txt_trangthai = $trang_thai->find('span', 0)->plaintext;
    $noi_dung = $article->find('td', 5)->plaintext;
    $array = array(
        "ma_gd" => $ma_GD,
        "so_tien" => $txt_sotien,
        "taikhoan_gui_nhan" => $txt_nguoiguinhan,
        "ngay_tao" => $ngay_tao,
        "trang_thai" => $txt_trangthai,
        "noi_dung" => $noi_dung
    );  
    array_push($gdarr, $array);
    
}}else{
    break;
}
$page++;
}

$tx=json_encode($gdarr);
$tx=json_decode($tx);
?>