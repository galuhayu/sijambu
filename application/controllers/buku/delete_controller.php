<?php

class Delete_controller extends Controller {

	function Delete_controller()
	{
		parent::Controller();	
		$this->load->library('input');
		$this->load->model('book_model');
	}
	
	function index()
	{
		$this->session->set_userdata('current_menu','BUKU');
		$h_data['style']="simpel-herbal.css";
		$m_data['notification_message']="";
		$f_data['author']="ade";
		$this->load->view('admin/header.php',$h_data);
		$this->load->view('buku/delete.php',$m_data);
		$this->load->view('admin/footer.php',$f_data);
	}
	
	function deleteAccount(){
	
		$this->form_validation->set_rules('idbuku','Id Buku','required');
		
		if ($this->form_validation->run()==FALSE){
			$m_data['notification_message']="Input Invalid";
		}
		else{
			$idbuku=$this->input->get_post('idbuku');
			$status = $this->book_model->delete_buku($idbuku);
			if ($status != 0 ){
				$m_data['notification_message']="Book successfully deleted";
			}
			else{
				$m_data['notification_message']="Book Not Found";
			}
		}		
		$h_data['style']="simpel-herbal.css";
		$f_data['author']="ade";
		$this->load->view('admin/header.php',$h_data);
		$this->load->view('buku/delete.php',$m_data);
		$this->load->view('admin/footer.php',$f_data);
	}
}

/* End of file welcome.php */
/* Location: ./system/application/controllers/welcome.php */
?>