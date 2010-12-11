<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd"> 
<html>
<head>
<link rel="stylesheet" href="<?=base_url()?>/sijambu_style/<?php echo $style;?>" type="text/css" charset="utf-8">
</head>

<body>

<img src="<?=base_url()?>/sijambu_style/sijambu.png" width="50" height="70"/>
<div id = "judul">
Sistem Informasi Peminjaman Buku
</div>
<div id="welcome">
<div id="user">
<?php 
if( $this->session->userdata('logged_in') == TRUE ) {
echo "Welcome, ".$this->session->userdata('username');
?>
</div>
<a href="<?=base_url()?>index.php/password_controller"> Ganti Password </a> 
<a href="<?=base_url()?>index.php/logout_controller"> Logout </a> 
<?php }?>
</div>

<!-- MENU -->
<?php if( $this->session->userdata('logged_in') == TRUE ) { ?>

	<div id="menu">
	<?php if( $this->session->userdata('current_menu') == 'HOME' ) { ?>
	<div class="current_menu"><a href="<?=base_url()?>index.php/home_controller"> HOME </a></div>
	<?php }else {?>
	<div class="active_menu"><a href="<?=base_url()?>index.php/home_controller"> HOME </a></div>
	<?php }?>


	<?php if(element('BUKU',$this->session->userdata('user_access'))) {
	if( $this->session->userdata('current_menu') == 'BUKU' ) $type = 'current_menu'; else $type = 'active_menu';?>
	<div class="<?php echo $type?>"><a href="<?=base_url()?>index.php/buku/home_controller"> BUKU</a></div>            
	<?php }else {?>  
	<div class="inactive_menu">BUKU</div>
	<?php }?>


	<?php if(element('MEMBER',$this->session->userdata('user_access'))) {
	if( $this->session->userdata('current_menu') == 'MEMBER' ) $type = 'current_menu'; else $type = 'active_menu';?>
	<div class="<?php echo $type?>"><a href="<?=base_url()?>index.php/member/home_controller"> MEMBER</a></div>            
	<?php }else {?>  
	<div class="inactive_menu">MEMBER</div>
	<?php }?>


	<?php if(element('PEMINJAMAN',$this->session->userdata('user_access'))) {
	if( $this->session->userdata('current_menu') == 'PEMINJAMAN' ) $type = 'current_menu'; else $type = 'active_menu';?>
	<div class="<?php echo $type?>"><a href="<?=base_url()?>index.php/peminjaman/home_controller"> PEMINJAMAN</a></div>            
	<?php }else {?>  
	<div class="inactive_menu">PEMINJAMAN</div>
	<?php }?>
	
	<?php if(element('PENGEMBALIAN',$this->session->userdata('user_access'))) {
	if( $this->session->userdata('current_menu') == 'PENGEMBALIAN' ) $type = 'current_menu'; else $type = 'active_menu';?>
	<div class="<?php echo $type?>"><a href="<?=base_url()?>index.php/pengembalian/home_controller"> PENGEMBALIAN</a></div>            
	<?php }else {?>  
	<div class="inactive_menu">PENGEMBALIAN</div>
	<?php }?>
	
	<?php if(element('LAPORAN',$this->session->userdata('user_access'))) {
	if( $this->session->userdata('current_menu') == 'LAPORAN' ) $type = 'current_menu'; else $type = 'active_menu';?>
	<div class="<?php echo $type?>"><a href="<?=base_url()?>index.php/laporan/home_controller"> LAPORAN</a></div>            
	<?php }else {?>  
	<div class="inactive_menu">LAPORAN</div>
	<?php }?>
	
	<?php if(element('ACCOUNT',$this->session->userdata('user_access'))) {
	if( $this->session->userdata('current_menu') == 'ACCOUNT' ) $type = 'current_menu'; else $type = 'active_menu';?>
	<div class="<?php echo $type?>"><a href="<?=base_url()?>index.php/account/home_controller"> ACCOUNT</a></div>            
	<?php }else {?>  
	<div class="inactive_menu">ACCOUNT</div>
	<?php }?>
	
</div>
<?php }?>



</body>
</html>