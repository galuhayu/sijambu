<html>
<body>
<div id="main">


<div id="modulmenu">
	<?php if( $this->session->userdata('current_modulmenu') == 'REGISTER' ) $type = 'current_modulmenu'; else $type = 'modulmenu';?>
	<div class="<?php echo $type?>"><a href="<?=base_url()?>index.php/account/add_controller"> ADD</a></div> 
	<?php if( $this->session->userdata('current_modulmenu') == 'PROFILE' ) $type = 'current_modulmenu'; else $type = 'modulmenu';?>
	<div class="<?php echo $type?>"><a href="<?=base_url()?>index.php/account/search_controller"> SEARCH</a></div>
</div>
	
<div class="modulheader">
ADD
</div>
<div class="content">
<div class="notification">
<?php echo $notification_message;?>
</div>
<fieldset>
<legend>Account Information</legend>

<?php 
	$attributes = array('id' => 'register_form');
	$field1 = array( 
	'type' => 'text',  
	'name' => 'username',
	'id' => 'username',
	'rules' => 'required',
	);
	$field2 = array(
	'type' => 'password',  
	'name' => 'password',
	'id' => 'password',
	'rules' => 'required',
	);
	$field3 = array(
	'type' => 'text',  
	'name' => 'name',
	'id' => 'name',
	);
	$field4 = array(
	'type' => 'text',  
	'name' => 'address',
	'id' => 'address',
	);
	$field5 = array(
	'pegawai_toko' => 'Pegawai',  
	'pemilik_toko' => 'Pemilik',
	'pengelola_toko' => 'Pengelola',
	);
	$field6 = array(
	'type' => 'text',  
	'name' => 'telp',
	'id' => 'telp',
	);

echo form_open('account/add_controller/addAccount',$attributes);?>
<table id="form">
	<tr>
	<td>Username</td><td>: <?php echo form_input($field1); ?></td>
	</tr>
	<tr>
	<td>Password</td><td>: <?php echo form_input($field2); ?></td>
	</tr>
	<tr>
	<td>Nama</td><td>: <?php echo form_input($field3); ?></td>
	</tr>
	<tr>
	<td>Alamat</td><td>: <?php echo form_input($field4); ?></td>
	</tr>
	<tr>
	<td>Jabatan</td><td>: <?php echo form_dropdown('jabatan',$field5,'pegawai_toko'); ?></td>
	</tr>
	<tr>
	<td>No telp</td><td>: <?php echo form_input($field6); ?></td>
	</tr>
	<tr>
	<td><?php echo form_submit('register', 'Register');?></td>
	</tr>
</table>
<?php echo form_close();?>
</div>

</fieldset>
</div>
</div>
</body>
</html>
