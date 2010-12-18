<?php
class Pengembalian_model extends Model
{
	function Pengembalian_model() {
		parent::Model();
	}
	
	function validate_id($idmember){
		$data = $this->db->query(" SELECT * FROM member WHERE idmember=$idmember AND statusmember=0");
		return $data->num_rows();
	}
	
	function get_list($idmember){
		$data = $this->db->query(" SELECT transaksi.idbuku,namabuku,pengarang,hargasewa,tglpinjam,lama,buku.status FROM transaksi, buku WHERE idmember=$idmember AND islunas = 0 AND  buku.idbuku = transaksi.idbuku");
		if ($data->num_rows()!=0){
			return $data->result_array();
		}
		else{
			return 0;
		}
	}
	
	function save_line_transaction($idmember,$idbuku,$denda, $tglkembali){
		$data = $this->db->query (" UPDATE transaksi SET islunas = 1 , denda = $denda , tglkembali = '$tglkembali' WHERE idbuku = $idbuku AND idmember = $idmember AND islunas = 0" );
		$data = $this->db->query("UPDATE buku SET status = 1 WHERE idbuku = $idbuku");
	}
}