<?php
/**
*  class home_controller
*
* class yang digunakan sebagai controller yang mengatur navigasi halaman laporan home
*
*/
class Home_controller extends Controller {

	function Home_controller()
	{
		parent::Controller();	
		$this->load->library('input');
		$this->load->model('member_model');
	}
	/**
	*
	*	fungsi index 
	*	adalah fungsi default yang dipanggil oleh home_controller melakukan load header footer serta view laporan/home.php
	*	@param void
	*	@return void
	*/
	function index()
	{
		//set session current menu to give mark in the active menu
		$this->session->set_userdata('current_menu','LAPORAN');
		$h_data['style']="simpel-herbal.css";
		$m_data['notification_message']="";
		$m_data['content']="";
		$f_data['author']="fasilkom 07";
		
		$this->load->view('admin/header.php',$h_data);
		$this->load->view('laporan/home.php',$m_data);
		$this->load->view('admin/footer.php',$f_data);
	}
	
}

/* End of file welcome.php */
/* Location: ./system/application/controllers/welcome.php */
?>