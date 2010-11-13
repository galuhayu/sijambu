<?php

class Home_controller extends Controller {

	function Home_controller()
	{
		parent::Controller();	
	}
	
	function index()
	{
		$this->session->set_userdata('current_menu','HOME');
		$h_data['style']="simpel-herbal.css";
		$m_data['notification_message'] = "";//$notification_message;
		$f_data['author']="ade";
		$this->load->view('admin/header.php',$h_data);
		$this->load->view('home_view',$m_data);
		$this->load->view('admin/footer.php',$f_data);
	}
}

/* End of file welcome.php */
/* Location: ./system/application/controllers/welcome.php */
?>