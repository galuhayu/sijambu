<?php

class Hari_controller extends Controller {

	function Hari_controller()
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
		$f_data['author']="fasilkom 07";
		
		$this->load->view('admin/header.php',$h_data);
		$this->load->view('laporan/hari.php',$m_data);
		$this->load->view('admin/footer.php',$f_data);
	}
	
	function search(){
		$m_data['notification_message']="";
		$m_data['content'] = "";
		$total = 0;
		$this->form_validation->set_rules('field1','Field1','required');
		$this->form_validation->set_rules('field2','Field2','required');
		if ($this->form_validation->run()==FALSE){
			$m_data['notification_message']="Masukan Field untuk mencari ";
		}
		else{
			$start=$this->input->get_post('field1');
			$end=$this->input->get_post('field2');
			$data = $this->laporan_model->search_by_hari($start,$end);
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
				$m_data['notification_message']="Transaksi tidak ditemukan dalam interval waktu tersebut";
			}
		}
		
		$h_data['style']="simpel-herbal.css";
		$f_data['author']="fasilkom 07";
		$this->load->view('admin/header.php',$h_data);
		$this->load->view('laporan/hari.php',$m_data);
		$this->load->view('admin/footer.php',$f_data);
	}
	
}

/* End of file welcome.php */
/* Location: ./system/application/controllers/welcome.php */
?>