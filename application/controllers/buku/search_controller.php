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
	
	function searchBuku(){
		$m_data['notification_message']="";
		$m_data['content'] = "";
		
		$this->form_validation->set_rules('field','Field','required');
		if ($this->form_validation->run()==FALSE){
			$m_data['notification_message']="Masukan Field untuk mencari ";
		}
		else{
			$field=$this->input->get_post('field');
			$tipe=$this->input->get_post('tipe');
			if ($tipe == 'id'){
				$data = $this->book_model->search_buku_by_id($field);
			}else{
				$data = $this->book_model->search_buku_by_judul($field);
			}
			$id = 0;
			if ($data !=0 ){
				foreach ($data as $bookdata) :
					$temp[$id] = $bookdata;
					$id++;
				endforeach;
				$m_data['content'] = $temp;
			}
			else{
				$m_data['notification_message']="Buku tidak ditemukan";
			}
		}
		
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