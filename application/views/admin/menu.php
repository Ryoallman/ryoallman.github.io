<?php 
$menu        = strtolower($this->uri->segment(1));
$sub_menu    = strtolower($this->uri->segment(2));
$sub_menu3   = strtolower($this->uri->segment(3));
 ?>
<div class="sidebar" id="sidebar">
	<div class="sidebar-inner slimscroll">
		<div id="sidebar-menu" class="sidebar-menu">
			<ul>
				<li class="menu-title"><span>Main</span></li>
				<li class="<?php if($menu == 'admin' AND $sub_menu == 'dashboard'){echo 'active';} ?>"><a href="admin/dashboard"><i data-feather="home"></i> <span>Dashboard</span></a></li>
				<li class="<?php if($menu == 'admin' AND $sub_menu == 'donasi'){echo 'active';} ?>"><a href="admin/donasi"><i data-feather="credit-card"></i> <span>Donasi</span></a></li>
				<li class="<?php if($menu == 'admin' AND $sub_menu == 'galang-dana'){echo 'active';} ?>"><a href="admin/galang-dana"><i data-feather="package"></i> <span>Galang Dana</span></a></li>
				<li class="<?php if($menu == 'admin' AND $sub_menu == 'pengguna'){echo 'active';} ?>"><a href="admin/pengguna"><i data-feather="users"></i> <span>Pengguna</span></a></li>
				<li class="<?php if($menu == 'admin' AND $sub_menu == 'pencairan'){echo 'active';} ?>"><a href="admin/pencairan"><i data-feather="link-2"></i> <span>Pencairan</span></a></li>
				<li class="submenu <?php if($menu == 'admin' AND $sub_menu == 'laporan'){echo 'active';} ?>"><a href="#"><i data-feather="file-text"></i> <span> Laporan</span> <span class="menu-arrow"></span></a>
					<ul>
						<li><a class="<?php if($menu == 'admin' AND $sub_menu == 'laporan' AND $sub_menu3 == 'top-donatur'){echo 'active';} ?>" href="admin/laporan/top-donatur">Top Donatur</a></li>
						<li><a class="<?php if($menu == 'admin' AND $sub_menu == 'laporan' AND $sub_menu3 == 'donasi-masuk'){echo 'active';} ?>" href="admin/laporan/donasi-masuk">Donasi Masuk</a></li>
						<li><a class="<?php if($menu == 'admin' AND $sub_menu == 'laporan' AND $sub_menu3 == 'galang-dana'){echo 'active';} ?>" href="admin/laporan/galang-dana">Galang Dana</a></li>
						<li><a class="<?php if($menu == 'admin' AND $sub_menu == 'laporan' AND $sub_menu3 == 'pengguna'){echo 'active';} ?>" href="admin/laporan/pengguna">Pengguna</a></li>
						<li><a class="<?php if($menu == 'admin' AND $sub_menu == 'laporan' AND $sub_menu3 == 'pencairan'){echo 'active';} ?>" href="admin/laporan/pencairan">Pencairan</a></li>
						<li><a class="<?php if($menu == 'admin' AND $sub_menu == 'laporan' AND $sub_menu3 == 'keuntungan'){echo 'active';} ?>" href="admin/laporan/keuntungan">Keuntungan</a></li>
					</ul>
				</li>
				<li class="submenu <?php if($menu == 'admin' AND $sub_menu == 'pengaturan'){echo 'active';} ?>"><a href="#"><i data-feather="settings"></i> <span> Pengaturan</span> <span class="menu-arrow"></span></a>
					<ul>
						<li><a class="<?php if($menu == 'admin' AND $sub_menu == 'pengaturan' AND $sub_menu3 == 'profil'){echo 'active';} ?>" href="admin/pengaturan/profil">Profil</a></li>
						<li><a class="<?php if($menu == 'admin' AND $sub_menu == 'pengaturan' AND $sub_menu3 == 'rekening'){echo 'active';} ?>" href="admin/pengaturan/rekening">No Rekening</a></li>
						<li><a class="<?php if($menu == 'admin' AND $sub_menu == 'pengaturan' AND $sub_menu3 == 'email'){echo 'active';} ?>" href="admin/pengaturan/email">Email</a></li>
					</ul>
				</li>
				<li class="<?php if($menu == 'admin' AND $sub_menu == 'pesan-masuk'){echo 'active';} ?>"><a href="admin/pesan-masuk"><i data-feather="mail"></i> <span>Pesan Masuk</span></a></li>
				<li class="menu-title"><span>Pages</span></li>
				<li class="submenu"><a href="#"><i data-feather="file"></i> <span>Postingan </span> <span class="menu-arrow"></span></a>
					<ul>
						<li><a class="<?php if($menu == 'admin' AND $sub_menu == 'postingan' AND $sub_menu3 == 'artikel'){echo 'active';} ?>" href="admin/postingan/artikel">Artikel</a></li>
						<li><a class="<?php if($menu == 'admin' AND $sub_menu == 'postingan' AND $sub_menu3 == 'kategori'){echo 'active';} ?>" href="admin/postingan/kategori">Kategori</a></li>
					</ul>
				</li>
				<li><a href="" target="_blank"><i data-feather="globe"></i> <span>Homepage</span></a></li>
			</ul>
		</div>
	</div>
</div>