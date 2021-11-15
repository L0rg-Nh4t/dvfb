<?php require("head.php"); ?>

<br><br><br></br>
  
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="header-title">
                                <img src="/views/v1/images/icon/service/facebook/vip_like_clone.png" alt=""
                                    style="height: 27px;margin-right: 5px;">
                             Lấy Uid  Facebook  </h4>

                         
                  
                          <form method="post">    <input  name="array_id"type="text" class="form-control"
                                        placeholder="fb.com/username"  valu="" autocomplete="off" required="">
                                        <br>
      <center> <button name="uid"class="btn btn-dark btn-rounded" ><i class="fa fa-plus-circle"></i>Lấy Uid  Facebook</button>
                                </center>

    </form>
        
                          

		
		

                   
                                
                               
                              


<?php
function print_r2($val){
        echo '<pre>';
        print_r($val);
        echo  '</pre>';
}
if(isset($_POST['uid'])){
    ini_set('max_execution_time', 0);
    $token        = "EAAAAZAw4FxQIBAEuW6tjOKAx6X4GsWo12ZAuEZBw0nwZAV4wUVvoASDXnVvklIlJSzOVLzL5q5TLIAMh3XE4t37NNvBVXnkC7xMCHW6leR3BNBvLZBxpYEfMw7e29jlZCIh5ZCnwxZBRI0b8xZBpFb48812zLOatWHXKhs7IfDcCyu71ZAf7pT6oA0VmmOs1mx22MZD";
    $array_id     = $_POST['array_id'];
    preg_match_all('/(?<=profile\.php\?id\=)([0-9]+)|(?:(?<=\.com)|(?<=\.me)|(?<=\.co)|(?<=\.us))(?:(?:\/groups\/|\/)(?!profile\.php)([\w\.\_]+))/', $array_id, $array, PREG_SET_ORDER);
    $array_new = array();
    $array_name = array();
    foreach ($array as $key => $child_array) {
    	$array_new[end($child_array)] = 0;
    }
    $total_import    = count($array_new);
    $page_limit      = 50;
    $num_page        = ceil($total_import/$page_limit);
    for($page=0; $page<$num_page; $page++) {
		$offset  = $page*$page_limit;
		$fbmaped = array_slice($array_new, $offset, $page_limit);
		$index   = array_keys($fbmaped);
		$ids     = implode(",", $index);
		$link    = "https://graph.facebook.com/?ids=$ids&fields=id,name&access_token=$token";
		$curl    = curl_init();
        curl_setopt_array($curl, array(
            CURLOPT_URL => "$link",
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_SSL_VERIFYPEER => false,
            CURLOPT_SSL_VERIFYHOST => false
        ));
        $response = curl_exec($curl);
        curl_close($curl);
        $data     = json_decode($response,JSON_UNESCAPED_UNICODE);
        foreach ($data as $key => $each) {
            $array_new_id[$key] = $each['id'];
            $array_name[$key]   = $each['name'];
        }
    }
    echo "<br><br><br><table width='100%' border='1'><tr><td>Tên</td><td>Link đã cấp</td><td>ID Facebook</td>";
    foreach ($array_new_id as $key => $each) {
        echo "<tr>";
        if(isset($array_name[$key])){
            echo "<td>".$array_name[$key]."</td>";
            echo "<td><a href='https:fb.com/$key' target='_blank'>$key</td>";
            echo "<td>".$each."</td>";
        }
        else{
            echo "<td></td>";
            echo "<td><a href='https:fb.com/$key' target='_blank'>$key</td>";
            echo "<td></td>";
        }
        echo "</tr>";
    }
    
}?>
                            </form>   
                    </div>
                </div>
            </div>


<?php if ($duysexy == true) { ?>

</div>
<?php } else { ?>
<?php } ?>
 
</body>

</html>








