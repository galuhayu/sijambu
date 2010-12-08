<?php

class Member_controller extends Controller {

	function Member_controller()
	{
		parent::Controller();	
		$this->load->library('input');
		$this->load->model('laporan_model');
	}
	
	function index()
	{
		$this->session->set_userdata('current_menu','LAPORAN');
		$h_data['style']="simpel-herbal.css";
		$m_data['notification_message']="";
		$m_data['content']="";
		$f_data['author']="ade";
		
		$data = $this->laporan_model->list_member();
		$id=0;
		if ($data !=0 ){
			foreach ($data as $memberdata) :
				$temp[$id] = $memberdata;
				$id++;
			endforeach;
			$m_data['content'] = $temp;
		}
		else{
			$m_data['notification_message']="Member Not Found";
		}
		
		$this->load->view('admin/header.php',$h_data);
		$this->load->view('laporan/member.php',$m_data);
		$this->load->view('admin/footer.php',$f_data);
	}
	
}

/* End of file welcome.php */
/* Location: ./system/application/controllers/welcome.php */
?>