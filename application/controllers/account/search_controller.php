<?php

class Search_controller extends Controller {

	function Search_controller()
	{
		parent::Controller();	
		$this->load->library('input');
		$this->load->model('account_model');
	}
	
	function index()
	{
		$this->session->set_userdata('current_menu','ACCOUNT');
		$h_data['style']="simpel-herbal.css";
		$m_data['notification_message'] = "";
		$m_data['content'] = "";
		$f_data['author']="fasilkom 07";
		$this->load->view('admin/header.php',$h_data);
		$this->load->view('account/search.php',$m_data);
		$this->load->view('admin/footer.php',$f_data);
	}
	
	function searchAccount(){
		$m_data['notification_message']="";
		$m_data['content'] = "";
		
		$this->form_validation->set_rules('username','Username','required');
		if ($this->form_validation->run()==FALSE){
			$m_data['notification_message']="Masukkan Username untuk mencari";
		}
		else{
			$username=$this->input->get_post('username');
			$data = $this->account_model->search_account($username);
			$id = 0;
			if ($data !=0 ){
				$id++;
				foreach ($data as $userdata) :
					$temp[$id] = $userdata;
					$id++;
				endforeach;
				$m_data['content'] = $temp;
			}
			else{
				$m_data['notification_message']="Account tidak ditemukan";
			}
		}
		$h_data['style']="simpel-herbal.css";
		$f_data['author']="fasilkom 07";
		$this->load->view('admin/header.php',$h_data);
		$this->load->view('account/search.php',$m_data);
		$this->load->view('admin/footer.php',$f_data);
	}
}

/* End of file welcome.php */
/* Location: ./system/application/controllers/welcome.php */
?>