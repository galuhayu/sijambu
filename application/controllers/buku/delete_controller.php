<?php
/**
*  class delete_controller
*
* class yang digunakan sebagai controller yang mengatur pendeletan buku
*
*/
class Delete_controller extends Controller {
	/**
	*
	*	Constructor
	*	
	*	mendefinisikan konstruktor delete controller
	*	sekaligus meload library input dan model book_model
	*/
	function Delete_controller()
	{
		parent::Controller();	
		$this->load->library('input');
		$this->load->model('book_model');
	}
	/**
	*
	*	fungsi index 
	*	adalah fungsi default yang dipanggil oleh delete_controller melakukan load header footer serta view buku/delete.php
	*	@param void
	*	@return void
	*/
	function index()
	{
		//menyimpan session untuk mengetahui menu active yang dipilih
		$this->session->set_userdata('current_menu','BUKU');
		$h_data['style']="simpel-herbal.css";
		$m_data['notification_message']="";
		$f_data['author']="fasilkom 07";
		$this->load->view('admin/header.php',$h_data);
		$this->load->view('buku/delete.php',$m_data);
		$this->load->view('admin/footer.php',$f_data);
	}
	/**
	*
	*	fungsi deleteBuku
	*	adalah fungsi yang digunakan untuk menghapus buku
	*	@param void
	*	@return void
	*/
	function deleteBuku(){
		//melakukan validasi input username dengan format alfanumerik dan harus terisi
		$this->form_validation->set_rules('idbuku','Id Buku','required|numeric');
		
		if ($this->form_validation->run()==FALSE){
			$m_data['notification_message']="Masukan tidak valid";
		}
		else{
			//mengambil semua variable post
			$idbuku=$this->input->get_post('idbuku');
			
			//memanggil fungsi deleteabuku pada buku model untuk memberi flag dihapus pada idbuku tersebut
			$status = $this->book_model->delete_buku($idbuku);
			if ($status != 0 ){
				$m_data['notification_message']="Buku berhasil dihapus";
			}
			else{
				$m_data['notification_message']="Buku tidak ditemukan";
			}
		}		
		$h_data['style']="simpel-herbal.css";
		$f_data['author']="fasilkom 07";
		$this->load->view('admin/header.php',$h_data);
		$this->load->view('buku/delete.php',$m_data);
		$this->load->view('admin/footer.php',$f_data);
	}
}

/* End of file welcome.php */
/* Location: ./system/application/controllers/welcome.php */
?>