<html>
<body>
<div id="main">
	
<div class="modulheader">
PENGEMBALIAN
</div>
<div class="content">
<div class="notification">
<?php echo $notification_message;?>
</div>
<fieldset>
<legend>Transaksi Pengembalian</legend> 


<?php
$attributes = array('id' => 'pinjam_form');
	$field1 = array( 
	'type' => 'text',  
	'name' => 'idmember',
	'id' => 'idmember',
	'rules' => 'required',
	);
	
echo form_open('pengembalian/kembali_controller/transaksi',$attributes);
?>
<table id="form">
	<tr>
	<td>Id Member</td><td>: <?php echo form_input($field1); ?></td>
	</tr>
	<tr>
	<td><?php echo form_submit('proses', 'Proses');?></td>
	</tr>
</table>
<?php echo form_close();?>
</div>


</div>
</div>
</body>
</html>
