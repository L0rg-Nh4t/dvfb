<?php session_start(); ?>
<?php
define("DATABASE", "subviach_Kietstarcan");
define("USERNAME", "subviach_Kietstarcan");
define("PASSWORD", "subviach_Kietstarcan");
define("LOCALHOST", "localhost");
$ketnoi = mysqli_connect(LOCALHOST,USERNAME,PASSWORD,DATABASE);
$ketnoi->query("set names 'utf8'");
date_default_timezone_set('Asia/Ho_Chi_Minh');


//Liên Hệ
$facebook="https://www.facebook.com/Kiệt.Tieu.Tu.Vo.Dich.Thien.Ha";
$sdt_zalo="0373019037";


//url logo
$url_logo="https://muasubngon.com/assets/img/logo.png";

//Tài Khoản TSR

$site_tk_tsr="kiethackervpbq";
$site_mk_tsr="0373019037kiet";
$site_ten_tk_tsr="Nguyễn Anh Kiệt
";
$site_nd_tsr="muasubnhanh";
//apimomo

$id_api = '346'; // Lấy ID API tại nhà cung cấp dịch vụ
$api_key = 'efc04bebffc212c13c7bc75fc637e502'; // Lấy API KEY tại nhà cung cấp dịch vụ
$noidungmomo = 'Likesubsieunhanh'; // Nội Dung Đã Đăng Ký Tại Api momo

//muasubngon
$muasubngon_token="eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJpc3MiOiJodHRwOlwvXC9tdWFzdWJuZ29uLmNvbVwvYXBpXC9hdXRoXC9sb2dpbiIsImlhdCI6MTYyMzEzMzA5MywiZXhwIjoxNjU0NjY5MDkzLCJuYmYiOjE2MjMxMzMwOTMsImp0aSI6IkhoUHk2dDF5YmQ1RVBNaTEiLCJzdWIiOjM1MTAsInBydiI6IjIzYmQ1Yzg5NDlmNjAwYWRiMzllNzAxYzQwMDg3MmRiN2E1OTc2ZjcifQ.cWVXUf0QepI_AVnWp9_qkl5oLrZtUV6_Yn91U2h04qM";

//info

$site_name="MUASUBVIET.COM"; //Tên Web
$site_domain="https://muasubviet.com"; //url web
$site_brand="MUASUBVIET";
$keywords="mua sub,muasubngay,muasubgiare";
$description="MUASUBVIET.COM
Trang Bán Sub Uy Tín CHất Lượng";
$thongbao="Hệ thống đang bảo trì nên dịch vụ sẽ lên chậm hơn, Momo mới: 0336853148, chúc bạn sử dụng dịch vụ vui vẻ !";



$api_key_card=""; // Api Key Ở doicardnhanh.com
$chiet_khau_the=""; //Chiết khấu thẻ (%)



$site_callback = $site_domain.'/callback/callback.php';


$ratelike="7"; //ratelike
$ratesub="16"; //ratesub
$ratepage="19"; //ratepage
$ratecmt="40"; //ratepage


if(isset($_SESSION['username']))
{ 
    $my_username = $_SESSION['username'];
    $user = $ketnoi->query("SELECT * FROM users WHERE username = '$my_username' ")->fetch_array();

}
if (!empty($_SERVER['HTTP_CLIENT_IP']))     
{  
    $ip_address = $_SERVER['HTTP_CLIENT_IP'];  
}  
elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR']))    
{  
    $ip_address = $_SERVER['HTTP_X_FORWARDED_FOR'];  
}  
else  
{  
    $ip_address = $_SERVER['REMOTE_ADDR'];  
}
function check_img($img)
{
    $filename = $_FILES[$img]['name'];
    $ext = explode(".", $filename);
    $ext = end($ext);
    $valid_ext = array("png","jpeg","jpg","PNG","JPEG","JPG","gif","GIF");
    if(in_array($ext, $valid_ext))
    {
        return true;
    }
}
function check_zip($img)
{
    $filename = $_FILES[$img]['name'];
    $ext = explode(".", $filename);
    $ext = end($ext);
    $valid_ext = array("zip","ZIP");
    if(in_array($ext, $valid_ext))
    {
        return true;
    }
}
function display_banned($data)
{
    if ($data == 1)
    {
        $show = '<span class="badge bg-danger">Banned</span>';
    }
    else if ($data == 0)
    {
        $show = '<span class="badge bg-success">Hoạt động</span>';
    }
    return $show;
}
function display($data)
{
    if ($data == 'hide')
    {
        $show = '<span class="badge bg-danger">ẨN</span>';
    }
    else if ($data == 'show')
    {
        $show = '<span class="badge bg-success">HIỂN THỊ</span>';
    }
    return $show;
}

