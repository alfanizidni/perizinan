<?php 

/**
 * 
 */
class DataUji extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->model('Uji_Model');
		$this->load->model('Training_Model');
		$this->load->library('form_validation');
	}

	function index()
	{

		$data['training'] = $this->Training_Model->getAllData();
		$this->load->view('templates/header');
		$this->load->view('templates/sidebar');
		$this->load->view('uji/index', $data);
		$this->load->view('templates/footer');
	}

	public function hapus($id)
	{
		$this->Uji_Model->hapus_data($id);
		$this->session->set_flashdata('flash_uji', 'Dihapus');
		redirect('DataUji');
	}

	public function ubah($id)
	{

		$this->form_validation->set_rules("nama", "Nama ", "required");
		$this->form_validation->set_rules("jenis_izin", "Jenis Izin ", "required");
		$this->form_validation->set_rules("jarak_izin", "Jarak Izin ", "required");
		$this->form_validation->set_rules("lama_izin", "Lama Izin", "required");
		$this->form_validation->set_rules("pelanggaran", "Pelanggaran", "required");
		$this->form_validation->set_rules("terlambat_kembali", "Keterlambatan Kembali", "required");
		$this->form_validation->set_rules("nilai_rapor", "Nilai Rapor", "required");


		if ($this->form_validation->run() == FALSE)
		{
			$data['ubah']= $this->Uji_Model->detail_data($id);
			$this->load->view('templates/header');
			$this->load->view('templates/sidebar');
			$this->load->view('uji/ubah', $data);
			$this->load->view('templates/footer');
		}
		else
		{
			$this->Uji_Model->ubah_data();
			$this->session->set_flashdata('flash_uji', 'DiUbah');
			redirect('DataUji');
		} 
	}

	function hitung(){
 
		$output = "";
		$this->form_validation->set_rules("nama", "Nama ", "required");
		$this->form_validation->set_rules("jenis_izin", "Jenis Izin ", "required");
		$this->form_validation->set_rules("jarak_izin", "Jarak Izin ", "required");
		$this->form_validation->set_rules("lama_izin", "Lama Izin", "required");
		$this->form_validation->set_rules("pelanggaran", "Pelanggaran", "required");
		$this->form_validation->set_rules("terlambat_kembali", "Keterlambatan Kembali", "required");
		$this->form_validation->set_rules("nilai_rapor", "Nilai Rapor", "required");
		
		if ($this->form_validation->run() == FALSE)
		{
			$data['ubah']= $this->Uji_Model->detail_data();
			$this->load->view('templates/header');
			$this->load->view('templates/sidebar'); 
			$this->load->view('uji/ubah', $data);
			$this->load->view('templates/footer');
		}
		else
		{
			$jenis_izin = array();
			$jarak_izin = array();
			$lama_izin = array();
			$pelanggaran = array();
			$terlambat_kembali = array();
			$nilai_rapor = array();

			$jumlah_izin_ya = $this->Training_Model->count_izin_ya();
			$jumlah_izin_tidak = $this->Training_Model->count_izin_tidak();
			$total_training = $jumlah_izin_ya+$jumlah_izin_tidak;

			$jenis_izin = $this->Training_Model->Jenis_Izin($this->input->post('jenis_izin'));
			$jarak_izin = $this->Training_Model->Jarak_Izin($this->input->post('jarak_izin'));
			$lama_izin = $this->Training_Model->Lama_Izin($this->input->post('lama_izin'));
			$pelanggaran = $this->Training_Model->Pelanggaran($this->input->post('pelanggaran'));
			$terlambat_kembali = $this->Training_Model->Terlambat_Kembali($this->input->post('terlambat_kembali'));
			$nilai_rapor = $this->Training_Model->Nilai_Rapor($this->input->post('nilai_rapor'));

			// PERHITUNGAN LAPLACE CORRECTION 
			$jenis_izin_lpc = $this->Training_Model->Jenis_Izin_Laplace($this->input->post('jenis_izin'));
			$jarak_izin_lpc = $this->Training_Model->Jarak_Izin_Laplace($this->input->post('jarak_izin'));
			$lama_izin_lpc = $this->Training_Model->Lama_Izin_Laplace($this->input->post('lama_izin'));
			$pelanggaran_lpc = $this->Training_Model->Pelanggaran_Laplace($this->input->post('pelanggaran'));
			$terlambat_kembali_lpc = $this->Training_Model->Terlambat_Kembali_Laplace($this->input->post('terlambat_kembali'));
			$nilai_rapor_lpc = $this->Training_Model->Nilai_Rapor_Laplace($this->input->post('nilai_rapor'));

  //perhitungan //Step 1
			 
			

   //Step 1
   //tampil
   
			$PC1 = round($jumlah_izin_ya/($jumlah_izin_tidak+$jumlah_izin_ya), 4);
			$PC0 = round($jumlah_izin_tidak/($jumlah_izin_tidak+$jumlah_izin_ya), 4);

			$kelas_izin_ya = 
			round($jenis_izin['ya'],4)
			*round($jarak_izin['ya'], 4)
			*round($lama_izin['ya'], 4)
			*round($pelanggaran['ya'], 4)
			*round($terlambat_kembali['ya'], 4)
			*round($nilai_rapor['ya'], 4)*$PC1;


			$kelas_izin_tidak = 
			round($jenis_izin['tidak'],4)
			*round($jarak_izin['tidak'], 4)
			*round($lama_izin['tidak'], 4)
			*round($pelanggaran['tidak'], 4)
			*round($terlambat_kembali['tidak'], 4)
			*round($nilai_rapor['tidak'], 4)*$PC0;

			//cek nilai apakah probabilitas bernilai 0

			if($kelas_izin_ya==0||$kelas_izin_tidak==0){
				//masuk laplace correction
				
				$akhirjumlah_izin_ya=$jumlah_izin_ya+2;
				$akhirjumlah_izin_tidak=$jumlah_izin_tidak+2;
				$akhirtotal_training = $jumlah_izin_ya+$jumlah_izin_tidak+4;


				$akhirPC1 = round($akhirjumlah_izin_ya/(($jumlah_izin_tidak+$jumlah_izin_ya)+4), 2);
				$akhirPC0 = round($akhirjumlah_izin_tidak/(($jumlah_izin_tidak+$jumlah_izin_ya)+4), 2);

				$akhirkelas_izin_ya = 
				round($jenis_izin_lpc['ya'],4)
				*round($jarak_izin_lpc['ya'], 4)
				*round($lama_izin_lpc['ya'], 4)
				*round($pelanggaran_lpc['ya'], 4)
				*round($terlambat_kembali_lpc['ya'], 4)
				*round($nilai_rapor_lpc['ya'], 4)*$akhirPC1;

				$akhirkelas_izin_tidak = 
				round($jenis_izin_lpc['tidak'],4)
				*round($jarak_izin_lpc['tidak'], 4)
				*round($lama_izin_lpc['tidak'], 4)
				*round($pelanggaran_lpc['tidak'], 4)
				*round($terlambat_kembali_lpc['tidak'], 4)
				*round($nilai_rapor_lpc['tidak'], 4)*$akhirPC0;

				
				//pakai hasil perhitungan yang lama
				$akhirjenis_izin_ya = round($jenis_izin_lpc['ya'],4);
				$akhirjarak_izin_ya = round($jarak_izin_lpc['ya'],4);
				$akhirlama_izin_ya = round($lama_izin_lpc['ya'],4);
				$akhirpelanggaran_ya = round($pelanggaran_lpc['ya'],4);
				$akhirterlambat_ya = round($terlambat_kembali_lpc['ya'],4);
				$akhirrapor_ya = round($nilai_rapor_lpc['ya'],4);
				//tidak
				$akhirjenis_izin_tidak = round($jenis_izin_lpc['tidak'],4);
				$akhirjarak_izin_tidak = round($jarak_izin_lpc['tidak'],4);
				$akhirlama_izin_tidak = round($lama_izin_lpc['tidak'],4);
				$akhirpelanggaran_tidak = round($pelanggaran_lpc['tidak'],4);
				$akhirterlambat_tidak = round($terlambat_kembali_lpc['tidak'],4);
				$akhirrapor_tidak = round($nilai_rapor_lpc['tidak'],4);

			}else{
				//pakai hasil perhitungan yang lama
				$akhirjenis_izin_ya = round($jenis_izin['ya'],4);
				$akhirjarak_izin_ya = round($jarak_izin['ya'],4);
				$akhirlama_izin_ya = round($lama_izin['ya'],4);
				$akhirpelanggaran_ya = round($pelanggaran['ya'],4);
				$akhirterlambat_ya = round($terlambat_kembali['ya'],4);
				$akhirrapor_ya = round($nilai_rapor['ya'],4);
				//tidak
				$akhirjenis_izin_tidak = round($jenis_izin['tidak'],4);
				$akhirjarak_izin_tidak = round($jarak_izin['tidak'],4);
				$akhirlama_izin_tidak = round($lama_izin['tidak'],4);
				$akhirpelanggaran_tidak = round($pelanggaran['tidak'],4);
				$akhirterlambat_tidak = round($terlambat_kembali['tidak'],4);
				$akhirrapor_tidak = round($nilai_rapor['tidak'],4);

				$akhirPC0 = $PC0;
				$akhirPC1 = $PC1;
				$akhirkelas_izin_ya = $kelas_izin_ya;
				$akhirkelas_izin_tidak = $kelas_izin_tidak;
				$akhirjumlah_izin_ya=$jumlah_izin_ya;
				$akhirjumlah_izin_tidak=$jumlah_izin_tidak;
				$akhirtotal_training = $total_training;

			}

			$output .= "
			<table id='example1' class='table table-bordered table-striped'>
			<thead>
			<tr>
			<th>Jumlah Data</th>
			<th>Kelas PC1 (Izin Ya)</th>
			<th>Kelas PC0 (Izin Tidak)</th>
			</tr>
			<tr>
			<td>" .$akhirtotal_training. "</td>
			<td>" .$akhirjumlah_izin_ya. "</td>
			<td>" .$akhirjumlah_izin_tidak. "</td>
			</tr>
			</thead>
			</table>";

			$output .= "----Probabilitas Prior----<br>";
			$output .= "
			<table id='example1' class='table table-bordered table-striped'>
			<thead>
			<tr>
			<th>Kelas PC1(Izin Ya)</th>
			<th>Kelas PC0(Izin Tidak)</th>
			</tr>
			<tr>
			<td>" .$akhirPC1. "</td>
			<td>" .$akhirPC0. "</td>
			</tr>
			</thead>
			</table>";


   //step 2
			$output .= "----Probabilitas Data Uji----<br>";
			$output .= "
			<table id='example1' class='table table-bordered table-striped'>
			<thead>
			<tr>
			<th> </th>
			<th>Jenis Izin</th>
			<th>Jarak Izin</th>
			<th>Lama Izin</th>
			<th>Pelanggaran Santri</th>
			<th>Keterlambatan Kembali</th>
			<th>Nilai Rapor</th>
			<th>Hasil Probabilitas</th>
			</tr>

			<tr>
			<td>PC1 (Izin Ya)</th>
			<td>" .$akhirjenis_izin_ya. "</td>
			<td>" .$akhirjarak_izin_ya. "</td>
			<td>" .$akhirlama_izin_ya. "</td>
			<td>" .$akhirpelanggaran_ya. "</td>
			<td>" .$akhirterlambat_ya. "</td>
			<td>" .$akhirrapor_ya. "</td>			
			<td>" .$akhirkelas_izin_ya."</td>
			</tr>

			<tr>
			<td>PC0 (Izin Tidak)</th>
			<td>" .$akhirjenis_izin_tidak. "</td>
			<td>" .$akhirjarak_izin_tidak. "</td>
			<td>" .$akhirlama_izin_tidak. "</td>
			<td>" .$akhirpelanggaran_tidak. "</td>
			<td>" .$akhirterlambat_tidak. "</td>
			<td>" .$akhirrapor_tidak. "</td>
			<td>" .$akhirkelas_izin_tidak."</td>
			</tr>
			</thead>
			</table>";




			$kesimpulan = "";
			$operator="";

			echo "kelas ya".$akhirkelas_izin_ya."<br>";
			echo "kelas tidak".$akhirkelas_izin_tidak."<br>";

			echo "<br>";
			if ($akhirkelas_izin_ya >= $akhirkelas_izin_tidak) {
				$kesimpulan = "Ya Diperbolehkan";
				$operator = ">="; 
				$this->Training_Model->tambah_data_uji_ya();
			}else{
				$kesimpulan = "Tidak Diperbolehkan";
				$operator = "<=";
				$this->Training_Model->tambah_data_uji_tidak();
			}


			$output .= "<br>Dapat disimpulkan Bahwa Data Uji tersebut Santri ini  <b><u>".$kesimpulan."</u></b> Untuk mendapat IZIN dari Pengurus Perizinan ";

      // masukan hasil kesimpulan dalam parameter untuk di save
			// $this->Uji_Model->tambah_data($kesimpulan);
			$this->session->set_flashdata('flash_uji','dihitung' );
			$this->session->set_flashdata('flash_hitung', $output );
			// redirect('DataUji');
			echo $output;
			redirect('/DataUji/index');			
		} 
	}

	public function simpan_data_uji(){

		$this->Training_Model->tambah_data_uji();
	}




}
