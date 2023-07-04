<!DOCTYPE html>
<html lang="en">

<head>
	<base href="<?php echo base_url(); ?>"/>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
	<title><?php echo $title; ?> - Yayasan Ar-Ruhama</title>
	<link rel="shortcut icon" href="assets/home/img/logo_arruhama.png">
	<link rel="stylesheet" href="assets/admin/css/bootstrap.min.css">
	<link rel="stylesheet" href="assets/admin/plugins/fontawesome/css/fontawesome.min.css">
	<link rel="stylesheet" href="assets/admin/plugins/fontawesome/css/all.min.css">
	<link rel="stylesheet" href="assets/admin/plugins/select2/css/select2.min.css">
	<link rel="stylesheet" href="assets/admin/plugins/datatables/datatables.min.css">
	<link rel="stylesheet" href="assets/admin/css/style.css">
<!--[if lt IE 9]>
			<script src="assets/js/html5shiv.min.js"></script>
			<script src="assets/js/respond.min.js"></script>
		<![endif]-->
</head>
<body class="nk-body bg-lighter npc-default has-sidebar no-touch nk-nio-theme">
	<div class="main-wrapper">
		<div class="header">
			<div class="header-left">
				<a href="admin/dashboard" class="logo"><img src="assets/home/img/logo_AR.png" alt="Logo"></a>
				<a href="admin/dashboard" class="white-logo"><img src="assets/admin/img/logo-white.png" alt="Logo"></a>
				<a href="admin/dashboard" class="logo logo-small"><img src="assets/admin/img/logo-small.png" alt="Logo" width="30" height="30"></a>
			</div>
			<a href="javascript:void(0);" id="toggle_btn"><i class="fas fa-bars"></i></a>

			<a class="mobile_btn" id="mobile_btn">
				<i class="fas fa-bars"></i>
			</a>

			<ul class="nav nav-tabs user-menu">

				<li class="nav-item dropdown">
					<a href="#" class="dropdown-toggle nav-link" data-bs-toggle="dropdown">
						<i data-feather="bell"></i> <span class="badge rounded-pill">5</span>
					</a>
					<div class="dropdown-menu notifications">
						<div class="topnav-dropdown-header">
							<span class="notification-title">Notifikasi</span>
						</div>
						<div class="noti-content">
							<ul class="notification-list">
								<li class="notification-message">
									<a href="activities.html">
										<div class="media d-flex">
											<span class="avatar avatar-sm">
												<img class="avatar-img rounded-circle" alt="" src="assets/admin/img/profiles/avatar-02.jpg">
											</span>
											<div class="media-body">
												<p class="noti-details"><span class="noti-title">Brian Johnson</span> paid the invoice <span class="noti-title">#DF65485</span></p>
												<p class="noti-time"><span class="notification-time">4 mins ago</span></p>
											</div>
										</div>
									</a>
								</li>
								<li class="notification-message">
									<a href="activities.html">
										<div class="media d-flex">
											<span class="avatar avatar-sm">
												<img class="avatar-img rounded-circle" alt="" src="assets/admin/img/profiles/avatar-03.jpg">
											</span>
											<div class="media-body">
												<p class="noti-details"><span class="noti-title">Marie Canales</span> has accepted your estimate <span class="noti-title">#GTR458789</span></p>
												<p class="noti-time"><span class="notification-time">6 mins ago</span></p>
											</div>
										</div>
									</a>
								</li>
								<li class="notification-message">
									<a href="activities.html">
										<div class="media d-flex">
											<div class="avatar avatar-sm">
												<span class="avatar-title rounded-circle bg-primary-light"><i class="far fa-user"></i></span>
											</div>
											<div class="media-body">
												<p class="noti-details"><span class="noti-title">New user registered</span></p>
												<p class="noti-time"><span class="notification-time">8 mins ago</span></p>
											</div>
										</div>
									</a>
								</li>
								<li class="notification-message">
									<a href="activities.html">
										<div class="media d-flex">
											<span class="avatar avatar-sm">
												<img class="avatar-img rounded-circle" alt="" src="assets/admin/img/profiles/avatar-04.jpg">
											</span>
											<div class="media-body">
												<p class="noti-details"><span class="noti-title">Barbara Moore</span> declined the invoice <span class="noti-title">#RDW026896</span></p>
												<p class="noti-time"><span class="notification-time">12 mins ago</span></p>
											</div>
										</div>
									</a>
								</li>
								<li class="notification-message">
									<a href="activities.html">
										<div class="media d-flex">
											<div class="avatar avatar-sm">
												<span class="avatar-title rounded-circle bg-info-light"><i class="far fa-comment"></i></span>
											</div>
											<div class="media-body">
												<p class="noti-details"><span class="noti-title">You have received a new message</span></p>
												<p class="noti-time"><span class="notification-time">2 days ago</span></p>
											</div>
										</div>
									</a>
								</li>
							</ul>
						</div>
						<div class="topnav-dropdown-footer">
							<a href="activities.html">View all Notifications</a>
						</div>
					</div>
				</li>


				<li class="nav-item dropdown has-arrow main-drop">
					<a href="#" class="dropdown-toggle nav-link" data-bs-toggle="dropdown">
						<span class="user-img">
							<img src="assets/admin/img/profiles/<?php echo $me['admin_foto']; ?>" alt="foto">
							<span class="status online"></span>
						</span>
						<span><?php echo $me['admin_nama']; ?></span>
					</a>
					<div class="dropdown-menu">
						<a class="dropdown-item" href="admin/atur/profil"><i data-feather="user" class="me-1"></i> Profil</a>
						<a class="dropdown-item" href="admin/atur/password"><i data-feather="key" class="me-1"></i> Password</a>
						<a class="dropdown-item" href="admin/logout"><i data-feather="log-out" class="me-1"></i> Logout</a>
					</div>
				</li>

			</ul>

		</div>