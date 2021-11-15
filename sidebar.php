<div class="wrapper">
		<nav id="sidebar" class="sidebar js-sidebar">
			<div class="sidebar-content js-simplebar">
				<a class="sidebar-brand" href="/">
          <span class="align-middle">						<?=$site_brand;?></span>
        </a>

				<ul class="sidebar-nav">
					<li class="sidebar-header">
						Trang Chủ
					</li>

					<li class="sidebar-item active">
						<a class="sidebar-link" href="/home">
              <i class="align-middle" data-feather="sliders"></i> <span class="align-middle">Trang Chủ</span>
            </a>
					</li>

					<li class="sidebar-item">
						<a class="sidebar-link" href="/profile">
              <i class="align-middle" data-feather="user"></i> <span class="align-middle">Tài Khoản Của Tôi</span>
            </a>
					</li>
<?php
if ($user["level"]=="3"){
    ?>
    			<li class="sidebar-item">
						<a class="sidebar-link" href="/Admin">
              <i class="align-middle" data-feather="user"></i> <span class="align-middle"> Quản Trị Website</span>
            </a><?php } ?>
					</li>
					<li class="sidebar-item">
						<a class="sidebar-link" href="/Momo">
              <i class="align-middle" data-feather="log-in"></i> <span class="align-middle">Nạp Auto Momo</span>
            </a>
					</li>

					<li class="sidebar-item">
						<a class="sidebar-link" href="/Thesieure">
              <i class="align-middle" data-feather="user-plus"></i> <span class="align-middle">Nạp Thẻ Siêu Rẻ (auto)</span>
            </a>
					</li>

					<li class="sidebar-item">
						<a class="sidebar-link" href="/ATM">
              <i class="align-middle" data-feather="book"></i> <span class="align-middle">Nạp ATM</span>
            </a>
					</li>

					<li class="sidebar-header">
						Dịch Vụ Facebook
					</li>

					<li class="sidebar-item">
						<a class="sidebar-link" href="/Mua-Like-Post">
              <i class="align-middle" data-feather="square"></i> <span class="align-middle"> Tăng Like Bài Viết</span>
            </a>
					</li>

					<li class="sidebar-item">
						<a class="sidebar-link" href="/Mua-Follow">
              <i class="align-middle" data-feather="check-square"></i> <span class="align-middle">Tăng Người Theo Dõi</span>
            </a>
					</li>

					<li class="sidebar-item">
						<a class="sidebar-link" href="/Mua-Like-Page">
              <i class="align-middle" data-feather="grid"></i> <span class="align-middle">Tăng Like Page</span>
            </a>
					</li>

					<li class="sidebar-item">
						<a class="sidebar-link" href="/Mua-Comment">
              <i class="align-middle" data-feather="align-left"></i> <span class="align-middle">Tăng Comment</span>
            </a>
					</li>

					<li class="sidebar-item">
						<a class="sidebar-link" href="404.php">
              <i class="align-middle" data-feather="coffee"></i> <span class="align-middle">Tăng Mắt Live</span>
            </a>
					</li>

					<li class="sidebar-header">
						Khác
					</li>

					<li class="sidebar-item">
						<a class="sidebar-link" href="/logout.php">
              <i class="align-middle" data-feather="map"></i> <span class="align-middle">Đăng Xuất</span>
            </a>
					</li>
				</ul>

				<div class="sidebar-cta">
					<div class="sidebar-cta-content">
						<strong class="d-inline-block mb-2"> </strong>
						<div class="mb-3 text-sm">
							 
						</div>
						<div class="d-grid">
							<a href="/" class="btn btn-primary"> </a>
						</div>
					</div>
				</div>
			</div>
		</nav>

		<div class="main">
			<nav class="navbar navbar-expand navbar-light navbar-bg">
				<a class="sidebar-toggle js-sidebar-toggle">
          <i class="hamburger align-self-center"></i>
        </a>

				<div class="navbar-collapse collapse">
					<ul class="navbar-nav navbar-align">
						<li class="nav-item dropdown">
							<a class="nav-icon dropdown-toggle" href="#" id="alertsDropdown" data-bs-toggle="dropdown">
								<div class="position-relative">
									<i class="align-middle" data-feather="bell"></i>
									<span class="indicator">1</span>
								</div>
							</a>
							<div class="dropdown-menu dropdown-menu-lg dropdown-menu-end py-0" aria-labelledby="alertsDropdown">
								<div class="dropdown-menu-header">
									1 Thông Báo Mới
								</div>
								<div class="list-group">
									<a href="#" class="list-group-item">
										<div class="row g-0 align-items-center">
											<div class="col-2">
												<i class="text-danger" data-feather="alert-circle"></i>
											</div>
											<div class="col-10">
												<div class="text-dark">Update completed</div>
												<div class="text-muted small mt-1">Restart server 12 to complete the update.</div>
												<div class="text-muted small mt-1">30m ago</div>
											</div>
										</div>
									</a>
									<a href="#" class="list-group-item">
										<div class="row g-0 align-items-center">
											<div class="col-2">
												<i class="text-warning" data-feather="bell"></i>
											</div>
											<div class="col-10">
												<div class="text-dark">Lorem ipsum</div>
												<div class="text-muted small mt-1">Aliquam ex eros, imperdiet vulputate hendrerit et.</div>
												<div class="text-muted small mt-1">2h ago</div>
											</div>
										</div>
									</a>
									<a href="#" class="list-group-item">
										<div class="row g-0 align-items-center">
											<div class="col-2">
												<i class="text-primary" data-feather="home"></i>
											</div>
											<div class="col-10">
												<div class="text-dark">Login from 192.186.1.8</div>
												<div class="text-muted small mt-1">5h ago</div>
											</div>
										</div>
									</a>
									<a href="#" class="list-group-item">
										<div class="row g-0 align-items-center">
											<div class="col-2">
												<i class="text-success" data-feather="user-plus"></i>
											</div>
											<div class="col-10">
												<div class="text-dark">New connection</div>
												<div class="text-muted small mt-1">Christina accepted your request.</div>
												<div class="text-muted small mt-1">14h ago</div>
											</div>
										</div>
									</a>
								</div>
								<div class="dropdown-menu-footer">
									<a href="#" class="text-muted">Show all notifications</a>
								</div>
							</div>
						</li>
						
						<li class="nav-item dropdown">
							<a class="nav-icon dropdown-toggle d-inline-block d-sm-none" href="#" data-bs-toggle="dropdown">
                <i class="align-middle" data-feather="settings"></i>
              </a>

							<a class="nav-link dropdown-toggle d-none d-sm-inline-block" href="#" data-bs-toggle="dropdown">
                <img src="img/avatars/avatar.jpg" class="avatar img-fluid rounded me-1" alt="Charles Hall" /> <span class="text-dark">Charles Hall</span>
              </a>
							<div class="dropdown-menu dropdown-menu-end">
								<a class="dropdown-item" href="/profile"><i class="align-middle me-1" data-feather="user"></i>Tài Khoản Của Tôi</a>
								
								<div class="dropdown-divider"></div>
								<a class="dropdown-item" href="/logout">Đăng Xuất</a>
							</div>
						</li>
					</ul>
				</div>
			</nav>

<br><br>
</body>