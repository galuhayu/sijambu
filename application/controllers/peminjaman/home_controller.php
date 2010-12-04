<?php

class Home_controller extends Controller {

	function Home_controller()
	{
		parent::Controller();	
		$this->load->library('input');
		$this->load->model('peminjaman_model');
	}
	
	function index()
	{
		$this->session->set_userdata('current_menu','PEMINJAMAN');
		$h_data['style']="simpel-herbal.css";
		$m_data['content'] = "";
		$m_data['notification_message'] = "";
		$f_data['author']="ade";
		
		$this->load->view('admin/header.php',$h_data);
		$this->load->view('peminjaman/home.php',$m_data);
		$this->load->view('admin/footer.php',$f_data);
	}
}

/* End of file welcome.php */
/* Location: ./system/application/controllers/welcome.php */
?>