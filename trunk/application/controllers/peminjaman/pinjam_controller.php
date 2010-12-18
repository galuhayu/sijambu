<?php
/**
*  class pinjam_controller
*
* class yang digunakan sebagai controller yang mengatur peminjaman buku
*
*/
class Pinjam_controller extends Controller {
	/**
	*
	*	Constructor
	*	
	*	mendefinisikan konstruktor pinjam controller
	*	sekaligus meload library input dan model peminjaman model
	*/
	function Pinjam_controller()
	{
		parent::Controller();	
		$this->load->library('input');
		$this->load->model('peminjaman_model');
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
		$this->session->set_userdata('current_menu','PEMINJAMAN');
		$h_data['style']="simpel-herbal.css";
		$m_data['content'] = "";
		$m_data['notification_message'] = "";
		$f_data['author']="fasilkom 07";
		
		$this->load->view('admin/header.php',$h_data);
		$this->load->view('peminjaman/home.php',$m_data);
		$this->load->view('admin/footer.php',$f_data);
	}
	
	/**
	*
	*	fungsi transaksi
	*	adalah fungsi yang digunakan untuk mendapatkan id member inging melakukan peminjaman
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
			
			$this->load->view('peminjaman/home.php',$m_data);
		}
		else{
			//get variable post
			$idmember = $this->input->get_post('idmember');
			$tipe = $this->input->get_post('tipe');
			if ($tipe == 'bacatempat'){
				$tipe = 1;
			}
			else {
				$tipe = 2;
			}
			
			//melakukan validasi id member yang didapat dari form bila sesuai lanjut ke halaman transaksi , jika tidak kembali ke halaman home
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
	
	/**
	*
	*	fungsi transaksi tambah
	*	adalah fungsi yang digunakan untuk menambah buku yang akan dipinjam 
	*	@param void
	*	@return void
	*/
	function transaksiTambah(){
		//validasi idbuku yang akan dipinjam
		$this->form_validation->set_rules('idbuku','Id Buku','required|numeric');
		
		$idmember = $this->input->get_post('idmember');
		$tipe = $this->input->get_post('tipe');
		
		$num = $this->input->get_post('num');
		
		//untuk setiap buku yang telah ditambahkan tapi belum disimpan diproses ulang dalam bentuk array supaya dapat muncul secara bersama - sama
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
			$m_data['notification_message']="Masukan tidak valid";
			$m_data['content'] = "";
		}
		else{
			$idbuku = $this->input->get_post('idbuku');
			
			//untuk id buku yang akan dipinjam akan dicari di database kemudian dilakukan perhitungan biaya yang dikenakan
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
		$f_data['author']="fasilkom 07";
		$this->load->view('admin/header.php',$h_data);
		$this->load->view('peminjaman/transaksi.php',$m_data);
		$this->load->view('admin/footer.php',$f_data);
	}
	
	
	/**
	*
	*	fungsi transaksi simpan
	*	adalah fungsi yang digunakan menyimpan transaksi peminjaman ke dalam database
	*	@param void
	*	@return void
	*/
	function transaksiSimpan(){
		$h_data['style']="simpel-herbal.css";
		$f_data['author']="fasilkom 07";
		$m_data['content'] = "";
		$idmember = $this->input->get_post('idmember');
		$tipe = $this->input->get_post('tipe');
		$num = $this->input->get_post('num');
		$content = $this->input->get_post('data');
		$temp = "";
		
		//untuk setiap row di table akan dimasukkan ke dalam table transaksi di database
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
				
				//memanggil fungsi save_line_transaction untuk menyimpan transaksi 1 buku yang ada di tabel peminjaman
				$temp = $this->peminjaman_model->save_line_transaction($idmember,$idbuku,$tipe,mdate($datestring,$now),mdate($datestring,$ret),$hargasewa);
		
			}
			
		}

		
		$temp = count($content)/5;
		
			if ($temp < 1){
				$m_data['notification_message']="Masukan id buku, silahkan coba lagi";
			}
			else{
				$m_data['notification_message'] = "Transaksi berhasil disimpan";
			}
		
		
		$this->load->view('admin/header.php',$h_data);
		$this->load->view('peminjaman/home.php',$m_data);
		$this->load->view('admin/footer.php',$f_data);
	}
}

/* End of file welcome.php */
/* Location: ./system/application/controllers/welcome.php */
?>