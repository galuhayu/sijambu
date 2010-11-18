<?php

class Home_controller extends Controller {

	function Home_controller()
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
		$m_data['content']="";
		$f_data['author']="ade";
		
		$data = $this->account_model->list_account();
		$id=0;
		if ($data !=0 ){
			foreach ($data as $userdata) :
				$temp[$id] = $userdata;
				$id++;
			endforeach;
			$m_data['content'] = $temp;
		}
		else{
			$m_data['notification_message']="User Not Found";
		}
		
		$this->load->view('admin/header.php',$h_data);
		$this->load->view('account/home.php',$m_data);
		$this->load->view('admin/footer.php',$f_data);
	}
	
}

/* End of file welcome.php */
/* Location: ./system/application/controllers/welcome.php */
?>