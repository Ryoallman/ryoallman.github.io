<?php 
$menu        = strtolower($this->uri->segment(1));
$sub_menu    = strtolower($this->uri->segment(2));
$sub_menu3   = strtolower($this->uri->segment(3));
 ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <base href="<?php echo base_url(); ?>"/>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $title; ?> - Yayasan Ar-Ruhama</title>
    
    <link rel="stylesheet" href="assets/user/css/bootstrap.css">
    
    <link rel="stylesheet" href="assets/user/vendors/chartjs/Chart.min.css">

    <link rel="stylesheet" href="assets/user/vendors/perfect-scrollbar/perfect-scrollbar.css">
    <link rel="stylesheet" href="assets/user/css/app.css">
    <link rel="stylesheet" href="assets/user/vendors/simple-datatables/style.css">
    <link rel="shortcut icon" href="assets/home/img/logo_arruhama.png" type="image/x-icon">
</head>
<body>
    <div id="app">
        <div id="sidebar" class='active'>
            <div class="sidebar-wrapper active">
    <div class="sidebar-header">
        <img src="assets/home/img/logo_AR.png" alt="" srcset="">
    </div>
    <div class="sidebar-menu">
        <ul class="menu">
            
            
                <li class='sidebar-title'>Utama</li>
            
            
            
                <li class="sidebar-item <?php if($menu == 'user' AND $sub_menu == 'dashboard'){echo 'active';} ?> ">
                    <a href="user/dashboard" class='sidebar-link'>
                        <i data-feather="home" width="20"></i> 
                        <span>Dashboard</span>
                    </a>
                    
                </li>
                <li class="sidebar-item <?php if($menu == 'user' AND $sub_menu == 'galang-dana'){echo 'active';} ?> ">
                    <a href="user/galang-dana" class='sidebar-link'>
                        <i data-feather="package" width="20"></i> 
                        <span>Galang Dana</span>
                    </a>
                    
                </li>
                <li class="sidebar-item <?php if($menu == 'user' AND $sub_menu == 'donasi'){echo 'active';} ?> ">
                    <a href="user/donasi" class='sidebar-link'>
                        <i data-feather="credit-card" width="20"></i> 
                        <span>Donasi</span>
                    </a>
                </li>
                <li class="sidebar-item <?php if($menu == 'user' AND $sub_menu == 'penarikan'){echo 'active';} ?> ">
                    <a href="user/penarikan" class='sidebar-link'>
                        <i data-feather="book" width="20"></i> 
                        <span>Penarikan</span>
                    </a>
                </li>
            
                <li class='sidebar-title'>Lainnya</li>
            
                <li class="sidebar-item <?php if($menu == 'user' AND $sub_menu == 'dokumen'){echo 'active';} ?> ">
                    <a href="user/dokumen" class='sidebar-link'>
                        <i data-feather="file-text" width="20"></i> 
                        <span>Dokumen</span>
                    </a>
                    
                </li>

                <li class="sidebar-item  ">
                    <a href="" target="_blank" class='sidebar-link'>
                        <i data-feather="globe" width="20"></i> 
                        <span>Homepage</span>
                    </a>
                    
                </li>
         
        </ul>
    </div>
    <button class="sidebar-toggler btn x"><i data-feather="x"></i></button>
</div>
        </div>
        <div id="main">
            <nav class="navbar navbar-header navbar-expand navbar-light">
                <a class="sidebar-toggler" href="javascript:void(0);"><span class="navbar-toggler-icon"></span></a>
                <button class="btn navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
                    aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav d-flex align-items-center navbar-light ml-auto">
                        <li class="dropdown">
                            <a href="#" data-toggle="dropdown" class="nav-link dropdown-toggle nav-link-lg nav-link-user">
                                <div class="avatar mr-1">
                                    <img src="assets/user/images/avatar/<?php echo $me['user_foto']; ?>" alt="<?php echo $me['user_foto']; ?>" srcset="">
                                </div>
                                <div class="d-none d-md-block d-lg-inline-block">Hi, <?php echo $me['user_nama']; ?></div>
                            </a>
                            <div class="dropdown-menu dropdown-menu-right">
                                <a class="dropdown-item <?php if($menu == 'user' AND $sub_menu == 'pengaturan' AND $sub_menu3 == 'profil'){echo 'active';} ?>" href="user/pengaturan/profil"><i data-feather="user"></i> Profil</a>
                                <a class="dropdown-item <?php if($menu == 'user' AND $sub_menu == 'pengaturan' AND $sub_menu3 == 'password'){echo 'active';} ?>" href="user/pengaturan/password"><i data-feather="key"></i> Password</a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="user/logout"><i data-feather="log-out"></i> Logout</a>
                            </div>
                        </li>
                    </ul>
                </div>
            </nav>