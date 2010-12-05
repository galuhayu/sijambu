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

Id Member : 
<?php echo $idmember;?>

<br/>
<br/>

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
	
	$attributes = array('id' => 'hitung_form');
	$hidden = array('data' => $content, 'idmember' => $idmember , 'num' => count($content) );
	echo form_open('pengembalian/kembali_controller/transaksiHitung',$attributes,$hidden);
	
	$this->table->set_heading('Id Buku','Judul Buku','Pengarang','Harga','Tanggal Pinjam', 'Tanggal Kembali' , 'Kembalikan?');
	date_default_timezone_set("UTC");
	$datestring = "%Y-%m-%d";
	$now = time();
	$id=0;
	foreach ($content as $buku):
		$id++;
		$field1 = array(
		    'name' => 'status'.$id,
		    'id'=> 'status'.$id,
		    'value'=> $id,
		    'checked'=> $buku['status'],
		);
		$this->table->add_row($buku['idbuku'],$buku['namabuku'],$buku['pengarang'],$buku['hargasewa'],$buku['tglpinjam'], mdate($datestring,$now), form_checkbox($field1));
	endforeach;
	echo $this->table->generate();
	
	?>	
	<table id="form1">
	<tr>
	<td><?php echo form_submit('hitungDenda', 'Hitung Denda');?></td>
	</tr>
	</table>
	<?php echo form_close();?>


Total Denda = <?php echo $totaldenda;
}
?>


<?php

	$attributes = array('id' => 'save_form');
	
	$hidden = array('data' => $content, 'idmember' => $idmember ,'num' => count($content) , 'select' => $select);
	
echo form_open('pengembalian/kembali_controller/transaksiSimpan',$attributes,$hidden);
?>


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
