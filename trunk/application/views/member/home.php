<html>
<body>
<div id="main">


<div id="modulmenu">
	<?php if( $this->session->userdata('current_modulmenu') == 'REGISTER' ) $type = 'current_modulmenu'; else $type = 'modulmenu';?>
	<div class="<?php echo $type?>"><a href="<?=base_url()?>index.php/member/add_controller"> ADD</a></div> 
	<?php if( $this->session->userdata('current_modulmenu') == 'PROFILE' ) $type = 'current_modulmenu'; else $type = 'modulmenu';?>
	<div class="<?php echo $type?>"><a href="<?=base_url()?>index.php/member/search_controller"> SEARCH</a></div>
	<?php if( $this->session->userdata('current_modulmenu') == 'PROFILE' ) $type = 'current_modulmenu'; else $type = 'modulmenu';?>
	<div class="<?php echo $type?>"><a href="<?=base_url()?>index.php/member/update_controller"> UPDATE</a></div>
	<?php if( $this->session->userdata('current_modulmenu') == 'PROFILE' ) $type = 'current_modulmenu'; else $type = 'modulmenu';?>
	<div class="<?php echo $type?>"><a href="<?=base_url()?>index.php/member/delete_controller"> DELETE</a></div>
</div>
	
<div class="modulheader">
MEMBER
</div>
<div class="content">
<div class="notification">
<?php echo $notification_message;?>
</div>
<fieldset>
<legend>List of Members</legend> 


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
	
	$this->table->set_heading('Id Member','Nama Member','Jenis Kelamin','Telepon','Alamat', 'Tempat Lahir', 'Tanggal Lahir' );
	foreach ($content as $member):
		if ($member['jeniskelamin'] == 1){
			$buku['jeniskelamin'] = "pria";
		}else{
			$buku['jeniskelamin'] = "wanita";
		}
		$this->table->add_row($member['idmember'],$member['namamember'],$member['jeniskelamin'],$member['telepon'],$member['alamat'],$member['tempatlahir'],$member['tgllahir']);
	endforeach;
	echo $this->table->generate();
}
?>




</div>
</div>
</body>
</html>
