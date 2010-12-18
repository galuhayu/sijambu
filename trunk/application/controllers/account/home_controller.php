<?php

/**
*	class home_controller
*
*	class yang digunakan untuk mengatur navigasi utama pada menu account
*
*/
class Home_controller extends Controller {


	/**
	*
	*	Constructor
	*
	*	mendefinisikan home_controller
	*	meload library input serta model account_model
	*/
	function Home_controller()
	{
		parent::Controller();	
		$this->load->library('input');
		$this->load->model('account_model');
	}
	
	/**
	*
	*	fungsi index 
	*	adalah fungsi default yang dipanggil oleh home_controller melakukan load header footer serta view account/home.php
	*	@param void
	*	@return void
	*/
	function index()
	{
		//menyimpan session untuk mengetahui active menu 
		$this->session->set_userdata('current_menu','ACCOUNT');
		$h_data['style']="simpel-herbal.css";
		$m_data['notification_message']="";
		$m_data['content']="";
		$f_data['author']="fasilkom 07";
		
		//load semua account yang ada dari account_model
		$data = $this->account_model->list_account();
		$id=0;
		
		//untuk setiap elemen hasil disimpan di variable temp dan kemudian dipass ke variable $m_data['content']
		if ($data !=0 ){
			foreach ($data as $userdata) :
				$temp[$id] = $userdata;
				$id++;
			endforeach;
			$m_data['content'] = $temp;
		}
		else{
			$m_data['notification_message']="Account Tidak ditemukan";
		}
		
		$this->load->view('admin/header.php',$h_data);
		$this->load->view('account/home.php',$m_data);
		$this->load->view('admin/footer.php',$f_data);
	}
	
}

/* End of file welcome.php */
/* Location: ./system/application/controllers/welcome.php */
?>