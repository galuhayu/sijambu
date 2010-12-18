<?php
/**
*  class update_controller
*
* class yang digunakan sebagai controller yang mengatur mengubah member
*
*/
class Update_controller extends Controller {
	/**
	*
	*	Constructor
	*	
	*	mendefinisikan konstruktor update controller
	*	sekaligus meload library input dan model member_model
	*/
	function Update_controller()
	{
		parent::Controller();	
		$this->load->library('input');
		$this->load->model('member_model');
	}
	/**
	*
	*	fungsi index 
	*	adalah fungsi default yang dipanggil oleh update_controller melakukan load header footer serta view member/update.php
	*	@param void
	*	@return void
	*/
	function index()
	{
		//set session current menu to give mark in the active menu	
		$this->session->set_userdata('current_menu','MEMBER');
		$h_data['style']="simpel-herbal.css";
		$m_data['notification_message']="";
		$m_data['content'] = "";
		$f_data['author']="fasilkom 07";
		$this->load->view('admin/header.php',$h_data);
		$this->load->view('member/update.php',$m_data);
		$this->load->view('admin/footer.php',$f_data);
	}
	/**
	*
	*	fungsi updateMember
	*	adalah fungsi yang digunakan untuk merubah member yang ada di database
	*	@param void
	*	@return void
	*/
	function updateMember(){
		$m_data['notification_message']="";
		$m_data['content'] = "";
		//set all variable needed to do validation
		$this->form_validation->set_rules('idmember','idmember','required|numeric');
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
			$idmember=$this->input->get_post('idmember');
			$namamember=$this->input->get_post('namamember');
			$jeniskelamin=$this->input->get_post('jeniskelamin');
			if ($jeniskelamin == 'male'){
				$jeniskelamin = 1;
			}
			else{
				$jeniskelamin = 2;
			}
			$telepon=$this->input->get_post('telepon');
			$alamat=$this->input->get_post('alamat');
			$tempatlahir=$this->input->get_post('tempatlahir');
			$tgllahir=$this->input->get_post('tgllahir');
			
			//memanggil fungsi update_member dari member_model yang digunakan untuk merubah member pada database
			$this->member_model->update_member($idmember,$namamember,$jeniskelamin,$telepon, $alamat, $tempatlahir,$tgllahir);
			$m_data['notification_message']="Member berhasil diubah";
		}	
		$h_data['style']="simpel-herbal.css";
		$f_data['author']="fasilkom 07";
		$this->load->view('admin/header.php',$h_data);
		$this->load->view('member/update.php',$m_data);
		$this->load->view('admin/footer.php',$f_data);
		
	}
	/**
	*
	*	fungsi SearchMember
	*	adalah fungsi yang digunakan untuk mencari member yang ada di dalam database
	*	@param void
	*	@return void
	*/
	//COPY FROM SEARCH CONTROLLER
	function searchMember(){
		$m_data['notification_message']="";
		$m_data['content'] = "";
		//set all variable needed to do validation
		$this->form_validation->set_rules('idmember','idmember','required|numeric');
		if ($this->form_validation->run()==FALSE){
			$m_data['notification_message']="Masukan tidak valid";
		}
		else{
			//get all variable post
			$idmember=$this->input->get_post('idmember');
			//memanggil fungsi search_member pada member_model untuk mencari member berdasarkan id
			$data = $this->member_model->search_member_by_id_update($idmember);
			if ($data !=0 ){
				foreach ($data as $userdata) :
					$m_data['content'] = $userdata;
				endforeach;
			}
			else{
				$m_data['notification_message']="Member tidak ditemukan";
			}
		}
		$h_data['style']="simpel-herbal.css";
		$f_data['author']="fasilkom 07";
		$this->load->view('admin/header.php',$h_data);
		$this->load->view('member/update.php',$m_data);
		$this->load->view('admin/footer.php',$f_data);
	}
}

/* End of file welcome.php */
/* Location: ./system/application/controllers/welcome.php */
?>