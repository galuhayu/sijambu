<?php
/**
*  class search_controller
*
* class yang digunakan sebagai controller yang mengatur pencarian member
*
*/
class Search_controller extends Controller {

	/**
	*
	*	Constructor 
	*	mendefinisikan search controller
	*	melakukan load library input dan model member_model
	*
	*/
	function Search_controller()
	{
		parent::Controller();	
		$this->load->library('input');
		$this->load->model('member_model');
	}
	
	/**
	*
	*	fungsi index 
	*	adalah fungsi default yang dipanggil oleh search_controller melakukan load header footer serta view member/search.php
	*	@param void
	*	@return void
	*/
	function index()
	{
		//menyimpan session agar menu yang active dapat diketahui
		$this->session->set_userdata('current_menu','MEMBER');
		$h_data['style']="simpel-herbal.css";
		$m_data['notification_message'] = "";
		$m_data['content'] = "";
		$f_data['author']="fasilkom 07";
		$this->load->view('admin/header.php',$h_data);
		$this->load->view('member/search.php',$m_data);
		$this->load->view('admin/footer.php',$f_data);
	}
	
	function searchMember(){
		$m_data['notification_message']="";
		$m_data['content'] = "";
		//mengambil variable post
		$tipe=$this->input->get_post('tipe');
		if ($tipe == 'id'){
			$this->form_validation->set_rules('field','Field','required|numeric');
		}else{
			$this->form_validation->set_rules('field','Field','required|alpha_numeric');
		}
		//melakukan validasi input username agar harus terisi dan berformat alfanumerik
		if ($this->form_validation->run()==FALSE){
			$m_data['notification_message']="Masukan tidak valid";
		}
		else{
			$field=$this->input->get_post('field');
			//memanggil fungsi search_member pada model member_model untuk mengetahui apakah member tersebut tersedia pada database
			if ($tipe == 'id'){
				$data = $this->member_model->search_member_by_id($field);
			}else{
				$data = $this->member_model->search_member_by_judul($field);
			}
			//untuk setiap hasil member yang didapat masukkan ke dalam variable temp dan akan disimpan di $m_data['content']
			$id = 0;
			if ($data !=0 ){
				foreach ($data as $memberdata) :
					$temp[$id] = $memberdata;
					$id++;
				endforeach;
				$m_data['content'] = $temp;
			}
			else{
				$m_data['notification_message']="Member tidak ditemukan";
			}
		}
		
		$h_data['style']="simpel-herbal.css";
		$f_data['author']="fasilkom 07";
		$this->load->view('admin/header.php',$h_data);
		$this->load->view('member/search.php',$m_data);
		$this->load->view('admin/footer.php',$f_data);
	}
}

/* End of file welcome.php */
/* Location: ./system/application/controllers/welcome.php */
?>