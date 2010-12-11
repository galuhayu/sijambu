<?php

class Search_controller extends Controller {

	function Search_controller()
	{
		parent::Controller();	
		$this->load->library('input');
		$this->load->model('member_model');
	}
	
	function index()
	{
		$this->session->set_userdata('current_menu','MEMBER');
		$h_data['style']="simpel-herbal.css";
		$m_data['notification_message'] = "";
		$m_data['content'] = "";
		$f_data['author']="ade";
		$this->load->view('admin/header.php',$h_data);
		$this->load->view('member/search.php',$m_data);
		$this->load->view('admin/footer.php',$f_data);
	}
	
	function searchMember(){
		$m_data['notification_message']="";
		$m_data['content'] = "";
		
		$this->form_validation->set_rules('field','Field','required');
		if ($this->form_validation->run()==FALSE){
			$m_data['notification_message']="Masukan Field untuk mencari";
		}
		else{
			$field=$this->input->get_post('field');
			$tipe=$this->input->get_post('tipe');
			if ($tipe == 'id'){
				$data = $this->member_model->search_member_by_id($field);
			}else{
				$data = $this->member_model->search_member_by_judul($field);
			}
			$id = 0;
			if ($data !=0 ){
				foreach ($data as $memberdata) :
					$temp[$id] = $memberdata;
					$id++;
				endforeach;
				$m_data['content'] = $temp;
			}
			else{
				$m_data['notification_message']="Member tidak ditemukan";
			}
		}
		
		$h_data['style']="simpel-herbal.css";
		$f_data['author']="ade";
		$this->load->view('admin/header.php',$h_data);
		$this->load->view('member/search.php',$m_data);
		$this->load->view('admin/footer.php',$f_data);
	}
}

/* End of file welcome.php */
/* Location: ./system/application/controllers/welcome.php */
?>