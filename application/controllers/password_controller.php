<?php
/**
*  class password_controller
*
* class yang digunakan sebagai controller yang mengatur perubahan password
*
*/
class Password_controller extends Controller
{
	/**
	*
	*	Constructor
	*	
	*	mendefinisikan konstruktor password controller
	*	
	*/
	function Password_controller() {
		parent::Controller();
		$this->load->model('user_model');
	}
	/**
	*
	*	fungsi index 
	*	adalah fungsi default yang dipanggil oleh password_controller melakukan load header footer serta view home_password.php
	*	@param void
	*	@return void
	*/
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
	
	/**
	*
	*	fungsi changepassword
	*	adalah fungsi yang digunakan untuk mengganti password 
	*	@param void
	*	@return void
	*/
	function changepassword(){
		//melakukan validasi input berdasarkan ketentuan yang disebutkan
		$this->form_validation->set_rules('passlama','Passlama','required');
		$this->form_validation->set_rules('passbaru','Passbaru','required');
		$this->form_validation->set_rules('passconf','Passconf','required');
		
		if ($this->form_validation->run()==FALSE){
			$m_data['notification_message']="Masukan tidak valid";
		}
		else{
			//mengambil semua variable post
			$passlama = $this->input->get_post('passlama');
			$passbaru = $this->input->get_post('passbaru');
			$passconf = $this->input->get_post('passconf');
			$username = $this->session->userdata('username');
			
			//cek passbaru dan passconf sudah sama
			if ($passbaru == $passconf){
				//melakukan penggantian password dengan fungsi change password pada user_model
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