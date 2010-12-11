<?php

class Add_controller extends Controller {

	function Add_controller()
	{
		parent::Controller();	
		$this->load->library('input');
		$this->load->model('book_model');
	}
	
	function index()
	{
		$this->session->set_userdata('current_menu','BUKU');
		$h_data['style']="simpel-herbal.css";
		$m_data['notification_message']="";
		$f_data['author']="fasilkom 07";
		$this->load->view('admin/header.php',$h_data);
		$this->load->view('buku/add.php',$m_data);
		$this->load->view('admin/footer.php',$f_data);
	}
	
	function addBuku(){
		$this->form_validation->set_rules('namabuku','Judul Buku','required');
		$this->form_validation->set_rules('pengarang','Pengarang','required');
		$this->form_validation->set_rules('hargasewa','Harga','required');
		$this->form_validation->set_rules('lama','Lama Sewa','required');
		
		if ($this->form_validation->run()==FALSE){
			$m_data['notification_message']="Masukan tidak valid";
		}
		else{
			$namabuku = $this->input->get_post('namabuku');
			$pengarang = $this->input->get_post('pengarang');
			$hargasewa = $this->input->get_post('hargasewa');
			$lama = $this->input->get_post('lama');
			$temp = $this->book_model->create_buku($namabuku,$pengarang,$hargasewa,$lama);
			$id = $temp[0]['idbuku'];
			$m_data['notification_message']="Buku berhasil dibuat dengan id = ".$id;
		}			
		$h_data['style']="simpel-herbal.css";
		$f_data['author']="fasilkom 07";
		$this->load->view('admin/header.php',$h_data);
		$this->load->view('buku/add.php',$m_data);
		$this->load->view('admin/footer.php',$f_data);
	}
}

/* End of file welcome.php */
/* Location: ./system/application/controllers/welcome.php */
?>