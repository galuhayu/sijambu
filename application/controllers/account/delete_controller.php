<?php

class Delete_controller extends Controller {

	function Delete_controller()
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
		$this->load->view('account/delete.php',$m_data);
		$this->load->view('admin/footer.php',$f_data);
	}
	
	function deleteAccount(){
	
		$this->form_validation->set_rules('username','Username','required');
		
		if ($this->form_validation->run()==FALSE){
			$m_data['notification_message']="Masukan tidak valid";
		}
		else{
			$username=$this->input->get_post('username');
			$status = $this->account_model->delete_account($username);
			if ($status != 0 ){
				$m_data['notification_message']="Account berhasil dihapus";
			}
			else{
				$m_data['notification_message']="Account tidak ditemukan";
			}
		}			
		$h_data['style']="simpel-herbal.css";
		$f_data['author']="ade";
		$this->load->view('admin/header.php',$h_data);
		$this->load->view('account/delete.php',$m_data);
		$this->load->view('admin/footer.php',$f_data);
	}
}

/* End of file welcome.php */
/* Location: ./system/application/controllers/welcome.php */
?>