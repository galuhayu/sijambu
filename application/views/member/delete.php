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
HAPUS
</div>
<div class="content">
<div class="notification">
<?php echo $notification_message;?>
</div>
<fieldset>
<legend>Member Detail</legend> 


<?php 
	$attributes = array('id' => 'delete_form');
	$field1 = array( 
	'type' => 'text',  
	'name' => 'idmember',
	'id' => 'idmember',
	'rules' => 'required',
	);

echo form_open('member/delete_controller/deleteMember',$attributes);?>
<table id="form">
	<tr>
	<td>Id Member</td><td>: <?php echo form_input($field1); ?></td>
	</tr>
	<tr>
	<td><?php echo form_submit('delete', 'Delete');?></td>
	</tr>
</table>
<?php echo form_close();?>
</fieldset>


</div>
</div>
</body>
</html>
