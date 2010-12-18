<?php
/**
*  class buku_controller
*
* class yang digunakan sebagai controller yang mengatur laporan buku yang paling sering dipinjam
*
*/
class Buku_controller extends Controller {

	function Buku_controller()
	{
		parent::Controller();	
		$this->load->library('input');
		$this->load->model('laporan_model');
	}
	/**
	*
	*	fungsi index 
	*	adalah fungsi default yang dipanggil oleh buku_controller melakukan load header footer serta view laporan/buku.php
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
		//memanggil fungsi list buku pada laporan model untuk mendapatkan list buku yang ada di toko buku
		$data = $this->laporan_model->list_buku();
		$id=0;
		if ($data !=0 ){
			foreach ($data as $bookdata) :
				$temp[$id] = $bookdata;
				$id++;
			endforeach;
			$m_data['content'] = $temp;
		}
		else{
			$m_data['notification_message']="Buku tidak ditemukan";
		}
		
		$this->load->view('admin/header.php',$h_data);
		$this->load->view('laporan/buku.php',$m_data);
		$this->load->view('admin/footer.php',$f_data);
	}
	
}

/* End of file welcome.php */
/* Location: ./system/application/controllers/welcome.php */
?>