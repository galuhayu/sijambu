<?php
class Member_model extends Model
{
	function Member_model() {
		parent::Model();
	}
	
	function list_member(){
		$query = $this->db->query("SELECT * FROM member WHERE statusmember = 0");
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
		$query = $this->db->query("SELECT * FROM member WHERE idmember LIKE '%$field%' AND statusmember=0");
		if ($query->num_rows() !=0 ) {
			return $query->result_array();
		}
		return 0;
	}
	
	function search_member_by_judul ($field){
		$query = $this->db->query("SELECT * FROM member WHERE namamember LIKE '%$field%' AND statusmember=0");
		if ($query->num_rows() !=0 ) {
			return $query->result_array();
		}
		return 0;
	}
	
	function delete_member($idmember){
		$query = $this->db->query("SELECT * FROM member WHERE idmember= $idmember");
		if ($query->num_rows()!=0)
			$this->db->query("UPDATE member SET statusmember = 1 WHERE idmember = $idmember AND statusmember=0");
		else 
			return 0;
		return 1;
	}
	
	
	function search_member_by_id_update ($field){
		$query = $this->db->query("SELECT * FROM member WHERE idmember= '$field' AND statusmember=0");
		if ($query->num_rows() !=0 ) {
			return $query->result_array();
		}
		return 0;
	}
	
	
	function update_member ($idmember, $namamember,$jeniskelamin, $telepon,$alamat,$tempatlahir,$tgllahir){
		$query=$this->db->query("UPDATE member SET namamember='$namamember', jeniskelamin=$jeniskelamin, telepon='$telepon', alamat='$alamat', tempatlahir='$tempatlahir', tgllahir='$tgllahir' WHERE idmember=$idmember AND statusmember=0");
	}
}