<?php

class Delete_controller extends Controller {

	function Delete_controller()
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
		$f_data['author']="ade";
		$this->load->view('admin/header.php',$h_data);
		$this->load->view('member/delete.php',$m_data);
		$this->load->view('admin/footer.php',$f_data);
	}
	
	function deleteMember(){
	
		$this->form_validation->set_rules('idmember','Id Member','required');
		
		if ($this->form_validation->run()==FALSE){
			$m_data['notification_message']="Input Invalid";
		}
		else{
			$idmember=$this->input->get_post('idmember');
			$status = $this->member_model->delete_member($idmember);
			if ($status != 0 ){
				$m_data['notification_message']="Member successfully deleted";
			}
			else{
				$m_data['notification_message']="Member Not Found";
			}
		}		
		$h_data['style']="simpel-herbal.css";
		$f_data['author']="ade";
		$this->load->view('admin/header.php',$h_data);
		$this->load->view('member/delete.php',$m_data);
		$this->load->view('admin/footer.php',$f_data);
	}
}

/* End of file welcome.php */
/* Location: ./system/application/controllers/welcome.php */
?>