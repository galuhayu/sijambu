<?php
/**
*  class hari_controller
*
* class yang digunakan sebagai controller yang mengatur laporan penjualan harian
*
*/
class Hari_controller extends Controller {

	function Hari_controller()
	{
		parent::Controller();	
		$this->load->library('input');
		$this->load->model('laporan_model');
	}
	/**
	*
	*	fungsi index 
	*	adalah fungsi default yang dipanggil oleh hari_controller melakukan load header footer serta view laporan/hari.php
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
		$this->load->view('laporan/hari.php',$m_data);
		$this->load->view('admin/footer.php',$f_data);
	}
	
	/**
	*
	*	fungsi Search
	*	adalah fungsi yang digunakan untuk mencari laporan harian
	*	@param void
	*	@return void
	*/
	function search(){
		$m_data['notification_message']="";
		$m_data['content'] = "";
		$total = 0;
		
		//melakukan validasi input 
		$this->form_validation->set_rules('field1','Field1','required|date');
		$this->form_validation->set_rules('field2','Field2','required|date');
		if ($this->form_validation->run()==FALSE){
			$m_data['notification_message']="Masukan tidak valid";
		}
		else{
			//mengambil variable post
			$start=$this->input->get_post('field1');
			$end=$this->input->get_post('field2');
			
			//memanggil fungsi mencari laporan perhari untuk mendapatkan hasil laporan transaksi yang terjadi dalam kurun waktu tertentu
			$data = $this->laporan_model->search_by_hari($start,$end);
			$id = 0;
			if ($data !=0 ){
				foreach ($data as $transactiondata) :
					$temp[$id] = $transactiondata;
					
					//menghitung total transaksi untuk setiap transaksi beserta denda
					$total += $transactiondata['harga'] + $transactiondata['denda'];
					$id++;
				endforeach;
				$m_data['content'] = $temp;
				$m_data['total'] = $total;
			}
			else{
				$m_data['notification_message']="Transaksi tidak ditemukan dalam interval waktu tersebut";
			}
		}
		
		$h_data['style']="simpel-herbal.css";
		$f_data['author']="fasilkom 07";
		$this->load->view('admin/header.php',$h_data);
		$this->load->view('laporan/hari.php',$m_data);
		$this->load->view('admin/footer.php',$f_data);
	}
	
}

/* End of file welcome.php */
/* Location: ./system/application/controllers/welcome.php */
?>