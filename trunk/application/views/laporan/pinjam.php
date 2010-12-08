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
LAPORAN PEMINJAMAN BUKU
</div>
<div class="content">
<div class="notification">
<?php echo $notification_message;?>
</div>
<fieldset>
<legend>Laporan peminjaman buku</legend> 


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
	
	$this->table->set_heading('Nama Member' , 'Nama Buku', 'Tanggal Pinjam', 'Tanggal Kembali', 'Harga Sewa', 'Batas Pinjam','Lama Pinjam');
	foreach ($content as $pinjam):
		$this->table->add_row($pinjam['namamember'],$pinjam['namabuku'],$pinjam['tglpinjam'],$pinjam['tglkembali'],$pinjam['hargasewa'],$pinjam['lama'],$pinjam['telat']);
	endforeach;
	echo $this->table->generate();
}
?>




</div>
</div>
</body>
</html>
