<?php

class Update_controller extends Controller {

	function Update_controller()
	{
		parent::Controller();	
		$this->load->library('input');
		$this->load->model('account_model');
	}
	
	function index()
	{
		$this->session->set_userdata('current_menu','ACCOUNT');
		$h_data['style']="simpel-herbal.css";
		$m_data['notification_message']="";
		$f_data['author']="ade";
		$this->load->view('admin/header.php',$h_data);
		$this->load->view('account/update.php',$m_data);
		$this->load->view('admin/footer.php',$f_data);
	}
	
	function updateAccount(){
	//TODO update
		$this->form_validation->set_rules('username','Username','required');
		$this->form_validation->set_rules('password','Password','required');
		
		if ($this->form_validation->run()==FALSE){
			$m_data['notification_message']="Input Invalid";
		}
		else{
			$username=$this->input->get_post('username');
			$password=$this->input->get_post('password');
			$role_name=$this->input->get_post('jabatan');
			$this->account_model->create_account($username,SHA1($password),$role_name);
			$m_data['notification_message']="Account successfully created";
		}			
		$h_data['style']="simpel-herbal.css";
		$f_data['author']="ade";
		$this->load->view('admin/header.php',$h_data);
		$this->load->view('account/add.php',$m_data);
		$this->load->view('admin/footer.php',$f_data);
	}
}

/* End of file welcome.php */
/* Location: ./system/application/controllers/welcome.php */
?>