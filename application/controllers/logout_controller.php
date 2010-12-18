<?php
/**
*  class logout_controller
*
* class yang digunakan sebagai controller yang mengatur user yang logout
*
*/
class Logout_controller extends Controller
{	
	/**
	*
	*	Constructor
	*	
	*	mendefinisikan konstruktor logout controller
	*	
	*/
	function Logout_controller() {
		parent::Controller();
		$this->load->model('user_model');
	}
	/**
	*
	*	fungsi index 
	*	adalah fungsi default yang dipanggil oleh logout_controller untuk  redirect ke home_controller
	*	@param void
	*	@return void
	*/
	function index() {
		if( $this->session->userdata('logged_in') == TRUE ) {
			// Save choosen theme
			$this->user_model->set_style($this->session->userdata('style'), $this->session->userdata('userid'));
			// Destroy session
			$this->session->unset_userdata('logged_in');
		}
		redirect('home_controller');
	}
}