<?php
/**
*  class login_controller
*
* class yang digunakan sebagai controller yang mengatur login user
*
*/
class Login_controller extends Controller {
	/**
	*
	*	Constructor
	*	
	*	mendefinisikan konstruktor login controller
	*	
	*/
	function Login_controller()
	{
		parent::Controller();	
		$this->load->library('input');
		$this->load->model('user_model');
	}
	
	/**
	*
	*	fungsi verify
	*	adalah fungsi yang digunakan untuk melakukan verifikasi user yang login beserta rules dan hakases nya
	*	@param void
	*	@return void
	*/
	function verify()
	{
		if ($this->session->userdata('logged_in')==TRUE){
			redirect('home_controller');
		}
		elseif ($this->input->post('login') && $this->session->userdata('logged_in')==FALSE){
			//mengambil semua variable post
			$username=$this->input->get_post('username');
			$password=$this->input->get_post('password');
			
			//mengambil user id dari username dan passoword
			$userid=$this->user_model->user_check($username,$password);
			
			//mengambil userstyle dari userid
			$userstyle=$this->user_model->get_style($userid);
			
			//mengambil role dari userid
			$roles=$this->user_model->get_roles($userid);
			
			if ($userstyle==NULL)$userstyle='herbal';
			
			//memberikan default user access dengan false
			if ($userid!=NULL){
				$arrUserAccess = array(
				'BUKU' =>FALSE,
				'MEMBER' =>FALSE,
				'PEMINJAMAN' =>FALSE,
				'PENGEMBALIAN' =>FALSE,
				'LAPORAN' =>FALSE,
				'ACCOUNT' =>FALSE);  
			
				//untuk setiap role yang didapat mendapat hak akses sesuai dengan jabatan
				foreach($roles as $role):
					if ($role['role_name'] == 'pengelola_toko' || $role['role_name'] == 'administrator'){
						$arrUserAccess[ 'BUKU' ]=TRUE;
						$arrUserAccess[ 'MEMBER' ]=TRUE;
						$arrUserAccess[ 'PEMINJAMAN' ]=TRUE;
						$arrUserAccess[ 'PENGEMBALIAN' ]=TRUE;
						$arrUserAccess[ 'LAPORAN' ]=TRUE;
						$arrUserAccess[ 'ACCOUNT' ]=TRUE;
					}
					else if ($role['role_name'] == 'pemilik_toko'){
						$arrUserAccess[ 'LAPORAN' ]=TRUE;
					}
					else if ($role['role_name'] == 'pegawai_toko'){
						$arrUserAccess[ 'BUKU' ]=TRUE;
						$arrUserAccess[ 'MEMBER' ]=TRUE;
						$arrUserAccess[ 'PEMINJAMAN' ]=TRUE;
						$arrUserAccess[ 'PENGEMBALIAN' ]=TRUE;
					}
					
				endforeach;
				
				//menyimpan userdata berupa data-data mengenai user
				$arrUserData = array(
					'username' => $username,
					'userid' => $userid,
					'user_access' => $arrUserAccess,
					'logged_in' => TRUE,
					'current_menu' => 'HOME',
					'current_modulmenu' => 'ABOUT',
					'current_submodulmenu' => '',
					'style' => $userstyle);
				$this->session->set_userdata($arrUserData);
				redirect('home_controller');					
			}
		}
		$h_data['style']="simpel-herbal.css";
		$m_data['notification_message'] = "Username / Password Account tidak benar ";
		$f_data['author']="fasilkom 07";
		$this->load->view('admin/header.php',$h_data);
		$this->load->view('home_view',$m_data);
		$this->load->view('admin/footer.php',$f_data);					
	}
}


/* End of file welcome.php */
/* Location: ./system/application/controllers/welcome.php */
