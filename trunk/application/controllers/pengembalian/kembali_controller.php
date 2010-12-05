<?php

class Kembali_controller extends Controller {

	function Kembali_controller()
	{
		parent::Controller();	
		$this->load->library('input');
		$this->load->model('pengembalian_model');
	}
	
	function index()
	{
		$this->session->set_userdata('current_menu','PENGEMBALIAN');
		$h_data['style']="simpel-herbal.css";
		$m_data['content'] = "";
		$m_data['notification_message'] = "";
		$f_data['author']="ade";
		
		$this->load->view('admin/header.php',$h_data);
		$this->load->view('pengembalian/home.php',$m_data);
		$this->load->view('admin/footer.php',$f_data);
	}
	
	function transaksi(){
		$h_data['style']="simpel-herbal.css";
		$f_data['author']="ade";
		$m_data['content'] = "";
		$this->load->view('admin/header.php',$h_data);
		
		$this->form_validation->set_rules('idmember','Id Member','required');
		
		if ($this->form_validation->run()==FALSE){
			$m_data['notification_message']="Input Invalid";
			
			$this->load->view('pengembalian/home.php',$m_data);
		}
		else{
			$idmember = $this->input->get_post('idmember');
			$temp = $this->pengembalian_model->validate_id($idmember);
			if ($temp == 0){
				$m_data['notification_message']="Member not found";
				$this->load->view('pengembalian/home.php',$m_data);
			}
			else{
				$data = $this->pengembalian_model->get_list($idmember);
				$temp = "";
				if ($data !=0){
					$id = 0;
					foreach ($data as $buku):
						$temp[$id] = $buku;
						$id++;
					endforeach;
					$m_data['content'] = $temp;
					$m_data['notification_message'] = "";
					$m_data['idmember'] = $idmember;
					$m_data['totaldenda'] = 0;
					$m_data['select'] = "";
					$this->load->view('pengembalian/transaksi.php',$m_data);
				}
				else{
					$m_data['notification_message']="Member don't have any book borrowed";
					$this->load->view('pengembalian/home.php',$m_data);
				}
			}
		}
		
		$this->load->view('admin/footer.php',$f_data);
	}
	
	function transaksiHitung(){
		$idmember = $this->input->get_post('idmember');
		$num = $this->input->get_post('num');
		$content = $this->input->get_post('data');
		
		$id = 0;
		$totaldenda = 0;
		$temp = "";
		if ($content >0){
			for ($c = 0 ; $c < $num * 7 ; ){
				$idbuku = $content[$c]['idbuku'];
				$c++;
				$namabuku = $content[$c]['namabuku'];
				$c++;
				$pengarang = $content[$c]['pengarang'];
				$c++;
				$hargasewa = $content[$c]['hargasewa'];
				$c++;
				$tglpinjam = $content[$c]['tglpinjam'];
				$c++;
				$lama = $content[$c]['lama'];
				$c++;
				$c++; // this add for status
				$id++;
				$check = $this->input->get_post('status'.$id);
				$select[$id] = $check;
				if ($check == TRUE){
					$hargadenda = 0.5 * $hargasewa;
					$totaldenda += $hargadenda;
				}
				$temp[$id-1] = array ('idbuku' => $idbuku, 'namabuku'=> $namabuku, 'pengarang' => $pengarang, 'hargasewa' => $hargasewa, 'tglpinjam' => $tglpinjam ,'lama' => $lama ,'status'=>$check);
			}
			
		}
		$m_data['select'] = $select;
		$m_data['content'] = $temp;
		$m_data['idmember'] = $idmember;
		$m_data['totaldenda'] = $totaldenda;
		$m_data['notification_message'] = "Denda Calculated for selected field";
		$h_data['style']="simpel-herbal.css";
		$f_data['author']="ade";
		$this->load->view('admin/header.php',$h_data);
		$this->load->view('pengembalian/transaksi.php',$m_data);
		$this->load->view('admin/footer.php',$f_data);
	}
		
	
	function transaksiSimpan(){
		$h_data['style']="simpel-herbal.css";
		$f_data['author']="ade";
		$m_data['content'] = "";
		
		$temp = "";
		$id=0;
		$idmember = $this->input->get_post('idmember');
		$num = $this->input->get_post('num');
		$content = $this->input->get_post('data');
		$select = $this->input->get_post('select');
	
		for ($c = 0 ; $c < $num * 7 ; ){
			$idbuku = $content[$c]['idbuku'];
			$c++;
			$namabuku = $content[$c]['namabuku'];
			$c++;
			$pengarang = $content[$c]['pengarang'];
			$c++;
			$hargasewa = $content[$c]['hargasewa'];
			$c++;
			$tglpinjam = $content[$c]['tglpinjam'];
			$c++;
			$lama = $content[$c]['lama'];
			$c++;
			$c++; // this add for status
			
			$check = $select[$id];
			if ($check == TRUE){
				$denda = 200000000;// denda belum neh
				date_default_timezone_set("UTC");
				$datestring = "%Y-%m-%d";
				$now = time();
				
				$temp = $this->pengembalian_model->save_line_transaction($idmember,$idbuku,$denda,mdate($datestring,$now));
			}
			$id++;
		}
		
		$m_data['notification_message'] = "Transaction successfully saved";
		$this->load->view('admin/header.php',$h_data);
		$this->load->view('pengembalian/home.php',$m_data);
		$this->load->view('admin/footer.php',$f_data);
	}
}

/* End of file welcome.php */
/* Location: ./system/application/controllers/welcome.php */
?>