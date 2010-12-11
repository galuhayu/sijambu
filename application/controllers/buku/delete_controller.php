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
		$f_data['author']="fasilkom 07";
		$this->load->view('admin/header.php',$h_data);
		$this->load->view('buku/delete.php',$m_data);
		$this->load->view('admin/footer.php',$f_data);
	}
	
	function deleteAccount(){
	
		$this->form_validation->set_rules('idbuku','Id Buku','required');
		
		if ($this->form_validation->run()==FALSE){
			$m_data['notification_message']="Masukan tidak valid";
		}
		else{
			$idbuku=$this->input->get_post('idbuku');
			$status = $this->book_model->delete_buku($idbuku);
			if ($status != 0 ){
				$m_data['notification_message']="Buku berhasil dihapus";
			}
			else{
				$m_data['notification_message']="Buku tidak ditemukan";
			}
		}		
		$h_data['style']="simpel-herbal.css";
		$f_data['author']="fasilkom 07";
		$this->load->view('admin/header.php',$h_data);
		$this->load->view('buku/delete.php',$m_data);
		$this->load->view('admin/footer.php',$f_data);
	}
}

/* End of file welcome.php */
/* Location: ./system/application/controllers/welcome.php */
?>