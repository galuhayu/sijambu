<html>
<body>
<div id="main">


<div id="modulmenu">
	<?php if( $this->session->userdata('current_modulmenu') == 'REGISTER' ) $type = 'current_modulmenu'; else $type = 'modulmenu';?>
	<div class="<?php echo $type?>"><a href="<?=base_url()?>index.php/buku/add_controller"> ADD</a></div> 
	<?php if( $this->session->userdata('current_modulmenu') == 'PROFILE' ) $type = 'current_modulmenu'; else $type = 'modulmenu';?>
	<div class="<?php echo $type?>"><a href="<?=base_url()?>index.php/buku/search_controller"> SEARCH</a></div>
	<?php if( $this->session->userdata('current_modulmenu') == 'PROFILE' ) $type = 'current_modulmenu'; else $type = 'modulmenu';?>
	<div class="<?php echo $type?>"><a href="<?=base_url()?>index.php/buku/update_controller"> UPDATE</a></div>
	<?php if( $this->session->userdata('current_modulmenu') == 'PROFILE' ) $type = 'current_modulmenu'; else $type = 'modulmenu';?>
	<div class="<?php echo $type?>"><a href="<?=base_url()?>index.php/buku/delete_controller"> DELETE</a></div>
</div>
	
<div class="modulheader">
SEARCH
</div>
<div class="content">
<div class="notification">
<?php echo $notification_message;?>
</div>
<fieldset>
<legend>Book Detail</legend> 


<?php 
	$attributes = array('id' => 'search_form');
	$field1 = array( 
	'type' => 'text',  
	'name' => 'field',
	'id' => 'field',
	'rules' => 'required',
	);
	$field2 = array(
	'name' => 'tipe',
	'id' => 'tipe',
	'value' =>'id',
	'checked' => TRUE,
	);
	$field21 = array(
	'name' => 'tipe',
	'id' => 'tipe',
	'value' =>'judul',
	'checked' => FALSE,
	);

echo form_open('buku/search_controller/searchBuku',$attributes);?>
<table id="form">
	<tr>
	<td>Search by </td><td>: <?php echo form_radio($field2); ?> Id buku <?php echo form_radio($field21);?> Judul Buku</td>
	</tr>
	<tr>
	<td>Field</td><td>: <?php echo form_input($field1); ?></td>
	</tr>
	<tr>
	<td><?php echo form_submit('search', 'Search');?></td>
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
	
$this->table->set_heading('No Buku','Judul Buku','Pengarang','Harga','Status','Lama Sewa','Tanggal Kembali');
foreach ($content as $book):
	if ($book['status']== 1){
		$book['status'] = "tersedia";
	}
	else{
		$book['status'] = "kosong";
	}
	$this->table->add_row($book['idbuku'],$book['namabuku'],$book['pengarang'],$book['status'],$book['hargasewa'],$book['lama'],$book['tglkembali']);
endforeach;

echo $this->table->generate();
}
?>




</div>
</div>
</body>
</html>
