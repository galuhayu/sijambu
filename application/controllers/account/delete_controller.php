<?php
/**
*  class delete_controller
*
* class yang digunakan sebagai controller yang mengatur pendeletan account
*
*/
class Delete_controller extends Controller {

	/**
	*
	*	Constructor
	*	
	*	mendefinisikan konstruktor delete controller
	*	sekaligus meload library input dan model account_model
	*/
	function Delete_controller()
	{
		parent::Controller();	
		$this->load->library('input');
		$this->load->model('account_model');
	}
	
	/**
	*
	*	fungsi index 
	*	adalah fungsi default yang dipanggil oleh delete_controller melakukan load header footer serta view account/delete.php
	*	@param void
	*	@return void
	*/
	function index()
	{
		//menyimpan session untuk mengetahui menu active yang dipilih
		$this->session->set_userdata('current_menu','ACCOUNT');
		$h_data['style']="simpel-herbal.css";
		$m_data['notification_message']="";
		$f_data['author']="fasilkom 07";
		$this->load->view('admin/header.php',$h_data);
		$this->load->view('account/delete.php',$m_data);
		$this->load->view('admin/footer.php',$f_data);
	}
	
	
	/**
	*
	*	fungsi deleteAccount
	*	adalah fungsi yang digunakan untuk menghapus account
	*	@param void
	*	@return void
	*/
	function deleteAccount(){
		//melakukan validasi input username dengan format alfanumerik dan harus terisi
		$this->form_validation->set_rules('username','Username','required|alpha_numeric');
		
		if ($this->form_validation->run()==FALSE){
			$m_data['notification_message']="Masukan tidak valid";
		}
		else{
			//mengambil semua variable post
			$username=$this->input->get_post('username');
			
			//memanggil fungsi deleteaccount pada account model untuk memberi flag dihapus pada username tersebut
			$status = $this->account_model->delete_account($username);
			if ($status != 0 ){
				$m_data['notification_message']="Account berhasil dihapus";
			}
			else{
				$m_data['notification_message']="Account tidak ditemukan";
			}
		}			
		$h_data['style']="simpel-herbal.css";
		$f_data['author']="fasilkom 07";
		$this->load->view('admin/header.php',$h_data);
		$this->load->view('account/delete.php',$m_data);
		$this->load->view('admin/footer.php',$f_data);
	}
}

/* End of file welcome.php */
/* Location: ./system/application/controllers/welcome.php */
?>