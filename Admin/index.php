<?php
require("head.php");
?>

<?php
if (isset($_POST["action"])){
    $action=$_POST["action"];
    if ($action=="congtien"){
        $ketnoi->query("UPDATE users SET `money` = `money` + '".$_POST["sotiencong"]."', `total_nap` = `total_nap` + '".$_POST["sotiencong"]."' WHERE `username` = '".$_POST["username"]."' ");
        echo '<script>alert("Đã Cộng '.$_POST["sotiencong"].'đ Vào Tài Khoản '.$_POST["username"].'");</script>';
    }
    if ($action=="trutien"){
        $ketnoi->query("UPDATE users SET `money` = `money` - '".$_POST["sotientru"]."', `total_nap` = `total_nap` - '".$_POST["sotientru"]."' WHERE `username` = '".$_POST["username"]."' ");
        echo '<script>alert("Đã Trừ '.$_POST["sotientru"].'đ Vào Tài Khoản '.$_POST["username"].'");</script>';
    }
        if ($action=="delete"){
            
        $ketnoi->query("DELETE FROM users WHERE username='".$_POST["username"]."';");
        echo '<script>alert("Đã Xóa Username : '.$_POST["username"].'");</script>';
    }
        if ($action=="change_admin"){
            
        $ketnoi->query("UPDATE users SET `username` = '".$_POST["username"]."' , `password` = '".$_POST["password"]."' WHERE level='3';");
        echo '<script>alert("Đã Thay Username ADMIN Là : '.$_POST["username"].' Và Password : '.$_POST["password"].'");</script>';
    }
    
    
}
?>
<?php

$total_money = mysqli_fetch_assoc($ketnoi->query("SELECT SUM(`money`) FROM `users` WHERE `money` >= 0 ")) ['SUM(`money`)']; 


$total_thanhvien = mysqli_fetch_assoc(mysqli_query($ketnoi, "SELECT COUNT(*) FROM `users` ")) ['COUNT(*)']; 

$total_money_nap = mysqli_fetch_assoc($ketnoi->query("SELECT SUM(`total_nap`) FROM `users` WHERE `total_nap` >= 0 ")) ['SUM(`total_nap`)']; 



?>


<!-- Content Row -->
                    <div class="row">

                        <!-- Earnings (Monthly) Card Example -->
                        <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-success shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                                Tổng Số Dư Hiện Tại</div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800"><?=$total_money?>đ</div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-dollar-sign fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>


                        <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-primary shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                                Tổng Số Người Dùng Hiện Tại</div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800"><?=$total_thanhvien?></div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-user fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Earnings (Monthly) Card Example -->
                        <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-info shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Đã Nạp
                                            </div>
                                            <div class="row no-gutters align-items-center">
                                                <div class="col-auto">
                                                    <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800"><?=$total_money_nap;?>đ
                                                    </div>
                                                </div>
                                            </div></div>
                                        <div class="col-auto">
                                            <i class="fas fa-piggy-bank fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Pending Requests Card Example -->
                        <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-warning shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">
                                                Đã Tiêu</div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800"><?=$total_money_nap - $total_money;?>đ</div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-columns fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>






<div class="row">

                        <div class="col-lg-6">

                            <!-- Default Card Example -->
                            <div class="card mb-4">
                                <div class="card-header">
                                    Cộng Tiền
                                </div>
                                <div class="card-body">
                                    
                                    
                                    
                        <form action="" method="post">
                        
                        <input type="hidden" name="action" value="congtien" />
                        
                                        
                        <div class="form-group row">
                            
                            <div class="col-md-10"><input type="text" class="form-control" name="username" placeholder="Nhập Username" /></div>
                        </div>
                        <div class="form-group row">
                           
                            <div class="col-md-10"><input type="number" class="form-control" name="sotiencong" placeholder="Nhập Số Tiền Cộng" /></div>
                        </div>
                        
                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn btn-success btn-block btn-lg" name="submit"><i class="fa fa-plus"></i> Cộng Tiền</button>
                        </div>
                    </form>
                    
                    
                    
                                </div>
                            </div>







                    <div class="col-lg-6">

                            <!-- Default Card Example -->
                            <div class="card mb-4">
                                <div class="card-header">
                                    Trừ Tiền
                                </div>
                                <div class="card-body">
                                    
                                    
                                    
                        <form action="" method="post">
                                    
                                    <input type="hidden" name="action" value="trutien" />
                                                    
                        <div class="form-group row">
                            
                            <div class="col-md-10"><input type="text" class="form-control" name="username" placeholder="Nhập Username" /></div>
                        </div>
                        <div class="form-group row">
                           
                            <div class="col-md-10"><input type="number" class="form-control" name="sotientru" placeholder="Nhập Số Tiền Trừ" /></div>
                        </div>
                        
                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn btn-danger btn-block btn-lg" name="submit"><i class="fa fa-minus"></i> Xóa</button>
                        </div>
                    </form>




