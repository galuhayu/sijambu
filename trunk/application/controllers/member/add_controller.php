<?php

class Add_controller extends Controller {

	function Add_controller()
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
		$this->load->view('member/add.php',$m_data);
		$this->load->view('admin/footer.php',$f_data);
	}
	
	function addMember(){
		$this->form_validation->set_rules('namamember','Nama Member','required');
		$this->form_validation->set_rules('telepon','Telepon','required');
		$this->form_validation->set_rules('alamat','Alamat','required');
		
		if ($this->form_validation->run()==FALSE){
			$m_data['notification_message']="Input Invalid";
		}
		else{
			$namamember = $this->input->get_post('namamember');
			$telepon = $this->input->get_post('telepon');
			$alamat = $this->input->get_post('alamat');
			$tempatlahir = $this->input->get_post('tempatlahir');
			$tgllahir = $this->input->get_post('tgllahir');
			$jeniskelamin = $this->input->get_post('jeniskelamin');
			if ($jeniskelamin == 'male'){
				$jeniskelamin = 1;
			}
			else {
				$jeniskelamin = 2;
			}
			
			$temp = $this->member_model->create_member($namamember,$telepon,$alamat,$tempatlahir,$tgllahir,$jeniskelamin);
			$id = $temp[0]['idmember'];
			$m_data['notification_message']="Member successfully created with id = ".$id;
		}			
		$h_data['style']="simpel-herbal.css";
		$f_data['author']="ade";
		$this->load->view('admin/header.php',$h_data);
		$this->load->view('member/add.php',$m_data);
		$this->load->view('admin/footer.php',$f_data);
	}
}

/* End of file welcome.php */
/* Location: ./system/application/controllers/welcome.php */
?>