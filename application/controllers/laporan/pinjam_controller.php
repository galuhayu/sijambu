<?php
/**
*  class pinjam_controller
*
* class yang digunakan sebagai controller yang mengatur buku yang belum dikembalikan
*
*/
class Pinjam_controller extends Controller {

	function Pinjam_controller()
	{
		parent::Controller();	
		$this->load->library('input');
		$this->load->model('laporan_model');
	}
	/**
	*
	*	fungsi index 
	*	adalah fungsi default yang dipanggil oleh pinjam_controller melakukan load header footer serta view laporan/pinjam.php
	*	@param void
	*	@return void
	*/
	function index()
	{
		//set session current menu to give mark in the active menu
		$this->session->set_userdata('current_menu','LAPORAN');
		$h_data['style']="simpel-herbal.css";
		$m_data['notification_message']="";
		$m_data['content']="";
		$f_data['author']="fasilkom 07";
		
		//memanggil fungsi list_pinjam pada laporan_model untuk mendapatkan list pinjaman buku yang belum dikembalikan oleh pelanggan
		$data = $this->laporan_model->list_pinjam();
		$id=0;
		date_default_timezone_set("UTC");
		$now = time();

		if ($data !=0 ){
		
			foreach ($data as $pinjamdata) :
				//melakukan perhitungan lama telat untuk mengetahui lama pinjaman
				$q = strtotime($pinjamdata['tglpinjam']);
				$telat = floor (($now - $q) / (24 * 60 * 60));
				$pinjamdata['telat'] = $telat;
				$temp[$id] = $pinjamdata;
				$id++;
			endforeach;
			$m_data['content'] = $temp;
		}
		else{
			$m_data['notification_message']="Pinjaman tidak ditemukan";
		}
		
		$this->load->view('admin/header.php',$h_data);
		$this->load->view('laporan/pinjam.php',$m_data);
		$this->load->view('admin/footer.php',$f_data);
	}
	
}

/* End of file welcome.php */
/* Location: ./system/application/controllers/welcome.php */
?>