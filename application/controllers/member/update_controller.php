<?php

class Update_controller extends Controller {

	function Update_controller()
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
		$m_data['content'] = "";
		$f_data['author']="ade";
		$this->load->view('admin/header.php',$h_data);
		$this->load->view('member/update.php',$m_data);
		$this->load->view('admin/footer.php',$f_data);
	}
	
	function updateMember(){
		$m_data['notification_message']="";
		$m_data['content'] = "";
		
			$idmember=$this->input->get_post('idmember');
			$namamember=$this->input->get_post('namamember');
			$jeniskelamin=$this->input->get_post('jeniskelamin');
			if ($jeniskelamin == 'male'){
				$jeniskelamin = 1;
			}
			else{
				$jeniskelamin = 2;
			}
			$telepon=$this->input->get_post('telepon');
			$alamat=$this->input->get_post('alamat');
			$tempatlahir=$this->input->get_post('tempatlahir');
			$tgllahir=$this->input->get_post('tgllahir');
			$this->member_model->update_member($idmember,$namamember,$jeniskelamin,$telepon, $alamat, $tempatlahir,$tgllahir);
			$m_data['notification_message']="Member successfully updated";
			
		$h_data['style']="simpel-herbal.css";
		$f_data['author']="ade";
		$this->load->view('admin/header.php',$h_data);
		$this->load->view('member/update.php',$m_data);
		$this->load->view('admin/footer.php',$f_data);
		
	}
	
	//COPY FROM SEARCH CONTROLLER
	function searchMember(){
		$m_data['notification_message']="";
		$m_data['content'] = "";
		
		$this->form_validation->set_rules('idmember','idmember','required');
		if ($this->form_validation->run()==FALSE){
			$m_data['notification_message']="Enter ID Member To Search";
		}
		else{
			
			$idmember=$this->input->get_post('idmember');
			$data = $this->member_model->search_member_by_id_update($idmember);
			if ($data !=0 ){
				foreach ($data as $userdata) :
					$m_data['content'] = $userdata;
				endforeach;
			}
			else{
				$m_data['notification_message']="Member Not Found";
			}
		}
		$h_data['style']="simpel-herbal.css";
		$f_data['author']="ade";
		$this->load->view('admin/header.php',$h_data);
		$this->load->view('member/update.php',$m_data);
		$this->load->view('admin/footer.php',$f_data);
	}
}

/* End of file welcome.php */
/* Location: ./system/application/controllers/welcome.php */
?>