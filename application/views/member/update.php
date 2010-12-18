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
UBAH
</div>
<div class="content">
<div class="notification">
<?php echo $notification_message;?>
</div>

<?php if ($content==""){?>
<fieldset>
<legend>Member Detail</legend> 


<?php 
	$attributes = array('id' => 'search_form');
	$field1 = array( 
	'type' => 'text',  
	'name' => 'idmember',
	'id' => 'idmember',
	'rules' => 'required',
	);

echo form_open('member/update_controller/searchMember',$attributes);?>
<table id="form">
	<tr>
	<td>ID Member</td><td>: <?php echo form_input($field1); ?></td>
	</tr>
	<tr>
	<td><?php echo form_submit('cari', 'Cari');?></td>
	</tr>
</table>
<?php echo form_close();?>
</fieldset>
<?php } else {?>


<fieldset>
<legend>Account Information</legend>

<?php 
	$attributes = array('id' => 'register_form');
	$field1 = array( 
	'type' => 'text',  
	'name' => 'idmember',
	'id' => 'idmember',
	'readonly' => 'readonly',
	'value' => $content['idmember'],
	'rules' => 'required',
	);
	
	if($content['jeniskelamin']==1){
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
	}
	else{
		$field2 = array(
		'name' => 'jeniskelamin',
		'id' => 'jeniskelamin',
		'value' =>'male',
		'checked' => FALSE,
		);
		$field21 = array(
		'name' => 'jeniskelamin',
		'id' => 'jeniskelamin',
		'value' =>'female',
		'checked' => TRUE,
		);	
	}
	
	
	$field3 = array(
	'type' => 'text',  
	'name' => 'telepon',
	'id' => 'telepon',
	'value' => $content['telepon'],
	);
	
	
	$field4 = array(
	'type' => 'text',  
	'name' => 'alamat',
	'id' => 'alamat',
	'value' => $content['alamat'],
	);
	
	$field5 = array(
	'type' => 'text',  
	'name' => 'tempatlahir',
	'id' => 'tempatlahir',
	'value' => $content['tempatlahir'],
	);
	$field6 = array(
	'type' => 'text',  
	'name' => 'tgllahir',
	'id' => 'tgllahir',
	'value' => $content['tgllahir'],
	);
	
	$field7 = array(
	'type' => 'text',  
	'name' => 'namamember',
	'id' => 'namamember',
	'value' => $content['namamember'],
	);

echo form_open('member/update_controller/updateMember',$attributes);?>
<table id="form">
	<tr>
	<td>ID member</td><td>: <?php echo form_input($field1); ?></td>
	</tr>
	
	<tr>
	<td>Nama Member</td><td>: <?php echo form_input($field7); ?></td>
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
	<td>Tempat Lahir</td><td>: <?php echo form_input($field5); ?></td>
	</tr>
	<tr>
	<td>Tanggal Lahir</td><td>: <?php echo form_input($field6); ?></td>
	</tr>
	<tr>
	<td><?php echo form_submit('ubah', 'Ubah');?></td>
	</tr>
</table>
<?php echo form_close();?>
</div>

</fieldset>

<?php } ?>
</div>
</div>
</body>
</html>
