<html>
<body>
<div id="main">

<div id="modulmenu">
	<?php if( $this->session->userdata('current_modulmenu') == 'REGISTER' ) $type = 'current_modulmenu'; else $type = 'modulmenu';?>
	<div class="<?php echo $type?>"><a href="<?=base_url()?>index.php/laporan/member_controller"> LAP MEMBER</a></div> 
	<?php if( $this->session->userdata('current_modulmenu') == 'PROFILE' ) $type = 'current_modulmenu'; else $type = 'modulmenu';?>
	<div class="<?php echo $type?>"><a href="<?=base_url()?>index.php/laporan/buku_controller"> LAP BUKU</a></div>
	<?php if( $this->session->userdata('current_modulmenu') == 'PROFILE' ) $type = 'current_modulmenu'; else $type = 'modulmenu';?>
	<div class="<?php echo $type?>"><a href="<?=base_url()?>index.php/laporan/hari_controller"> LAP HARIAN</a></div>
	<?php if( $this->session->userdata('current_modulmenu') == 'PROFILE' ) $type = 'current_modulmenu'; else $type = 'modulmenu';?>
	<div class="<?php echo $type?>"><a href="<?=base_url()?>index.php/laporan/bulan_controller"> LAP BULANAN</a></div>
	<?php if( $this->session->userdata('current_modulmenu') == 'PROFILE' ) $type = 'current_modulmenu'; else $type = 'modulmenu';?>
	<div class="<?php echo $type?>"><a href="<?=base_url()?>index.php/laporan/pinjam_controller"> LAP PINJAMAN BUKU</a></div>
</div>
	
<div class="modulheader">
LAPORAN HARIAN
</div>
<div class="content">
<div class="notification">
<?php echo $notification_message;?>
</div>
<fieldset>
<legend>Laporan harian</legend> 


<?php 
	$attributes = array('id' => 'search_form');
	$field1 = array( 
	'type' => 'text',  
	'name' => 'field1',
	'id' => 'field1',
	'rules' => 'required',
	);
	$field2 = array( 
	'type' => 'text',  
	'name' => 'field2',
	'id' => 'field2',
	'rules' => 'required',
	);

echo form_open('laporan/hari_controller/search',$attributes);?>
<table id="form">
	<tr>
	<td>Start Date </td><td>: <?php echo form_input($field1); ?></td>
	</tr>
	<tr>
	<td>End Date </td><td>: <?php echo form_input($field2); ?></td>
	</tr>
	<tr>
	<td><?php echo form_submit('cari', 'Cari');?></td>
	</tr>
</table>
<?php echo form_close();?>
</fieldset>

<?php if ($content!=""){

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
	
$this->table->set_heading('Nama Member','Nama Buku','Harga Sewa','Denda');
foreach ($content as $tr):
	$this->table->add_row($tr['namamember'],$tr['namabuku'],$tr['harga'],$tr['denda']);
endforeach;


echo $this->table->generate();
echo "Total Pendapatan : " . $total;
}
?>




</div>
</div>
</body>
</html>
