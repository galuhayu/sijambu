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
		$m_data['content'] = "";
		$f_data['author']="fasilkom 07";
		$this->load->view('admin/header.php',$h_data);
		$this->load->view('account/update.php',$m_data);
		$this->load->view('admin/footer.php',$f_data);
	}
	
	function updateAccount(){
		$m_data['notification_message']="";
		$m_data['content'] = "";
		
			$username=$this->input->get_post('username');
			$role_name=$this->input->get_post('jabatan');
			$nama = $this->input->get_post('name');
			$alamat = $this->input->get_post('address');
			$telp= $this->input->get_post('telp');
			$this->account_model->update_account($username,$role_name, $nama, $alamat, $telp);
			$m_data['notification_message']="Account berhasil diubah";
				
		$h_data['style']="simpel-herbal.css";
		$f_data['author']="fasilkom 07";
		$this->load->view('admin/header.php',$h_data);
		$this->load->view('account/update.php',$m_data);
		$this->load->view('admin/footer.php',$f_data);
		
	}
	
	//COPY FROM SEARCH CONTROLLER
	function searchAccount(){
		$m_data['notification_message']="";
		$m_data['content'] = "";
		
		$this->form_validation->set_rules('username','Username','required');
		if ($this->form_validation->run()==FALSE){
			$m_data['notification_message']="Masukan username untuk mencari";
		}
		else{
			$username=$this->input->get_post('username');
			$data = $this->account_model->search_account($username);
			if ($data !=0 ){
				foreach ($data as $userdata) :
					$m_data['content'] = $userdata;
				endforeach;
			}
			else{
				$m_data['notification_message']="Account tidak ditemukan";
			}
		}
		$h_data['style']="simpel-herbal.css";
		$f_data['author']="ade";
		$this->load->view('admin/header.php',$h_data);
		$this->load->view('account/update.php',$m_data);
		$this->load->view('admin/footer.php',$f_data);
	}
}

/* End of file welcome.php */
/* Location: ./system/application/controllers/welcome.php */
?>