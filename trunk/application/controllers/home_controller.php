<?php
/**
*  class home_controller
*
* class yang digunakan sebagai controller untuk mengatur navigasi halaman utama
*
*/
class Home_controller extends Controller {
	/**
	*
	*	Constructor
	*	
	*	mendefinisikan konstruktor home controller
	*	
	*/
	function Home_controller()
	{
		parent::Controller();	
	}
	/**
	*
	*	fungsi index 
	*	adalah fungsi default yang dipanggil oleh home_controller melakukan load header footer serta view home_view.php
	*	@param void
	*	@return void
	*/
	function index()
	{
		$this->session->set_userdata('current_menu','HOME');
		$h_data['style']="simpel-herbal.css";
		$m_data['notification_message'] = "";//$notification_message;
		$f_data['author']="fasilkom 07";
		$this->load->view('admin/header.php',$h_data);
		$this->load->view('home_view',$m_data);
		$this->load->view('admin/footer.php',$f_data);
	}
}

/* End of file welcome.php */
/* Location: ./system/application/controllers/welcome.php */
?>