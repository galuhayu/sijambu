<html>
<body>
<div id="main">
	
<div class="modulheader">
PEMINJAMAN
</div>
<div class="content">
<div class="notification">
<?php echo $notification_message;?>
</div>
<fieldset>
<legend>Transaksi Peminjaman</legend> 


<?php
$attributes = array('id' => 'pinjam_form');
	$field1 = array( 
	'type' => 'text',  
	'name' => 'idmember',
	'id' => 'idmember',
	'rules' => 'required',
	);
	$field5 = array(
	'bawapulang' => 'Bawa pulang',  
	'bacatempat' => 'Baca di tempat',
	);
	
	
echo form_open('peminjaman/pinjam_controller/transaksi',$attributes);
?>
<table id="form">
	<tr>
	<td>Tipe Peminjaman</td><td>: <?php echo form_dropdown('tipe',$field5,'bawapulang'); ?></td>
	</tr>
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