function TypeNick($data)
{
    $row = array(
        'clone',
        'via',
        'hotmail',
        'yahoo',
        'bm',
        'azure',
        'gmail',
        'aws',
        'zalo',
        'youtube',
        'traodoisub',
        'tuongtaccheo',
        'shopee',
        'yandex',
        'vps',
        'hosting',
        'tiki',
        'lazada',
        'rentcode',
        'textnow',
        'game',
        'garena',
        'riot'
    );

    return $row[$data];
}
function status($data)
{
    if ($data == 'xuly'){
        $show = '<span class="badge badge-info">Đang xử lý</span>';
    }
    else if ($data == 'hoantat'){
        $show = '<span class="badge badge-success">Hoàn tất</span>';
    }
    else if ($data == 'thatbai'){
        $show = '<span class="badge badge-danger">Thất bại</span>';
    }
    else{
        $show = '<span class="badge badge-warning">Khác</span>';
    }
    return $show;
}
function check_string($data)
{
    return str_replace(array('<',"'",'>','?','/',"\\",'--','eval(','<php'),array('','','','','','','','',''),htmlspecialchars(addslashes(strip_tags($data))));
}
function XoaDauCach($text)
{
    return trim(preg_replace('/\s+/',' ', $text));
}
function random($string, $int)
{  
    return substr(str_shuffle($string), 0, $int);
}
function pheptru($int1, $int2)
{
    return $int1 - $int2;
}
function phepcong($int1, $int2)
{
    return $int1 + $int2;
}
function phepnhan($int1, $int2)
{
    return $int1 * $int2;
}
function phepchia($int1, $int2)
{
    return $int1 / $int2;
}
function show_type_value($value)
{
    if ($value == 'none')
    {
        $data = '';
    }
    else if ($value == 0)
    {
        $data = 'ID';
    }
    else if ($value == 1)
    {
        $data = 'PASS';
    }
    else if ($value == 2)
    {
        $data = '2FA';
    }
    else if ($value == 3)
    {
        $data = 'COOKIE';
    }
    else if ($value == 4)
    {
        $data = 'TOKEN';
    }
    else
    {
        $data = 'KHÁC';
    }
    return $data;
}
function format_cash($price)
{
    return str_replace(",", ".", number_format($price));
}
function curl_get($url)
{
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    $data = curl_exec($ch);
    
    curl_close($ch);
    return $data;
}
function getHeader(){
    $headers = array();
    $copy_server = array(
        'CONTENT_TYPE'   => 'Content-Type',
        'CONTENT_LENGTH' => 'Content-Length',
        'CONTENT_MD5'    => 'Content-Md5',
    );
    foreach ($_SERVER as $key => $value) {
        if (substr($key, 0, 5) === 'HTTP_') {
            $key = substr($key, 5);
            if (!isset($copy_server[$key]) || !isset($_SERVER[$key])) {
                $key = str_replace(' ', '-', ucwords(strtolower(str_replace('_', ' ', $key))));
                $headers[$key] = $value;
            }
        } elseif (isset($copy_server[$key])) {
            $headers[$copy_server[$key]] = $value;
        }
    }
    if (!isset($headers['Authorization'])) {
        if (isset($_SERVER['REDIRECT_HTTP_AUTHORIZATION'])) {
            $headers['Authorization'] = $_SERVER['REDIRECT_HTTP_AUTHORIZATION'];
        } elseif (isset($_SERVER['PHP_AUTH_USER'])) {
            $basic_pass = isset($_SERVER['PHP_AUTH_PW']) ? $_SERVER['PHP_AUTH_PW'] : '';
            $headers['Authorization'] = 'Basic ' . base64_encode($_SERVER['PHP_AUTH_USER'] . ':' . $basic_pass);
        } elseif (isset($_SERVER['PHP_AUTH_DIGEST'])) {
            $headers['Authorization'] = $_SERVER['PHP_AUTH_DIGEST'];
        }
    }
    return $headers;
}

function get_list($sql)
{
    $ketnoi = mysqli_connect(LOCALHOST,USERNAME,PASSWORD,DATABASE);
    $result = mysqli_query($ketnoi, $sql);
    $return = array();
    while ($row = mysqli_fetch_assoc($result))
    {
        $return[] = $row;
    }
    mysqli_free_result($result);
    return $return;
}
?>