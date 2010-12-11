<?php
class Laporan_model extends Model
{
	function Laporan_model() {
		parent::Model();
	}
	
	function list_member(){
		$query = $this->db->query("SELECT * FROM member WHERE statusmember = 0 ORDER BY jumpinjam DESC");
		if ($query->num_rows() !=0 ) {
			return $query->result_array();
		}
		return 0;
	}
	function list_buku(){
		$query = $this->db->query("SELECT * FROM buku WHERE flag = 0 ORDER BY jumpinjam DESC");
		if ($query->num_rows() !=0 ) {
			return $query->result_array();
		}
		return 0;
	}
	function list_pinjam(){
		$query = $this->db->query("SELECT member.namamember, buku.namabuku, transaksi.tglpinjam, transaksi.tglkembali, buku.hargasewa, buku.lama, member.telepon FROM transaksi,member,buku WHERE transaksi.idmember=member.idmember AND transaksi.idbuku=buku.idbuku AND islunas = 0 ORDER BY transaksi.tglpinjam ASC");
		if ($query->num_rows() !=0 ) {
			return $query->result_array();
		}
		return 0;
	}
	
	function search_by_bulan($month){
		$query = $this->db->query("SELECT member.namamember, buku.namabuku, transaksi.harga, transaksi.denda FROM transaksi,buku,member WHERE transaksi.tglpinjam LIKE '%-$month-%' AND member.idmember= transaksi.idmember AND buku.idbuku = transaksi.idbuku");
		if ($query->num_rows() !=0 ) {
			return $query->result_array();
		}
		return 0;
	}
	
	function search_by_hari($start,$end){
		$query = $this->db->query("SELECT member.namamember, buku.namabuku, transaksi.harga, transaksi.denda FROM transaksi,buku,member WHERE transaksi.tglpinjam>= '$start' AND transaksi.tglpinjam <='$end' AND member.idmember= transaksi.idmember AND buku.idbuku = transaksi.idbuku");
		if ($query->num_rows() !=0 ) {
			return $query->result_array();
		}
		return 0;
	}
}