</div>
</div>



    <!-- Default Card Example -->


                    <div class="col-lg-6">

                            <!-- Default Card Example -->
                            <div class="card mb-4">
                                <div class="card-header">
                                    Xóa Thành Viên (Lưu Ý Sẽ Xóa Thẳng Khỏi Database Không Thể Khôi Phục)
                                </div>
                                <div class="card-body">
                                    
                                    
                                    
                        <form action="" method="post">
                                    
                                    <input type="hidden" name="action" value="delete" />
                                                    
                        <div class="form-group row">
                            
                            <div class="col-md-10"><input type="text" class="form-control" name="username" placeholder="Nhập Username" /></div>
                        </div>
                    
                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn btn-warning btn-block btn-lg" name="submit"><i class="fa fa-trash"></i> Trừ Tiền</button>
                        </div>
                    </form>




</div>
</div>




   <!-- Default Card Example -->


                    <div class="col-lg-6">

                            <!-- Default Card Example -->
                            <div class="card mb-4">
                                <div class="card-header">
                                    Thay Tài Khoản Mật Khẩu Admin
                                </div>
                                <div class="card-body">
                                    
                                    
                                    
                        <form action="" method="post">
                                    
                                    <input type="hidden" name="action" value="change_admin" />
                                                    
                        <div class="form-group row">
                            
                            <div class="col-md-10"><input type="text" class="form-control" name="username" placeholder="Nhập Username" /></div>
                        </div>
                        
                        <div class="form-group row">
                            
                            <div class="col-md-10"><input type="text" class="form-control" name="password" placeholder="Nhập Password" /></div>
                        </div>
                        
                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn btn-primary btn-block btn-lg" name="submit"><i class="fa fa-edit"></i> Thay Đổi</button>
                        </div>
                    </form>




</div>
</div>



<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">List User</h6>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <div id="dataTable_wrapper" class="dataTables_wrapper dt-bootstrap4">
                <div class="row">
                    <div class="col-sm-12 col-md-6">
                        <div class="dataTables_length" id="dataTable_length">
                            <label>
                                Show
                                <select name="dataTable_length" aria-controls="dataTable" class="custom-select custom-select-sm form-control form-control-sm">
                                    <option value="10">10</option>
                                    <option value="25">25</option>
                                    <option value="50">50</option>
                                    <option value="100">100</option>
                                </select>
                                entries
                            </label>
                        </div>
                    </div>
                    <div class="col-sm-12 col-md-6">
                        <div id="dataTable_filter" class="dataTables_filter">
                            <label>Search:<input type="search" class="form-control form-control-sm" placeholder="" aria-controls="dataTable" /></label>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-12">
                        <table class="table table-bordered dataTable" id="dataTable" width="100%" cellspacing="0" role="grid" aria-describedby="dataTable_info" style="width: 100%;">
                            
                            <thead>
                                <tr role="row">
                                    <th class="sorting sorting_asc" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Name: activate to sort column descending" style="width: 25px;">Username</th>
                                    <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1" aria-label="Position: activate to sort column ascending" style="width: 31px;">Password</th>
                                    <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1" aria-label="Office: activate to sort column ascending" style="width: 31px;">Email</th>
                                    <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1" aria-label="Age: activate to sort column ascending" style="width: 31px;">Số Dư</th>
                                    <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1" aria-label="Start date: activate to sort column ascending" style="width: 31px;">Tổng Nạp</th>
                                </tr>
                            </thead>
                            
                            
                            <tbody>
                                <?php
$i = 0;
$result = $ketnoi->query("SELECT * FROM `users` WHERE `username` IS NOT NULL");
while($row = mysqli_fetch_assoc($result)){ 
?>

                                <tr class="odd">
                                    <td><?=$row["username"];?></td>
                                    <td><?=$row["password"];?>t</td>
                                    <td><?=$row["email"];?></td>
                                    <td><?=$row["money"];?>đ</td>
                                    <td><?=$row["total_nap"];?>đ</td>
                                </tr>
                                <?php } ?>
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-12 col-md-5"><div class="dataTables_info" id="dataTable_info" role="status" aria-live="polite">Showing 1 to 10 of 57 entries</div></div>
                    <div class="col-sm-12 col-md-7">
                        <div class="dataTables_paginate paging_simple_numbers" id="dataTable_paginate">
                            <ul class="pagination">
                                <li class="paginate_button page-item previous disabled" id="dataTable_previous"><a href="#" aria-controls="dataTable" data-dt-idx="0" tabindex="0" class="page-link">Previous</a></li>
                                <li class="paginate_button page-item active"><a href="#" aria-controls="dataTable" data-dt-idx="1" tabindex="0" class="page-link">1</a></li>
                                <li class="paginate_button page-item"><a href="#" aria-controls="dataTable" data-dt-idx="2" tabindex="0" class="page-link">2</a></li>
                                <li class="paginate_button page-item"><a href="#" aria-controls="dataTable" data-dt-idx="3" tabindex="0" class="page-link">3</a></li>
                                <li class="paginate_button page-item"><a href="#" aria-controls="dataTable" data-dt-idx="4" tabindex="0" class="page-link">4</a></li>
                                <li class="paginate_button page-item"><a href="#" aria-controls="dataTable" data-dt-idx="5" tabindex="0" class="page-link">5</a></li>
                                <li class="paginate_button page-item"><a href="#" aria-controls="dataTable" data-dt-idx="6" tabindex="0" class="page-link">6</a></li>
                                <li class="paginate_button page-item next" id="dataTable_next"><a href="#" aria-controls="dataTable" data-dt-idx="7" tabindex="0" class="page-link">Next</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>









<?php
require("footer.php");
?>