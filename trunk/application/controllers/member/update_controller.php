<?php

class Update_controller extends Controller {

	function Update_controller()
	{
		parent::Controller();	
		$this->load->library('input');
		$this->load->model('member_model');
	}
	
	function index()
	{
		$this->session->set_userdata('current_menu','MEMBER');
		$h_data['style']="simpel-herbal.css";
		$m_data['notification_message']="";
		$m_data['content'] = "";
		$f_data['author']="ade";
		$this->load->view('admin/header.php',$h_data);
		$this->load->view('member/update.php',$m_data);
		$this->load->view('admin/footer.php',$f_data);
	}
	
	function updateAccount(){
		$m_data['notification_message']="";
		$m_data['content'] = "";
		
			
		$h_data['style']="simpel-herbal.css";
		$f_data['author']="ade";
		$this->load->view('admin/header.php',$h_data);
		$this->load->view('member/update.php',$m_data);
		$this->load->view('admin/footer.php',$f_data);
		
	}
	
	//COPY FROM SEARCH CONTROLLER
	function searchAccount(){
		$m_data['notification_message']="";
		$m_data['content'] = "";
		
		$this->form_validation->set_rules('username','Username','required');
		if ($this->form_validation->run()==FALSE){
			$m_data['notification_message']="Enter Username To Search";
		}
		else{
			
		}
		$h_data['style']="simpel-herbal.css";
		$f_data['author']="ade";
		$this->load->view('admin/header.php',$h_data);
		$this->load->view('member/update.php',$m_data);
		$this->load->view('admin/footer.php',$f_data);
	}
}

/* End of file welcome.php */
/* Location: ./system/application/controllers/welcome.php */
?>