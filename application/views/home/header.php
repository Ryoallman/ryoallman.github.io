<!doctype html>
<html class="no-js" lang="zxx">

<head>
	<base href="<?php echo base_url(); ?>"/>
	<meta charset="utf-8">
	<meta http-equiv="x-ua-compatible" content="ie=edge">
	<title><?php echo $title; ?> - <?php echo $profil['nama']; ?></title>
	<meta name="description" content="">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="shortcut icon" type="image/x-icon" href="assets/home/img/logo_arruhama.png">

	<link rel="stylesheet" href="assets/home/css/joincss.css" />
	<link rel="stylesheet" href="assets/home/css/A.style.css.pagespeed.cf.nlD951F7Xw.css">
</head>
<body>
<!--[if lte IE 9]>
            <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="https://browsehappy.com/">upgrade your browser</a> to improve your experience and security.</p>
        <![endif]-->
    <header>
    	<div class="header-area ">
    		<div class="header-top_area">
    			<div class="container-fluid">
    				<div class="row">
    					<div class="col-xl-6 col-md-12 col-lg-8">
    						<div class="short_contact_list">
    							<ul>
    								<li><a> <i class="fa fa-phone"></i> <?php echo $profil['telp']; ?></a></li>
    								<li><a> <i class="fa fa-envelope"></i><span class="__cf_email__" data-cfemail="50093f25223d31393c10373d31393c7e333f3d"><?php echo $profil['email']; ?></span></a></li>
    							</ul>
    						</div>
    					</div>
    					<div class="col-xl-6 col-md-6 col-lg-4">
    						<div class="social_media_links d-none d-lg-block">
    							<a href="https://facebook.com/<?php echo $profil['facebook']; ?>"><i class="fa fa-facebook"></i></a>
    							<a href="https://instagram.com/<?php echo $profil['instagram']; ?>"><i class="fa fa-instagram"></i></a>
    							<a href="https://twitter.com/<?php echo $profil['twitter']; ?>"><i class="fa fa-twitter"></i></a>
    						</div>
    					</div>
    				</div>
    			</div>
    		</div>
    		<div id="sticky-header" class="main-header-area">
    			<div class="container-fluid">
    				<div class="row align-items-center">
    					<div class="col-xl-3 col-lg-3">
    						<div class="logo"><a href=""><img src="assets/home/img/logo_AR.png" alt=""></a></div>
    					</div>
    					<div class="col-xl-9 col-lg-9">
    						<div class="main-menu">
    							<nav>
    								<ul id="navigation">
    									<li><a href="">Beranda</a></li>
    									<li><a href="tentang-kami">Tentang</a></li>
    									<!-- <li><a href="#">blog <i class="ti-angle-down"></i></a>
    										<ul class="submenu">
    											<li><a href="blog.html">blog</a></li>
    											<li><a href="single-blog.html">single-blog</a></li>
    										</ul>
    									</li> -->
    									<li><a href="javascript:void(0):">Saya Mau <i class="ti-angle-down"></i></a>
    										<ul class="submenu">
    											<li><a href="login">Galang Dana</a></li>
    											<li><a href="donasi">Donasi</a></li>
    										</ul>
    									</li>
                                        <li><a href="hubungi-kami">Kontak</a></li>
    									<li><a href="blog">Blog</a></li>
                                        <?php if($this->session->userdata('uid')) { ?>
                                            <li><a href="javascript:void(0):"><?php echo $meu['user_nama']; ?> <i class="ti-angle-down"></i></a>
                                                <ul class="submenu">
                                                    <li><a href="user/dashboard">Dashboard</a></li>
                                                    <li><a href="user/logout">Logout</a></li>
                                                </ul>
                                            </li>
                                        <?php }else { ?>
                                            <li><a href="javascript:void(0):">Akun <i class="ti-angle-down"></i></a>
                                                <ul class="submenu">
                                                    <li><a href="login">Login</a></li>
                                                    <li><a href="registrasi">Daftar</a></li>
                                                </ul>
                                            </li>
                                        <?php } ?>
    								</ul>
    							</nav>
    							<div class="Appointment">
    								<div class="book_btn d-none d-lg-block"><a  href="donasi" class="boxed-btn3">Donasi sekarang</a></div>
    							</div>
    						</div>
    					</div>
    					<div class="col-12">
    						<div class="mobile_menu d-block d-lg-none"></div>
    					</div>
    				</div>
    			</div>
    		</div>
    	</div>
    </header>