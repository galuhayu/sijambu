<?php

class Pinjam_controller extends Controller {

	function Pinjam_controller()
	{
		parent::Controller();	
		$this->load->library('input');
		$this->load->model('peminjaman_model');
	}
	
	function index()
	{
		$this->session->set_userdata('current_menu','PEMINJAMAN');
		$h_data['style']="simpel-herbal.css";
		$m_data['content'] = "";
		$m_data['notification_message'] = "";
		$f_data['author']="ade";
		
		$this->load->view('admin/header.php',$h_data);
		$this->load->view('peminjaman/home.php',$m_data);
		$this->load->view('admin/footer.php',$f_data);
	}
	
	function transaksi(){
		$h_data['style']="simpel-herbal.css";
		$f_data['author']="ade";
		$m_data['content'] = "";
		$this->load->view('admin/header.php',$h_data);
		
		$this->form_validation->set_rules('idmember','Id Member','required');
		
		if ($this->form_validation->run()==FALSE){
			$m_data['notification_message']="Masukan tidak valid";
			
			$this->load->view('peminjaman/home.php',$m_data);
		}
		else{
			$idmember = $this->input->get_post('idmember');
			$tipe = $this->input->get_post('tipe');
			if ($tipe == 'bacatempat'){
				$tipe = 1;
			}
			else {
				$tipe = 2;
			}
			$temp = $this->peminjaman_model->validate_id($idmember);
			if ($temp == 0){
				$m_data['notification_message']="Member tidak ditemukan";
				$this->load->view('peminjaman/home.php',$m_data);
			}
			else{
				$m_data['notification_message'] = "";
				$m_data['tipe'] = $tipe;
				$m_data['idmember'] = $idmember;
				$m_data['totalsewa'] = 0;
				$this->load->view('peminjaman/transaksi.php',$m_data);
				
			}
		}
		
		$this->load->view('admin/footer.php',$f_data);
	}
	
	function transaksiTambah(){
		$this->form_validation->set_rules('idbuku','Id Buku','required');
		$idmember = $this->input->get_post('idmember');
		$tipe = $this->input->get_post('tipe');
		
		$num = $this->input->get_post('num');
		
		$prevcontent = $this->input->get_post('data');
		$id = 0;
		$totalsewa = 0;
		$temp = "";
		if ($prevcontent >0){
			for ($c = 0 ; $c < $num * 5 ; ){
				$idbuku = $prevcontent[$c]['idbuku'];
				$c++;
				$namabuku = $prevcontent[$c]['namabuku'];
				$c++;
				$pengarang = $prevcontent[$c]['pengarang'];
				$c++;
				$hargasewa = $prevcontent[$c]['hargasewa'];
				$c++;
				$lama = $prevcontent[$c]['lama'];
				$c++;
				
				$totalsewa += $hargasewa;
				
				$temp[$id] = array ('idbuku' => $idbuku, 'namabuku'=> $namabuku, 'pengarang' => $pengarang, 'hargasewa' => $hargasewa, 'lama' => $lama);
				$id++;
			}
			
		}
		if ($this->form_validation->run()==FALSE){
			$m_data['notification_message']="Input Invalid";
			$m_data['content'] = "";
		}
		else{
			$idbuku = $this->input->get_post('idbuku');
			
			$data = $this->peminjaman_model->add_line($idbuku);
			if ($data != 0){
				foreach ($data as $buku) :
					if ($tipe == 1){
						$buku['hargasewa'] /= 2;
					}
					$totalsewa += $buku['hargasewa'];
					$temp[$id] = $buku;
					$id++;
				endforeach;
				$m_data['notification_message']="Buku berhasil ditambah";
			}else{
				$m_data['notification_message'] = "Buku tidak ditemukan";
				$m_data['content'] = "";
			}
		}			
		$m_data['content'] = $temp;
		$m_data['tipe'] = $tipe;
		$m_data['idmember'] = $idmember;
		$m_data['totalsewa'] = $totalsewa;
		$h_data['style']="simpel-herbal.css";
		$f_data['author']="ade";
		$this->load->view('admin/header.php',$h_data);
		$this->load->view('peminjaman/transaksi.php',$m_data);
		$this->load->view('admin/footer.php',$f_data);
	}
	
	function transaksiSimpan(){
		$h_data['style']="simpel-herbal.css";
		$f_data['author']="ade";
		$m_data['content'] = "";
		$idmember = $this->input->get_post('idmember');
		$tipe = $this->input->get_post('tipe');
		$num = $this->input->get_post('num');
		$content = $this->input->get_post('data');
		$temp = "";
		if ($content >0){
			for ($c = 0 ; $c < $num * 5 ; ){
				$idbuku = $content[$c]['idbuku'];
				$c++;
				$namabuku = $content[$c]['namabuku'];
				$c++;
				$pengarang = $content[$c]['pengarang'];
				$c++;
				$hargasewa = $content[$c]['hargasewa'];
				$c++;
				$lama = $content[$c]['lama'];
				$c++;
				
				
				date_default_timezone_set("UTC");
				$datestring = "%Y-%m-%d";
				$now = time();
				$ret=$now+(24*60*60*$lama);
				$temp = $this->peminjaman_model->save_line_transaction($idmember,$idbuku,$tipe,mdate($datestring,$now),mdate($datestring,$ret),$hargasewa);
		
			}
			
		}

		
		$temp = count($content)/5;
		
			if ($temp < 1){
				$m_data['notification_message']="You must enter your id book, please try again";
			}
			else{
				$m_data['notification_message'] = "Transaction successfully saved";
			}
		
		
		$this->load->view('admin/header.php',$h_data);
		$this->load->view('peminjaman/home.php',$m_data);
		$this->load->view('admin/footer.php',$f_data);
	}
}

/* End of file welcome.php */
/* Location: ./system/application/controllers/welcome.php */
?>