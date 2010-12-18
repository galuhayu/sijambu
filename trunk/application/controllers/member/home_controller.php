<?php
/**
*	class home_controller
*
*	class yang digunakan untuk mengatur navigasi utama pada menu member
*
*/
class Home_controller extends Controller {

	/**
	*
	*	Constructor
	*
	*	mendefinisikan home_controller
	*	meload library input serta model member_model
	*/
	function Home_controller()
	{
		parent::Controller();	
		$this->load->library('input');
		$this->load->model('member_model');
	}
	
	
	/**
	*
	*	fungsi index 
	*	adalah fungsi default yang dipanggil oleh home_controller melakukan load header footer serta view member/home.php
	*	@param void
	*	@return void
	*/
	function index()
	{
		//menyimpan session untuk mengetahui active menu 
		$this->session->set_userdata('current_menu','MEMBER');
		$h_data['style']="simpel-herbal.css";
		$m_data['notification_message']="";
		$m_data['content']="";
		$f_data['author']="fasilkom 07";
		
		//load semua member yang ada dari member_model
		$data = $this->member_model->list_member();
		$id=0;
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
		
		$this->load->view('admin/header.php',$h_data);
		$this->load->view('member/home.php',$m_data);
		$this->load->view('admin/footer.php',$f_data);
	}
	
}

/* End of file welcome.php */
/* Location: ./system/application/controllers/welcome.php */
?>