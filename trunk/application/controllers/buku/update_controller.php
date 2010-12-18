<?php
/**
*  class update_controller
*
* class yang digunakan sebagai controller yang mengatur mengubah buku
*
*/
class Update_controller extends Controller {
	/**
	*
	*	Constructor
	*	
	*	mendefinisikan konstruktor update controller
	*	sekaligus meload library input dan model book_model
	*/
	function Update_controller()
	{
		parent::Controller();	
		$this->load->library('input');
		$this->load->model('book_model');
	}
	/**
	*
	*	fungsi index 
	*	adalah fungsi default yang dipanggil oleh update_controller melakukan load header footer serta view buku/update.php
	*	@param void
	*	@return void
	*/
	function index()
	{
		//set session current menu to give mark in the active menu	
		$this->session->set_userdata('current_menu','BUKU');
		$h_data['style']="simpel-herbal.css";
		$m_data['notification_message']="";
		$m_data['content'] = "";
		$f_data['author']="fasilkom 07";
		$this->load->view('admin/header.php',$h_data);
		$this->load->view('buku/update.php',$m_data);
		$this->load->view('admin/footer.php',$f_data);
	}
	/**
	*
	*	fungsi updateBuku
	*	adalah fungsi yang digunakan untuk merubah buku yang ada di database
	*	@param void
	*	@return void
	*/
	function updateBuku(){
		$m_data['notification_message']="";
		$m_data['content'] = "";
		//set all variable needed to do validation
		$this->form_validation->set_rules('idbuku','idbuku','required|numeric');
		$this->form_validation->set_rules('namabuku','Judul Buku','required|alpha_numeric');
		$this->form_validation->set_rules('pengarang','Pengarang','required|alpha');
		$this->form_validation->set_rules('hargasewa','Harga','required|numeric');
		$this->form_validation->set_rules('lama','Lama Sewa','required|numeric');
		
		if ($this->form_validation->run()==FALSE){
			$m_data['notification_message']="Masukan tidak valid";
		}
		else{
			//get all variable post
			$idbuku=$this->input->get_post('idbuku');
			$namabuku=$this->input->get_post('namabuku');
			$pengarang=$this->input->get_post('pengarang');
			$hargasewa=$this->input->get_post('hargasewa');
			$lama=$this->input->get_post('lama');
			
			//memanggil fungsi update_buku dari book_model yang digunakan untuk merubah buku pada database
			$this->book_model->update_buku($idbuku,$namabuku,$pengarang,$hargasewa,$lama);
			$m_data['notification_message']="Buku berhasil diubah";
		}	
		$h_data['style']="simpel-herbal.css";
		$f_data['author']="fasilkom 07";
		$this->load->view('admin/header.php',$h_data);
		$this->load->view('buku/update.php',$m_data);
		$this->load->view('admin/footer.php',$f_data);
		
	}
	/**
	*
	*	fungsi SearchBuku
	*	adalah fungsi yang digunakan untuk mencari buku yang ada di database
	*	@param void
	*	@return void
	*/
	//COPY FROM SEARCH CONTROLLER
	function searchBuku(){
		$m_data['notification_message']="";
		$m_data['content'] = "";
		//set all variable needed to do validation
		$this->form_validation->set_rules('idbuku','idbuku','required|numeric');
		if ($this->form_validation->run()==FALSE){
			$m_data['notification_message']="Masukan ID buku untuk mencari";
		}
		else{
			//get all variable post
			$idbuku=$this->input->get_post('idbuku');
			//memanggil fungsi search_buku pada book_model untuk mencari buku berdasarkan id
			$data = $this->book_model->search_buku_by_id_update($idbuku);
			if ($data !=0 ){
				foreach ($data as $userdata) :
					$m_data['content'] = $userdata;
				endforeach;
			}
			else{
				$m_data['notification_message']="Buku tidak ditemukan";
			}
		}
		$h_data['style']="simpel-herbal.css";
		$f_data['author']="ade";
		$this->load->view('admin/header.php',$h_data);
		$this->load->view('buku/update.php',$m_data);
		$this->load->view('admin/footer.php',$f_data);
	}
}

/* End of file welcome.php */
/* Location: ./system/application/controllers/welcome.php */
?>