<html>
<body>
<div id="main">


<div id="modulmenu">
	<?php if( $this->session->userdata('current_modulmenu') == 'REGISTER' ) $type = 'current_modulmenu'; else $type = 'modulmenu';?>
	<div class="<?php echo $type?>"><a href="<?=base_url()?>index.php/buku/add_controller"> ADD</a></div> 
	<?php if( $this->session->userdata('current_modulmenu') == 'PROFILE' ) $type = 'current_modulmenu'; else $type = 'modulmenu';?>
	<div class="<?php echo $type?>"><a href="<?=base_url()?>index.php/buku/search_controller"> SEARCH</a></div>
	<?php if( $this->session->userdata('current_modulmenu') == 'PROFILE' ) $type = 'current_modulmenu'; else $type = 'modulmenu';?>
	<div class="<?php echo $type?>"><a href="<?=base_url()?>index.php/buku/update_controller"> UPDATE</a></div>
	<?php if( $this->session->userdata('current_modulmenu') == 'PROFILE' ) $type = 'current_modulmenu'; else $type = 'modulmenu';?>
	<div class="<?php echo $type?>"><a href="<?=base_url()?>index.php/buku/delete_controller"> DELETE</a></div>
</div>
	
<div class="modulheader">
UPDATE
</div>
<div class="content">
<div class="notification">
<?php echo $notification_message;?>
</div>

<?php if ($content==""){?>
<fieldset>
<legend>Book Detail</legend> 


<?php 
	$attributes = array('id' => 'search_form');
	$field1 = array( 
	'type' => 'text',  
	'name' => 'idbuku',
	'id' => 'idbuku',
	'rules' => 'required',
	);

echo form_open('buku/update_controller/searchBuku',$attributes);?>
<table id="form">
	<tr>
	<td>ID Book</td><td>: <?php echo form_input($field1); ?></td>
	</tr>
	<tr>
	<td><?php echo form_submit('find', 'Find');?></td>
	</tr>
</table>
<?php echo form_close();?>
</fieldset>
<?php } else {?>


<fieldset>
<legend>Account Information</legend>

<?php 
	$attributes = array('id' => 'update_form');
	$field1 = array( 
	'type' => 'text',  
	'name' => 'idbuku',
	'id' => 'idbuku',
	'readonly' => 'readonly',
	'value' => $content['idbuku'],
	'rules' => 'required',
	);
	$field3 = array(
	'type' => 'text',  
	'name' => 'namabuku',
	'value' => $content['namabuku'],
	'id' => 'namabuku',
	);
	$field4 = array(
	'type' => 'text',  
	'name' => 'pengarang',
	'value' => $content['pengarang'],
	'id' => 'pengarang',
	);
	$field5 = array(
	'type' => 'text',  
	'name' => 'hargasewa',
	'value' => $content['hargasewa'],
	'id' => 'hargasewa',
	);
	$field6 = array(
	'type' => 'text',  
	'name' => 'lama',
	'value' => $content['lama'],
	'id' => 'lama',
	);

echo form_open('buku/update_controller/updateBuku',$attributes);?>
<table id="form">
	<tr>
	<td>ID Buku</td><td>: <?php echo form_input($field1); ?></td>
	</tr>
	
	<tr>
	<td>Judul Buku</td><td>: <?php echo form_input($field3); ?></td>
	</tr>
	<tr>
	<td>Pengarang</td><td>: <?php echo form_input($field4); ?></td>
	</tr>
	<tr>
	<td>Harga</td><td>: <?php echo form_input($field5); ?></td>
	</tr>
	<tr>
	<td>Lama Sewa</td><td>: <?php echo form_input($field6); ?></td>
	</tr>
	<tr>
	<td><?php echo form_submit('update', 'Update');?></td>
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
