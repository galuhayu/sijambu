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
<div id = "middlemenu">
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
	<p>aduh bingung buat dong css nya</p>
	<p>content nya juga</p>
	<p>semua juga belum</p>
</div>


<?php }?>
</div>
</body>
</html>
