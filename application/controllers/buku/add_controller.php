<?php
/**
*  class add_controller
*
* class yang digunakan sebagai controller yang mengatur penambahan buku
*
*/
class Add_controller extends Controller {

	/**
	*
	*	Constructor
	*	
	*	mendefinisikan konstruktor add controller
	*	sekaligus meload library input dan model buku_model
	*/
	function Add_controller()
	{
		parent::Controller();	
		$this->load->library('input');
		$this->load->model('book_model');
	}
	
	/**
	*
	*	fungsi index 
	*	adalah fungsi default yang dipanggil oleh add_controller melakukan load header footer serta view buku/add.php
	*	@param void
	*	@return void
	*/
	function index()
	{
		//menyimpan session agar dapat mengetahui active menu yang dipilih
		$this->session->set_userdata('current_menu','BUKU');
		$h_data['style']="simpel-herbal.css";
		$m_data['notification_message']="";
		$f_data['author']="fasilkom 07";
		$this->load->view('admin/header.php',$h_data);
		$this->load->view('buku/add.php',$m_data);
		$this->load->view('admin/footer.php',$f_data);
	}
	
	/**
	*
	*	fungsi AddBuku
	*	adalah fungsi yang digunakan untuk menambah buku ke dalam database
	*	@param void
	*	@return void
	*/
	function addBuku(){
		//melakukan validasi input sesuai dengan rules yang telah dibuat
		$this->form_validation->set_rules('namabuku','Judul Buku','required|alpha_numeric');
		$this->form_validation->set_rules('pengarang','Pengarang','required|alpha');
		$this->form_validation->set_rules('hargasewa','Harga','required|numeric');
		$this->form_validation->set_rules('lama','Lama Sewa','required|numeric');
		
		if ($this->form_validation->run()==FALSE){
			$m_data['notification_message']="Masukan tidak valid";
		}
		else{
			//mengambil semua variable post
			$namabuku = $this->input->get_post('namabuku');
			$pengarang = $this->input->get_post('pengarang');
			$hargasewa = $this->input->get_post('hargasewa');
			$lama = $this->input->get_post('lama');
			
			//memanggil fungsi create_buku dari model book_model untuk menambahkan buku pada database
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