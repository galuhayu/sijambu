<?php

class Search_controller extends Controller {

	function Search_controller()
	{
		parent::Controller();	
		$this->load->library('input');
		$this->load->model('book_model');
	}
	
	function index()
	{
		$this->session->set_userdata('current_menu','BUKU');
		$h_data['style']="simpel-herbal.css";
		$m_data['notification_message'] = "";
		$m_data['content'] = "";
		$f_data['author']="ade";
		$this->load->view('admin/header.php',$h_data);
		$this->load->view('buku/search.php',$m_data);
		$this->load->view('admin/footer.php',$f_data);
	}
	
	function searchAccount(){
		$m_data['notification_message']="";
		$m_data['content'] = "";
		
		
		$h_data['style']="simpel-herbal.css";
		$f_data['author']="ade";
		$this->load->view('admin/header.php',$h_data);
		$this->load->view('buku/search.php',$m_data);
		$this->load->view('admin/footer.php',$f_data);
	}
}

/* End of file welcome.php */
/* Location: ./system/application/controllers/welcome.php */
?>