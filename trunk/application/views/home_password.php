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
	Ganti Password
</div>

<div class='content'>
<div class="notification">
<?php echo $notification_message;?>
</div>
<fieldset>
<legend>Change Password</legend>

<?php 
	$attributes = array('id' => 'register_form');
	$field1 = array( 
	'type' => 'password',  
	'name' => 'passlama',
	'id' => 'passlama',
	'rules' => 'required',
	);
	$field2 = array(
	'type' => 'password',  
	'name' => 'passbaru',
	'id' => 'passbaru',
	'rules' => 'required',
	);
	$field3 = array(
	'type' => 'password',  
	'name' => 'passconf',
	'id' => 'passconf',
	);

echo form_open('password_controller/changepassword',$attributes);?>
<table id="form">
	<tr>
	<td>Old Password </td><td>: <?php echo form_input($field1); ?></td>
	</tr>
	<tr>
	<td>New Password</td><td>: <?php echo form_input($field2); ?></td>
	</tr>
	<tr>
	<td>Confirm New Password</td><td>: <?php echo form_input($field3); ?></td>
	</tr>
	<tr>
	<td><?php echo form_submit('register', 'Register');?></td>
	</tr>
</table>
<?php echo form_close();?>
</div>

</fieldset>	
</div>
<?php }?>
</div>
</body>
</html>
