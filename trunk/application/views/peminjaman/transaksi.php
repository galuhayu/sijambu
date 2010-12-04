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

Id Member : 
<?php echo $idmember;?>

Tipe Peminjaman : 
<?php 
	if ($tipe == 1) {
		echo "Baca di tempat";
	}
	else{
		echo "Bawa pulang";
	}
?>
<br/>
<br/>
<?php
	$attributes = array('id' => 'add_form');
	$hidden = array('data' => $content, 'idmember' => $idmember , 'tipe'=>$tipe ,'num' => count($content) );
	$field1 = array( 
	'type' => 'text',  
	'name' => 'idbuku',
	'id' => 'idbuku',
	'rules' => 'required',
	);
	echo form_open('peminjaman/pinjam_controller/transaksiTambah',$attributes,$hidden);
?>	
	<table id="form1">
	<tr>
	<td>Id Buku</td><td>: <?php echo form_input($field1); ?></td>
	<td><?php echo form_submit('add', 'Add');?></td>
	</tr>
	</table>
	<?php echo form_close();?>



<?php 
if ($content!=""){
	$tmpl = array (
		'table_open'          => '<table id = "table" border="0" cellpadding="4" cellspacing="0">',

		'heading_row_start'   => '<tr>',
		'heading_row_end'     => '</tr>',
		'heading_cell_start'  => '<th  class="tablehead">',
		'heading_cell_end'    => '</th>',

		'row_start'           => '<tr class="tablerow_odd">',
		'row_end'             => '</tr>',
		'cell_start'          => '<td>',
		'cell_end'            => '</td>',

		'row_alt_start'       => '<tr class="tablerow_even">',
		'row_alt_end'         => '</tr>',
		'cell_alt_start'      => '<td>',
		'cell_alt_end'        => '</td>',

		'table_close'         => '</table>'
	);
	$this->table->set_template($tmpl);
	
	$this->table->set_heading('Id Buku','Judul Buku','Pengarang','Harga','Tanggal Pinjam', 'Tanggal Kembali' );
	date_default_timezone_set("UTC");
	$datestring = "%Y-%m-%d";
	$now = time();
	foreach ($content as $buku):
		$ret = time() + (24*60*60 * $buku['lama']);
		$this->table->add_row($buku['idbuku'],$buku['namabuku'],$buku['pengarang'],$buku['hargasewa'],mdate($datestring,$now), mdate($datestring,$ret));
	endforeach;
	echo $this->table->generate();
}
?>



<?php

	$attributes = array('id' => 'save_form');
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

	$hidden = array('data' => $content, 'idmember' => $idmember , 'tipe'=>$tipe ,'num' => count($content) );
	
echo form_open('peminjaman/pinjam_controller/transaksiSimpan',$attributes,$hidden);
?>

Total = <?php echo $totalsewa;?>
<br/>

<table id="form2">
	<tr>
	<td><?php echo form_submit('simpan', 'Simpan');?></td>
	</tr>
</table>
<?php echo form_close();?>
</div>


</div>
</div>
</body>
</html>
