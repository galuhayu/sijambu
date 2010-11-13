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
<fieldset>
<legend>Account Information</legend> 
	
<table id="form">
	<tr>
	<td>Username</td><td>: </td>
	</tr>
	<tr>
	<td>Password</td><td>: </td>
	</tr>
	<tr>
	<td>Nama</td><td>: </td>
	</tr>
	<tr>
	<td>Alamat</td><td>: </td>
	</tr>
	<tr>
	<td>Jabatan</td><td>: </td>
	</tr>
	<tr>
	<td>No telp</td><td>: </td>
	</tr>
	
</table>

</div>

</fieldset>
</div>
</div>
</body>
</html>
