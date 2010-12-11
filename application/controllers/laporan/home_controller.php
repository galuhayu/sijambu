<?php

class Home_controller extends Controller {

	function Home_controller()
	{
		parent::Controller();	
		$this->load->library('input');
		$this->load->model('member_model');
	}
	
	function index()
	{
		$this->session->set_userdata('current_menu','LAPORAN');
		$h_data['style']="simpel-herbal.css";
		$m_data['notification_message']="";
		$m_data['content']="";
		$f_data['author']="fasilkom 07";
		
		$data = $this->member_model->list_member();
		$id=0;
		if ($data !=0 ){
			foreach ($data as $memberdata) :
				$temp[$id] = $memberdata;
				$id++;
			endforeach;
			$m_data['content'] = $temp;
		}
		else{
			$m_data['notification_message']="Laporan tidak ditemukan";
		}
		
		$this->load->view('admin/header.php',$h_data);
		$this->load->view('laporan/home.php',$m_data);
		$this->load->view('admin/footer.php',$f_data);
	}
	
}

/* End of file welcome.php */
/* Location: ./system/application/controllers/welcome.php */
?>