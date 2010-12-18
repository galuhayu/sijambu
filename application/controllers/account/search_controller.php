<?php
/**
*  class search_controller
*
* class yang digunakan sebagai controller yang mengatur pencarian account
*
*/
class Search_controller extends Controller {

	/**
	*
	*	Constructor 
	*	mendefinisikan search controller
	*	melakukan load library input dan model account_model
	*
	*/
	function Search_controller()
	{
		parent::Controller();	
		$this->load->library('input');
		$this->load->model('account_model');
	}
	
	/**
	*
	*	fungsi index 
	*	adalah fungsi default yang dipanggil oleh search_controller melakukan load header footer serta view account/search.php
	*	@param void
	*	@return void
	*/
	function index()
	{
		//menyimpan session agar menu yang active dapat diketahui
		$this->session->set_userdata('current_menu','ACCOUNT');
		$h_data['style']="simpel-herbal.css";
		$m_data['notification_message'] = "";
		$m_data['content'] = "";
		$f_data['author']="fasilkom 07";
		$this->load->view('admin/header.php',$h_data);
		$this->load->view('account/search.php',$m_data);
		$this->load->view('admin/footer.php',$f_data);
	}
	
	/**
	*
	*	fungsi searchAccount 
	*	adalah fungsi yang digunakan untuk mencari account berdasarkan username yang telah diberikan
	*	@param void
	*	@return void
	*/
	function searchAccount(){
		$m_data['notification_message']="";
		$m_data['content'] = "";
		
		//melakukan validasi input username agar harus terisi dan berformat alfanumerik
		$this->form_validation->set_rules('username','Username','required|alpha_numeric');
		if ($this->form_validation->run()==FALSE){
			$m_data['notification_message']="Masukkan tidak valid";
		}
		else{
			//ambil semua variable post
			$username=$this->input->get_post('username');
			
			//memanggil fungsi search_account pada model account_model untuk mengetahui apakah account tersebut tersedia pada database
			$data = $this->account_model->search_account($username);
			
			//untuk setiap hasil account yang didapat masukkan ke dalam variable temp dan akan disimpan di $m_data['content']
			$id = 0;
			if ($data !=0 ){
				$id++;
				foreach ($data as $userdata) :
					$temp[$id] = $userdata;
					$id++;
				endforeach;
				$m_data['content'] = $temp;
			}
			else{
				$m_data['notification_message']="Account tidak ditemukan";
			}
		}
		$h_data['style']="simpel-herbal.css";
		$f_data['author']="fasilkom 07";
		$this->load->view('admin/header.php',$h_data);
		$this->load->view('account/search.php',$m_data);
		$this->load->view('admin/footer.php',$f_data);
	}
}

/* End of file welcome.php */
/* Location: ./system/application/controllers/welcome.php */
?>