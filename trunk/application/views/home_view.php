<html>
<body>
<div id="main">
<?php	
	if ($this->session->userdata('logged_in')==FALSE){
		$attributes = array('id' => 'login_form');
		$field1 = array( 
			    'type' => 'text',  
			    'name' => 'username',
			    'id' => 'username',
			);
		$field2 = array(
			    'type' => 'password',  
			    'name' => 'password',
			    'id' => 'password',
			);    
?>
<div class="modulheader">
LOGIN
</div>
<div class="content">
<div class="notification">
<?php echo $notification_message;?>
</div>
<?php echo form_open('login_controller/verify',$attributes);?>
<table id="form">
	<tr>
	<td>Username</td><td>: <?php echo form_input($field1); ?></td>
	</tr>
	<tr>
	<td>Password</td><td>: <?php echo form_input($field2); ?></td>
	</tr>
	<tr>
	<td><?php echo form_submit('login', 'Login');?></td>
	</tr>
</table>
<?php echo form_close();?>
</div>
<?php } else {?>

<!--home message -->
<div class="modulheader">
	Modul Head
</div>

<div class='content'>
	<img src="<?=base_url()?>/sijambu_style/sijambu.png"  width="150" height="180"/>
	<h1> Selamat datang di Sistem Peminjaman Buku (Sijambu)</h1>
	<p>Sijambu adalah sistem yang dibangun untuk mengelola peminjaman buku</p>
		<?php echo js_calendar_script('my_form');  ?>
		<?php echo js_calendar_write('entry_date', time(), true);?>
</div>


<?php }?>
</div>
</body>
</html>
