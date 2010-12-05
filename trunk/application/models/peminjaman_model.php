<?php
class Peminjaman_model extends Model
{
	function Peminjaman_model() {
		parent::Model();
	}
	
	function validate_id($idmember){
		$data = $this->db->query(" SELECT * FROM member WHERE idmember=$idmember ");
		return $data->num_rows();
	}
	
	function add_line($idbuku){
		$data = $this->db->query(" SELECT idbuku,namabuku,pengarang,hargasewa,lama FROM buku WHERE idbuku = $idbuku AND status = 1");
		if ($data->num_rows!=0){
			return $data->result_array();
		}
		else{
			return 0;
		}		
	}
	
	function save_line_transaction($idmember,$idbuku,$tipe,$tglpinjam,$tglkembali,$harga){
		$data=$this->db->query("INSERT INTO transaksi (idmember,idbuku,tipepinjam,tglpinjam,tglkembali,harga)VALUES ($idmember,$idbuku,$tipe,'$tglpinjam','$tglkembali',$harga)");
		$data = $this->db->query("UPDATE buku SET status = 0 WHERE idbuku = $idbuku");
	}
	
}