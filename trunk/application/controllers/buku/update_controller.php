<?php

class Update_controller extends Controller {

	function Update_controller()
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
		$m_data['content'] = "";
		$f_data['author']="ade";
		$this->load->view('admin/header.php',$h_data);
		$this->load->view('buku/update.php',$m_data);
		$this->load->view('admin/footer.php',$f_data);
	}
	
	function updateBuku(){
		$m_data['notification_message']="";
		$m_data['content'] = "";
		
			$idbuku=$this->input->get_post('idbuku');
			$namabuku=$this->input->get_post('namabuku');
			$pengarang=$this->input->get_post('pengarang');
			$hargasewa=$this->input->get_post('hargasewa');
			$lama=$this->input->get_post('lama');
			$this->book_model->update_buku($idbuku,$namabuku,$pengarang,$hargasewa,$lama);
			$m_data['notification_message']="Account successfully updated";
			
		$h_data['style']="simpel-herbal.css";
		$f_data['author']="ade";
		$this->load->view('admin/header.php',$h_data);
		$this->load->view('buku/update.php',$m_data);
		$this->load->view('admin/footer.php',$f_data);
		
	}
	
	//COPY FROM SEARCH CONTROLLER
	function searchBuku(){
		$m_data['notification_message']="";
		$m_data['content'] = "";
		
		$this->form_validation->set_rules('idbuku','idbuku','required');
		if ($this->form_validation->run()==FALSE){
			$m_data['notification_message']="Enter ID buku To Search";
		}
		else{
			
			$idbuku=$this->input->get_post('idbuku');
			$data = $this->book_model->search_buku_by_id_update($idbuku);
			if ($data !=0 ){
				foreach ($data as $userdata) :
					$m_data['content'] = $userdata;
				endforeach;
			}
			else{
				$m_data['notification_message']="Book Not Found";
			}
		}
		$h_data['style']="simpel-herbal.css";
		$f_data['author']="ade";
		$this->load->view('admin/header.php',$h_data);
		$this->load->view('buku/update.php',$m_data);
		$this->load->view('admin/footer.php',$f_data);
	}
}

/* End of file welcome.php */
/* Location: ./system/application/controllers/welcome.php */
?>