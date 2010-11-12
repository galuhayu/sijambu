<?php
/**
 * 
 * @author Ardi
 *
 */
class Logout_controller extends Controller
{
	function Logout_controller() {
		parent::Controller();
		$this->load->model('user_model');
	}
	
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