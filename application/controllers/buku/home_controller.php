<?php

/**
*	class home_controller
*
*	class yang digunakan untuk mengatur navigasi utama pada menu buku
*
*/
class Home_controller extends Controller {

	/**
	*
	*	Constructor
	*
	*	mendefinisikan home_controller
	*	meload library input serta model book_model
	*/
	function Home_controller()
	{
		parent::Controller();	
		$this->load->library('input');
		$this->load->model('book_model');
	}
	
	
	/**
	*
	*	fungsi index 
	*	adalah fungsi default yang dipanggil oleh home_controller melakukan load header footer serta view buku/home.php
	*	@param void
	*	@return void
	*/
	function index()
	{
		//menyimpan session untuk mengetahui active menu 
		$this->session->set_userdata('current_menu','BUKU');
		$h_data['style']="simpel-herbal.css";
		$m_data['notification_message']="";
		$m_data['content']="";
		$f_data['author']="fasilkom 07";
		
		//load semua buku yang ada dari book_model
		$data = $this->book_model->list_buku();
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
		$this->load->view('buku/home.php',$m_data);
		$this->load->view('admin/footer.php',$f_data);
	}
	
}

/* End of file welcome.php */
/* Location: ./system/application/controllers/welcome.php */
?>