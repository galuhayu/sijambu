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
ADD
</div>
<div class="content">
<div class="notification">
<?php echo $notification_message;?>
</div>
<fieldset>
<legend>Book Information</legend>

<?php 
	$attributes = array('id' => 'buku_add_form');
	$field1 = array( 
	'type' => 'text',  
	'name' => 'namabuku',
	'id' => 'namabuku',
	'rules' => 'required',
	);
	$field2 = array(
	'type' => 'text',  
	'name' => 'pengarang',
	'id' => 'pengarang',
	'rules' => 'required',
	);
	$field3 = array(
	'type' => 'text',  
	'name' => 'hargasewa',
	'id' => 'hargasewa',
	);
	$field4 = array(
	'type' => 'text',  
	'name' => 'lama',
	'id' => 'lama',
	);

echo form_open('buku/add_controller/addBuku',$attributes);?>
<table id="form">
	<tr>
	<td>Judul Buku</td><td>: <?php echo form_input($field1); ?></td>
	</tr>
	<tr>
	<td>Pengarang</td><td>: <?php echo form_input($field2); ?></td>
	</tr>
	<tr>
	<td>Harga</td><td>: <?php echo form_input($field3); ?></td>
	</tr>
	<tr>
	<td>Lama Sewa</td><td>: <?php echo form_input($field4); ?></td>
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
