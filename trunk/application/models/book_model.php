<?php
class Book_model extends Model
{
	function Book_model() {
		parent::Model();
	}
	
	function list_buku(){
		$query = $this->db->query("SELECT * FROM buku WHERE flag = 0");
		if ($query->num_rows() !=0 ) {
			return $query->result_array();
		}
		return 0;
	}
	
	function create_buku ($namabuku,$pengarang,$hargasewa,$lama){
		$query = $this->db->query("INSERT INTO buku (namabuku,pengarang,hargasewa,lama) VALUES ('$namabuku', '$pengarang', '$hargasewa', '$lama')");
		$query = $this->db->query("SELECT idbuku FROM buku WHERE namabuku='$namabuku' ");
		return $query->result_array();
	}
	
	function search_buku_by_id ($field){
		$query = $this->db->query("SELECT * FROM buku WHERE idbuku LIKE '%$field%'");
		if ($query->num_rows() !=0 ) {
			return $query->result_array();
		}
		return 0;
	}
	
	function search_buku_by_judul ($field){
		$query = $this->db->query("SELECT * FROM buku WHERE namabuku LIKE '%$field%'");
		if ($query->num_rows() !=0 ) {
			return $query->result_array();
		}
		return 0;
	}
	
	function update_buku ($idbuku, $namabuku,$pengarang, $hargasewa,$lama){
		$query=$this->db->query("UPDATE buku SET namabuku='$namabuku', pengarang='$pengarang', hargasewa=$hargasewa, lama=$lama WHERE idbuku=$idbuku");
	}
	
	function search_buku_by_id_update ($field){
		$query = $this->db->query("SELECT * FROM buku WHERE idbuku= '$field'");
		if ($query->num_rows() !=0 ) {
			return $query->result_array();
		}
		return 0;
	}

	function delete_buku($idbuku){
		$query = $this->db->query("SELECT * FROM buku WHERE idbuku= $idbuku");
		if ($query->num_rows()!=0)
			$this->db->query("UPDATE buku SET flag = 1 WHERE idbuku = $idbuku");
		else 
			return 0;
		return 1;
	}
	
}