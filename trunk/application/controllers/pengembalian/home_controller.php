<?php
/**
*  class home_controller
*
* class yang digunakan sebagai controller yang mengatur pengembalian
*
*/
class Home_controller extends Controller {
	/**
	*
	*	Constructor
	*	
	*	mendefinisikan konstruktor home controller
	*	sekaligus meload library input dan model pengembalian model
	*/
	function Home_controller()
	{
		parent::Controller();	
		$this->load->library('input');
		$this->load->model('pengembalian_model');
	}
	
	/**
	*
	*	fungsi index 
	*	adalah fungsi default yang dipanggil oleh home_controller melakukan load header footer serta view pengembalian/home.php
	*	@param void
	*	@return void
	*/
	function index()
	{
		//menyimpan session untuk mengetahui menu active mana yang dipilih
		$this->session->set_userdata('current_menu','PENGEMBALIAN');
		$h_data['style']="simpel-herbal.css";
		$m_data['content'] = "";
		$m_data['notification_message'] = "";
		$f_data['author']="fasilkom 07";
		
		$this->load->view('admin/header.php',$h_data);
		$this->load->view('pengembalian/home.php',$m_data);
		$this->load->view('admin/footer.php',$f_data);
	}
}

/* End of file welcome.php */
/* Location: ./system/application/controllers/welcome.php */
?>