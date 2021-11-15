<?php require("head.php"); ?>


                

                    <!-- Page Heading -->
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
                        
                    </div>

                    <div><div class="alert alert-success text-center" role="alert"><strong><?=$thongbao?></strong></div></div>
                        
                    <!-- Content Row -->
                    <div class="row">

                        <!-- Earnings (Monthly) Card Example -->
                        <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-success shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                                Số Dư</div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800"><?=$user["money"]?>đ</div>
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
                                                Cấp Độ</div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800"><?=$capdo?></div>
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
                                                    <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800"><?=$user["total_nap"];?>đ
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
                                            <div class="h5 mb-0 font-weight-bold text-gray-800"><?=$user["total_nap"] - $user["money"];?>đ</div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-columns fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

            <div class="col-md-12">
                <div class="table-responsive">
                  <table class="table align-items-center table-flush">
                    <thead class="thead-light">
                      <tr>
                        <th>Tên Dịch Vụ</th>
                        <th>Giá Dịch Vụ</th>
                        <th>Trạng Thái</th>
                      </tr>
                    </thead>
                    <tbody>
                      <tr>
                        <td><a href="mualike.php">Tăng like bài viết</a></td>
                        <td><?=$ratelike?>đ</td>
                        <td><span class="badge badge-success">Đang Hoạt Động</span></td>
                      </tr>
                      <tr>
                        <td><a href="muafollow.php">Tăng người theo dõi</a></td>
                        <td><?=$ratesub?>đ</td>
                        <td><span class="badge badge-success">Đang Hoạt Động</span></td>
                      </tr>
                      <tr>
                        <td><a href="muapage.php">Tăng like page</a></td>
                        <td><?=$ratepage?>đ</td>
                        <td><span class="badge badge-success">Đang Hoạt Động</span></td>
                        </tr>
                      <tr>
                        <td><a href="muapage.php">Tăng comment</a></td>
                        <td><?=$ratecmt?>đ</td>
                        <td><span class="badge badge-success">Đang Hoạt Động</span></td>
                      </tr>
                    </tbody>
                  </table>
                </div>
                <div class="card-footer"></div>
              </div>
              
<?php require("footer.php");