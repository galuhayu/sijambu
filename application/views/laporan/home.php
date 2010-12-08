<html>
<body>
<div id="main">


<div id="modulmenu">
	<?php if( $this->session->userdata('current_modulmenu') == 'REGISTER' ) $type = 'current_modulmenu'; else $type = 'modulmenu';?>
	<div class="<?php echo $type?>"><a href="<?=base_url()?>index.php/laporan/member_controller"> LAP MEMBER</a></div> 
	<?php if( $this->session->userdata('current_modulmenu') == 'PROFILE' ) $type = 'current_modulmenu'; else $type = 'modulmenu';?>
	<div class="<?php echo $type?>"><a href="<?=base_url()?>index.php/laporan/buku_controller"> LAP BUKU</a></div>
	<?php if( $this->session->userdata('current_modulmenu') == 'PROFILE' ) $type = 'current_modulmenu'; else $type = 'modulmenu';?>
	<div class="<?php echo $type?>"><a href="<?=base_url()?>index.php/laporan/hari_controller"> LAP HARIAN</a></div>
	<?php if( $this->session->userdata('current_modulmenu') == 'PROFILE' ) $type = 'current_modulmenu'; else $type = 'modulmenu';?>
	<div class="<?php echo $type?>"><a href="<?=base_url()?>index.php/laporan/bulan_controller"> LAP BULANAN</a></div>
	<?php if( $this->session->userdata('current_modulmenu') == 'PROFILE' ) $type = 'current_modulmenu'; else $type = 'modulmenu';?>
	<div class="<?php echo $type?>"><a href="<?=base_url()?>index.php/laporan/pinjam_controller"> LAP PINJAMAN BUKU</a></div>
</div>
	
	
<div class="modulheader">
LAPORAN
</div>
<div class="content">
<div class="notification">
<?php echo $notification_message;?>
</div>
<fieldset>
<legend>Laporan Detail</legend> 
Ini adalah menu untuk melihat laporan
<br/>
<br/>
Menu <b>LAP MEMBER</b> digunakan untuk melihat laporan member diurutkan berdasarkan jumlah pinjaman terbanyak
<br/>
<br/>
Menu <b>LAP BUKU</b> digunakan untuk melihat laporan buku yang diurutkan berdasarkan buku yang paling sering dipinjam
<br/>
<br/>
Menu <b>LAP HARIAN</b> digunakan untuk melihat laporan transaksi harian pada interval hari
<br/>
<br/>
Menu <b>LAP BULANAN</b> digunakan untuk melihat laporan transaksi pada suatu bulan
<br/>
<br/>
Menu <b>LAP PINJAMAN BUKU</b> digunakan untuk melihat laporan buku yang belum dikembalikan oleh member
</div>
</div>
</body>
</html>
