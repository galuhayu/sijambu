<?php
/**
 * 
 * @author Ardi
 *
 */
class Password_controller extends Controller
{
	function Password_controller() {
		parent::Controller();
		$this->load->model('user_model');
	}
	
	function index() {
		if( $this->session->userdata('logged_in') == TRUE ) {
			$this->session->set_userdata('current_menu','');
			$h_data['style']="simpel-herbal.css";
			$m_data['notification_message'] = "";//$notification_message;
			$f_data['author']="fasilkom 07";
			$this->load->view('admin/header.php',$h_data);
			$this->load->view('home_password',$m_data);
			$this->load->view('admin/footer.php',$f_data);
		}
	}
	
	function changepassword(){
		$this->form_validation->set_rules('passlama','Passlama','required');
		$this->form_validation->set_rules('passbaru','Passbaru','required');
		$this->form_validation->set_rules('passconf','Passconf','required');
		
		if ($this->form_validation->run()==FALSE){
			$m_data['notification_message']="Masukan tidak valid";
		}
		else{
			$passlama = $this->input->get_post('passlama');
			$passbaru = $this->input->get_post('passbaru');
			$passconf = $this->input->get_post('passconf');
			$username = $this->session->userdata('username');
			if ($passbaru == $passconf){
				$temp = $this->user_model->changepassword($username, $passlama,$passbaru);
				if ($temp ==1){
					$m_data['notification_message']="Password telah berhasil diganti";
				}
				else{
					$m_data['notification_message']="Password yang anda masukan salah, silahkan masukan password lama yang benar";
				}

			}else{
				$m_data['notification_message']="Konfirmasi password tidak cocok";
			}
		}			
		$h_data['style']="simpel-herbal.css";
		$f_data['author']="ade";
		$this->load->view('admin/header.php',$h_data);
		$this->load->view('home_password.php',$m_data);
		$this->load->view('admin/footer.php',$f_data);
	}
}