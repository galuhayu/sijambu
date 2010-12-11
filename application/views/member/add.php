<html>
<body>
<div id="main">


<div id="modulmenu">
	<?php if( $this->session->userdata('current_modulmenu') == 'REGISTER' ) $type = 'current_modulmenu'; else $type = 'modulmenu';?>
	<div class="<?php echo $type?>"><a href="<?=base_url()?>index.php/member/add_controller"> TAMBAH</a></div> 
	<?php if( $this->session->userdata('current_modulmenu') == 'PROFILE' ) $type = 'current_modulmenu'; else $type = 'modulmenu';?>
	<div class="<?php echo $type?>"><a href="<?=base_url()?>index.php/member/search_controller"> CARI</a></div>
	<?php if( $this->session->userdata('current_modulmenu') == 'PROFILE' ) $type = 'current_modulmenu'; else $type = 'modulmenu';?>
	<div class="<?php echo $type?>"><a href="<?=base_url()?>index.php/member/update_controller"> UBAH</a></div>
	<?php if( $this->session->userdata('current_modulmenu') == 'PROFILE' ) $type = 'current_modulmenu'; else $type = 'modulmenu';?>
	<div class="<?php echo $type?>"><a href="<?=base_url()?>index.php/member/delete_controller"> HAPUS</a></div>
</div>
	
<div class="modulheader">
TAMBAH
</div>
<div class="content">
<div class="notification">
<?php echo $notification_message;?>
</div>
<fieldset>
<legend>Member Information</legend>

<?php 
	$attributes = array('id' => 'register_form');
	$field1 = array( 
	'type' => 'text',  
	'name' => 'namamember',
	'id' => 'namamember',
	'rules' => 'required',
	);
	$field2 = array(
	'name' => 'jeniskelamin',
	'id' => 'jeniskelamin',
	'value' =>'male',
	'checked' => TRUE,
	);
	$field21 = array(
	'name' => 'jeniskelamin',
	'id' => 'jeniskelamin',
	'value' =>'female',
	'checked' => FALSE,
	);
	
	$field3 = array(
	'type' => 'text',  
	'name' => 'telepon',
	'id' => 'telepon',
	'rules' => 'required',
	);
	$field4 = array(
	'type' => 'text',  
	'name' => 'alamat',
	'id' => 'alamat',
	'rules' => 'required',
	);
	$field5 = array(
	'type' => 'text',  
	'name' => 'tempatlahir',
	'id' => 'tempatlahir',
	);
	$field6 = array(
	'type' => 'text',  
	'name' => 'tgllahir',
	'id' => 'tgllahir',
	);

echo form_open('member/add_controller/addMember',$attributes);?>
<table id="form">
	<tr>
	<td>Nama Member</td><td>: <?php echo form_input($field1); ?></td>
	</tr>
	<tr>
	<td>Jenis Kelamin</td><td>: <?php echo form_radio($field2); ?> Pria <?php echo form_radio($field21); ?> Wanita</td>
	</tr>
	<tr>
	<td>Telepon</td><td>: <?php echo form_input($field3); ?></td>
	</tr>
	<tr>
	<td>Alamat</td><td>: <?php echo form_input($field4); ?></td>
	</tr>
	<tr>
	<td>Tempat lahir</td><td>: <?php echo form_input($field5); ?></td>
	</tr>
	<tr>
	<td>Tanggal Lahir</td><td>: <?php echo form_input($field6); ?></td>
	</tr>
	<tr>
	<td><?php echo form_submit('add', 'Add');?></td>
	</tr>
</table>
<?php echo form_close();?>
</div>

</fieldset>
</div>
</div>
</body>
</html>
