<?php
/**
*  class add_controller
*
* class yang digunakan sebagai controller yang mengatur penambahan member
*
*/
class Add_controller extends Controller {
	/**
	*
	*	Constructor
	*	
	*	mendefinisikan konstruktor add controller
	*	sekaligus meload library input dan model member_model
	*/
	function Add_controller()
	{
		parent::Controller();	
		$this->load->library('input');
		$this->load->model('member_model');
	}
	/**
	*
	*	fungsi index 
	*	adalah fungsi default yang dipanggil oleh add_controller melakukan load header footer serta view member/add.php
	*	@param void
	*	@return void
	*/
	function index()
	{
		//set session current menu to give mark in the active menu	
		$this->session->set_userdata('current_menu','MEMBER');
		$h_data['style']="simpel-herbal.css";
		$m_data['notification_message']="";
		$f_data['author']="fasilkom 07";
		$this->load->view('admin/header.php',$h_data);
		$this->load->view('member/add.php',$m_data);
		$this->load->view('admin/footer.php',$f_data);
	}
	/**
	*
	*	fungsi AddMember
	*	adalah fungsi yang digunakan untuk menambah member ke dalam database
	*	@param void
	*	@return void
	*/
	function addMember(){
		//set all variable needed to do validation
		$this->form_validation->set_rules('namamember','Nama Member','required|alpha');
		$this->form_validation->set_rules('telepon','Telepon','required|numeric');
		$this->form_validation->set_rules('alamat','Alamat','required|alpha_numeric');
		$this->form_validation->set_rules('tempatlahir','Tempat lahir','alpha');
		$this->form_validation->set_rules('tgllahir','Tanggal Lahir','date');
		if ($this->form_validation->run()==FALSE){
			$m_data['notification_message']="Masukan tidak valid";
		}
		else{
			//get all variable post
			$namamember = $this->input->get_post('namamember');
			$telepon = $this->input->get_post('telepon');
			$alamat = $this->input->get_post('alamat');
			$tempatlahir = $this->input->get_post('tempatlahir');
			$tgllahir = $this->input->get_post('tgllahir');
			$jeniskelamin = $this->input->get_post('jeniskelamin');
			if ($jeniskelamin == 'male'){
				$jeniskelamin = 1;
			}
			else {
				$jeniskelamin = 2;
			}
			
			//create member in member_model
			$temp = $this->member_model->create_member($namamember,$telepon,$alamat,$tempatlahir,$tgllahir,$jeniskelamin);
			$id = $temp[0]['idmember'];
			$m_data['notification_message']="Member berhasil dibuat dengan id = ".$id;
		}			
		$h_data['style']="simpel-herbal.css";
		$f_data['author']="fasilkom 07";
		$this->load->view('admin/header.php',$h_data);
		$this->load->view('member/add.php',$m_data);
		$this->load->view('admin/footer.php',$f_data);
	}
}

/* End of file welcome.php */
/* Location: ./system/application/controllers/welcome.php */
?>