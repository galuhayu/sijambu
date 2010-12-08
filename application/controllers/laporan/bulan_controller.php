<?php

class Bulan_controller extends Controller {

	function Bulan_controller()
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
		
		$this->load->view('admin/header.php',$h_data);
		$this->load->view('laporan/bulanan.php',$m_data);
		$this->load->view('admin/footer.php',$f_data);
	}
	
	function search(){
		$m_data['notification_message']="";
		$m_data['content'] = "";
		$total = 0;
		$this->form_validation->set_rules('field','Field','required');
		if ($this->form_validation->run()==FALSE){
			$m_data['notification_message']="Enter Field To Search";
		}
		else{
			$field=$this->input->get_post('field');
			if ($field<10) $field='0'.$field;
			$data = $this->laporan_model->search_by_bulan($field);
			$id = 0;
			if ($data !=0 ){
				foreach ($data as $transactiondata) :
					$temp[$id] = $transactiondata;
					$total += $transactiondata['harga'] + $transactiondata['denda'];
					$id++;
				endforeach;
				$m_data['content'] = $temp;
				$m_data['total'] = $total;
			}
			else{
				$m_data['notification_message']="Transaction Not Found in Month $field";
			}
		}
		
		$h_data['style']="simpel-herbal.css";
		$f_data['author']="ade";
		$this->load->view('admin/header.php',$h_data);
		$this->load->view('laporan/bulanan.php',$m_data);
		$this->load->view('admin/footer.php',$f_data);
	}
	
}

/* End of file welcome.php */
/* Location: ./system/application/controllers/welcome.php */
?>