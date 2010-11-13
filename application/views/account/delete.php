<html>
<body>
<div id="main">


<div id="modulmenu">
	<?php if( $this->session->userdata('current_modulmenu') == 'REGISTER' ) $type = 'current_modulmenu'; else $type = 'modulmenu';?>
	<div class="<?php echo $type?>"><a href="<?=base_url()?>index.php/account/add_controller"> ADD</a></div> 
	<?php if( $this->session->userdata('current_modulmenu') == 'PROFILE' ) $type = 'current_modulmenu'; else $type = 'modulmenu';?>
	<div class="<?php echo $type?>"><a href="<?=base_url()?>index.php/account/search_controller"> SEARCH</a></div>
	<?php if( $this->session->userdata('current_modulmenu') == 'PROFILE' ) $type = 'current_modulmenu'; else $type = 'modulmenu';?>
	<div class="<?php echo $type?>"><a href="<?=base_url()?>index.php/account/update_controller"> UPDATE</a></div>
	<?php if( $this->session->userdata('current_modulmenu') == 'PROFILE' ) $type = 'current_modulmenu'; else $type = 'modulmenu';?>
	<div class="<?php echo $type?>"><a href="<?=base_url()?>index.php/account/delete_controller"> DELETE</a></div>
</div>
	
<div class="modulheader">
DELETE
</div>
<div class="content">
<div class="notification">
<?php echo $notification_message;?>
</div>
<fieldset>
<legend>Account Detail</legend> 


<?php 
	$attributes = array('id' => 'delete_form');
	$field1 = array( 
	'type' => 'text',  
	'name' => 'username',
	'id' => 'username',
	'rules' => 'required',
	);

echo form_open('account/delete_controller/deleteAccount',$attributes);?>
<table id="form">
	<tr>
	<td>Username</td><td>: <?php echo form_input($field1); ?></td>
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
