<?php
/**
*  class add_controller
*
* class yang digunakan sebagai controller yang mengatur penambahan account
*
*/
class Add_controller extends Controller {

	/**
	*
	*	Constructor
	*	
	*	mendefinisikan konstruktor add controller
	*	sekaligus meload library input dan model account_model
	*/
	function Add_controller()
	{
		parent::Controller();	
		$this->load->library('input');
		$this->load->model('account_model');
	}
	
	/**
	*
	*	fungsi index 
	*	adalah fungsi default yang dipanggil oleh add_controller melakukan load header footer serta view account/add.php
	*	@param void
	*	@return void
	*/
	function index()
	{
		//set session current menu to give mark in the active menu
		$this->session->set_userdata('current_menu','ACCOUNT');
		$h_data['style']="simpel-herbal.css";
		$m_data['notification_message']="";
		$f_data['author']="fasilkom 07";
		$this->load->view('admin/header.php',$h_data);
		$this->load->view('account/add.php',$m_data);
		$this->load->view('admin/footer.php',$f_data);
	}
	
	/**
	*
	*	fungsi AddAccount
	*	adalah fungsi yang digunakan untuk menambah account ke dalam database
	*	@param void
	*	@return void
	*/
	function addAccount(){
		//set all variable needed to do validation
		$this->form_validation->set_rules('username','Username','required|alpha_numeric');
		$this->form_validation->set_rules('password','Password','required');
		$this->form_validation->set_rules('telp','No telp','required|numeric');
		$this->form_validation->set_rules('name','Nama','required|alpha');
		$this->form_validation->set_rules('address','Alamat','alpha_numeric');
		
		//handle invalid validation
		if ($this->form_validation->run()==FALSE){
			$m_data['notification_message']="Masukan tidak valid";
		}
		else{
			//get all variable post
			$username=$this->input->get_post('username');
			$password=$this->input->get_post('password');
			$role_name=$this->input->get_post('jabatan');
			$nama=$this->input->get_post('name');
			$nohp=$this->input->get_post('telp');
			$alamat=$this->input->get_post('address');
			
			//create account in account model
			$this->account_model->create_account($username,SHA1($password),$role_name,$nama,$alamat,$nohp);
			$m_data['notification_message']="Account berhasil dibuat";
		}			
		$h_data['style']="simpel-herbal.css";
		$f_data['author']="fasilkom 07";
		$this->load->view('admin/header.php',$h_data);
		$this->load->view('account/add.php',$m_data);
		$this->load->view('admin/footer.php',$f_data);
	}
}

/* End of file welcome.php */
/* Location: ./system/application/controllers/welcome.php */
?>