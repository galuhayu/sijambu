<?php
/**
*  class bulan_controller
*
* class yang digunakan sebagai controller yang mengatur laporan penjualan bulanan
*
*/
class Bulan_controller extends Controller {

	function Bulan_controller()
	{
		parent::Controller();	
		$this->load->library('input');
		$this->load->model('laporan_model');
	}
	/**
	*
	*	fungsi index 
	*	adalah fungsi default yang dipanggil oleh bulan_controller melakukan load header footer serta view laporan/bulanan.php 
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
		
		$this->load->view('admin/header.php',$h_data);
		$this->load->view('laporan/bulanan.php',$m_data);
		$this->load->view('admin/footer.php',$f_data);
	}
	
	/**
	*
	*	fungsi Search
	*	adalah fungsi yang digunakan untuk mencari laporan bulanan
	*	@param void
	*	@return void
	*/
	function search(){
		$m_data['notification_message']="";
		$m_data['content'] = "";
		$total = 0;
		
		//melakukan validasi input 
		$this->form_validation->set_rules('field','Field','required');
		if ($this->form_validation->run()==FALSE){
			$m_data['notification_message']="Masukan Field untuk mencari";
		}
		else{
			//mengambil variable post
			$field=$this->input->get_post('field');
			if ($field<10) $field='0'.$field;
			
			//memanggil fungsi mencari laporan berdasarkan bulan untuk mendapatkan hasil laporan transaksi yang terjadi dalam suatu bulan
			$data = $this->laporan_model->search_by_bulan($field);
			$id = 0;
			if ($data !=0 ){
				foreach ($data as $transactiondata) :
					$temp[$id] = $transactiondata;
					//menghitung total transaksi untuk setiap transaksi  beserta denda yang ada
					$total += $transactiondata['harga'] + $transactiondata['denda'];
					$id++;
				endforeach;
				$m_data['content'] = $temp;
				$m_data['total'] = $total;
			}
			else{
				$m_data['notification_message']="Transaksi tidak ditemukan untuk bulan $field";
			}
		}
		
		$h_data['style']="simpel-herbal.css";
		$f_data['author']="fasilkom 07";
		$this->load->view('admin/header.php',$h_data);
		$this->load->view('laporan/bulanan.php',$m_data);
		$this->load->view('admin/footer.php',$f_data);
	}
	
}

/* End of file welcome.php */
/* Location: ./system/application/controllers/welcome.php */
?>