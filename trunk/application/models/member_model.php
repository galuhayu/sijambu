<?php
class Member_model extends Model
{
	function Member_model() {
		parent::Model();
	}
	
	function list_member(){
		$query = $this->db->query("SELECT * FROM member");
		if ($query->num_rows() !=0 ) {
			return $query->result_array();
		}
		return 0;
	}
}