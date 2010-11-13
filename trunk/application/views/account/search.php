<html>
<body>
<div id="main">


<div id="modulmenu">
	<?php if( $this->session->userdata('current_modulmenu') == 'REGISTER' ) $type = 'current_modulmenu'; else $type = 'modulmenu';?>
	<div class="<?php echo $type?>"><a href="<?=base_url()?>index.php/account/add_controller"> ADD</a></div> 
	<?php if( $this->session->userdata('current_modulmenu') == 'PROFILE' ) $type = 'current_modulmenu'; else $type = 'modulmenu';?>
	<div class="<?php echo $type?>"><a href="<?=base_url()?>index.php/account/search_controller"> SEARCH</a></div>
</div>
	
<div class="modulheader">
SEARCH
</div>
<div class="content">
<div class="notification">
<?php echo $notification_message;?>
</div>
<fieldset>
<legend>Account Detail</legend> 


<?php 
	$attributes = array('id' => 'search_form');
	$field1 = array( 
	'type' => 'text',  
	'name' => 'username',
	'id' => 'username',
	'rules' => 'required',
	);

echo form_open('account/search_controller/searchAccount',$attributes);?>
<table id="form">
	<tr>
	<td>Username</td><td>: <?php echo form_input($field1); ?></td>
	</tr>
	<tr>
	<td><?php echo form_submit('search', 'Search');?></td>
	</tr>
</table>
<?php echo form_close();?>
<?php if ($content!=0){

$tmpl = array (
	'table_open'          => '<table border="0" cellpadding="4" cellspacing="0">',

	'heading_row_start'   => '<tr>',
	'heading_row_end'     => '</tr>',
	'heading_cell_start'  => '<th>',
	'heading_cell_end'    => '</th>',

	'row_start'           => '<tr>',
	'row_end'             => '</tr>',
	'cell_start'          => '<td>',
	'cell_end'            => '</td>',

	'row_alt_start'       => '<tr>',
	'row_alt_end'         => '</tr>',
	'cell_alt_start'      => '<td>',
	'cell_alt_end'        => '</td>',

	'table_close'         => '</table>'
	);

$this->table->set_template($tmpl); 
$this->table->set_heading('Username','Jabatan');
$this->table->add_row($content['username'],$content['role_name']);

echo $this->table->generate();
}
?>

</fieldset>


</div>
</div>
</body>
</html>
