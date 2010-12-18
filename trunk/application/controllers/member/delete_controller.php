<?php
/**
*  class delete_controller
*
* class yang digunakan sebagai controller yang mengatur pendeletan member
*
*/
class Delete_controller extends Controller {
	/**
	*
	*	Constructor
	*	
	*	mendefinisikan konstruktor delete controller
	*	sekaligus meload library input dan model member_model
	*/
	function Delete_controller()
	{
		parent::Controller();	
		$this->load->library('input');
		$this->load->model('member_model');
	}
	/**
	*
	*	fungsi index 
	*	adalah fungsi default yang dipanggil oleh delete_controller melakukan load header footer serta view member/delete.php
	*	@param void
	*	@return void
	*/
	function index()
	{
		//menyimpan session untuk mengetahui menu active yang dipilih
		$this->session->set_userdata('current_menu','MEMBER');
		$h_data['style']="simpel-herbal.css";
		$m_data['notification_message']="";
		$f_data['author']="fasilkom 07";
		$this->load->view('admin/header.php',$h_data);
		$this->load->view('member/delete.php',$m_data);
		$this->load->view('admin/footer.php',$f_data);
	}
	/**
	*
	*	fungsi deleteMember
	*	adalah fungsi yang digunakan untuk menghapus member
	*	@param void
	*	@return void
	*/
	function deleteMember(){
		//melakukan validasi input username dengan format alfanumerik dan harus terisi
		$this->form_validation->set_rules('idmember','Id Member','required|numeric');
		
		if ($this->form_validation->run()==FALSE){
			$m_data['notification_message']="Masukan tidak valid";
		}
		else{
			//mengambil semua variable post
			$idmember=$this->input->get_post('idmember');
			
			//memanggil fungsi deletemember pada member model untuk memberi flag dihapus pada idmember tersebut
			$status = $this->member_model->delete_member($idmember);
			if ($status != 0 ){
				$m_data['notification_message']="Member berhasil dihapus";
			}
			else{
				$m_data['notification_message']="Member tidak ditemukan";
			}
		}		
		$h_data['style']="simpel-herbal.css";
		$f_data['author']="fasilkom 07";
		$this->load->view('admin/header.php',$h_data);
		$this->load->view('member/delete.php',$m_data);
		$this->load->view('admin/footer.php',$f_data);
	}
}

/* End of file welcome.php */
/* Location: ./system/application/controllers/welcome.php */
?>