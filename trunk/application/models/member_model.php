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
	
	function create_member($namamember,$telepon,$alamat,$tempatlahir,$tgllahir,$jeniskelamin){
		$query = $this->db->query("INSERT INTO member (namamember,jeniskelamin,telepon,alamat,tempatlahir,tgllahir) VALUES ('$namamember', '$jeniskelamin', '$telepon', '$alamat', '$tempatlahir', '$tgllahir')");
		$query = $this->db->query("SELECT idmember FROM member WHERE namamember='$namamember' AND telepon='$telepon' ");
		return $query->result_array();
	}
	
	function search_member_by_id ($field){
		$query = $this->db->query("SELECT * FROM member WHERE idmember='$field'");
		if ($query->num_rows() !=0 ) {
			return $query->result_array();
		}
		return 0;
	}
	
	function search_member_by_judul ($field){
		$query = $this->db->query("SELECT * FROM member WHERE namamember='$field'");
		if ($query->num_rows() !=0 ) {
			return $query->result_array();
		}
		return 0;
	}
}