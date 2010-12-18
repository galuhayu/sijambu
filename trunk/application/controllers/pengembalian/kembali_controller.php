<?php
/**
*  class kembali_controller
*
* class yang digunakan sebagai controller yang mengatur pengembalian buku
*
*/
class Kembali_controller extends Controller {
	/**
	*
	*	Constructor
	*	
	*	mendefinisikan konstruktor kembali controller
	*	sekaligus meload library input dan model pengembalian model
	*/
	function Kembali_controller()
	{
		parent::Controller();	
		$this->load->library('input');
		$this->load->model('pengembalian_model');
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
		$this->session->set_userdata('current_menu','PENGEMBALIAN');
		$h_data['style']="simpel-herbal.css";
		$m_data['content'] = "";
		$m_data['notification_message'] = "";
		$f_data['author']="fasilkom 07";
		
		$this->load->view('admin/header.php',$h_data);
		$this->load->view('pengembalian/home.php',$m_data);
		$this->load->view('admin/footer.php',$f_data);
	}
	
	/**
	*
	*	fungsi transaksi
	*	adalah fungsi yang digunakan untuk mendapatkan id member inging melakukan pengembalian
	*	@param void
	*	@return void
	*/
	function transaksi(){
		$h_data['style']="simpel-herbal.css";
		$f_data['author']="fasilkom 07";
		$m_data['content'] = "";
		$this->load->view('admin/header.php',$h_data);
		
		//melakukan validation
		$this->form_validation->set_rules('idmember','Id Member','required|numeric');
		
		if ($this->form_validation->run()==FALSE){
			$m_data['notification_message']="Masukan tidak valid";
			
			$this->load->view('pengembalian/home.php',$m_data);
		}
		else{
			//get variable post
			$idmember = $this->input->get_post('idmember');
			$temp = $this->pengembalian_model->validate_id($idmember);
			if ($temp == 0){
				$m_data['notification_message']="Member tidak ditemukan";
				$this->load->view('pengembalian/home.php',$m_data);
			}
			else{
				//mengambil list berdasarkan idmember yang memiliki pinjaman buku dan ingin melakukan pengembalian
				$data = $this->pengembalian_model->get_list($idmember);
				$temp = "";
				if ($data !=0){
					$id = 0;
					foreach ($data as $buku):
						$temp[$id] = $buku;
						//hitung denda
						$temp[$id]['denda'] = 0;
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
					$m_data['notification_message']="Member tidak memiliki pinjaman buku yang belum dikembalikan";
					$this->load->view('pengembalian/home.php',$m_data);
				}
			}
		}
		
		$this->load->view('admin/footer.php',$f_data);
	}
	
	/**
	*
	*	fungsi transaksi hitung
	*	adalah fungsi yang digunakan untuk menghitung denda untuk buku yang akan dikembalikan
	*	@param void
	*	@return void
	*/
	function transaksiHitung(){
		$idmember = $this->input->get_post('idmember');
		$num = $this->input->get_post('num');
		$content = $this->input->get_post('data');
		
		$id = 0;
		$totaldenda = 0;
		$temp = "";
		$select = "";
		//untuk setiap entry yang telah dicek untuk pengembalian akan dihitung denda, sedangkan buku yang masih belum dikembalikan akan ditampilkan saja
		if ($content >0){
			for ($c = 0 ; $c < $num * 8 ; ){
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
				$c++; // this add for denda
				$id++;
				$check = $this->input->get_post('status'.$id);
				$select[$id] = $check;
				$denda = 0;
				if ($check == TRUE){
					date_default_timezone_set("UTC");
					$now = time();
					$q = strtotime($tglpinjam);
					//menghitung lama waktu telat
					$telat = floor (($now - $q) / (24 * 60 * 60)) - $lama;
					
					//menghitung denda
					if ($telat > 0 ){
						$denda = (0.1 * $hargasewa) * $telat;
					}
					
					$totaldenda += $denda;
				}
				$temp[$id-1] = array ('idbuku' => $idbuku, 'namabuku'=> $namabuku, 'pengarang' => $pengarang, 'hargasewa' => $hargasewa, 'tglpinjam' => $tglpinjam ,'lama' => $lama ,'status'=>$check, 'denda' => $denda);
			}
			
		}
		$m_data['select'] = $select;
		$m_data['content'] = $temp;
		$m_data['idmember'] = $idmember;
		$m_data['totaldenda'] = $totaldenda;
		$m_data['notification_message'] = "Denda untuk field yang dipilih telah dihitung";
		$h_data['style']="simpel-herbal.css";
		$f_data['author']="fasilkom 07";
		$this->load->view('admin/header.php',$h_data);
		$this->load->view('pengembalian/transaksi.php',$m_data);
		$this->load->view('admin/footer.php',$f_data);
	}
		
	/**
	*
	*	fungsi transaksi simpan
	*	adalah fungsi yang digunakan menyimpan transaksi pengembalian ke dalam database
	*	@param void
	*	@return void
	*/
	function transaksiSimpan(){
		$h_data['style']="simpel-herbal.css";
		$f_data['author']="fasilkom 07";
		$m_data['content'] = "";
		
		
			$temp = "";
			$id=0;
			$idmember = $this->input->get_post('idmember');
			$num = $this->input->get_post('num');
			$content = $this->input->get_post('data');
			$select = $this->input->get_post('select');
			
			//memproses semua line item untuk buku yang akan dikembalikan
		if ($select != "") {
			for ($c = 0 ; $c < $num * 8 ; ){
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
				$denda = $content[$c]['denda'];
				$c++; // this add for denda
				
				//menghitung denda dan mengubah status transaksi menjadi lunas
				$check = $select[$id];
				if ($check == TRUE){
					$denda = $denda;
					date_default_timezone_set("UTC");
					$datestring = "%Y-%m-%d";
					$now = time();
					
					$temp = $this->pengembalian_model->save_line_transaction($idmember,$idbuku,$denda,mdate($datestring,$now));
				}
				$id++;
			}
			
			$m_data['notification_message'] = "Transaksi berhasil disimpan";
		}
		else{
			$m_data['notification_message'] = "Transaksi gagal, tekan hitung denda baru disimpan";
		}
		$this->load->view('admin/header.php',$h_data);
		$this->load->view('pengembalian/home.php',$m_data);
		$this->load->view('admin/footer.php',$f_data);
	}
}

/* End of file welcome.php */
/* Location: ./system/application/controllers/welcome.php */
?>