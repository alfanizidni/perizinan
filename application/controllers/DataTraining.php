<?php 

/**
 * 
 */
class DataTraining extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('Training_Model');
		$this->load->library('form_validation');
	}
	
	function index()
	{
		$data['training'] = $this->Training_Model->getAllData();
		
		$this->load->view('templates/header');
		$this->load->view('templates/sidebar');
		$this->load->view('training/index', $data);
		$this->load->view('templates/footer');
	}

	public function validation_form(){
		
		$this->form_validation->set_rules("nama", "Nama ", "required");
		$this->form_validation->set_rules("jenis_izin", "Jenis Izin ", "required");
		$this->form_validation->set_rules("jarak_izin", "Jarak Izin ", "required");
		$this->form_validation->set_rules("lama_izin", "Lama Izin", "required");
		$this->form_validation->set_rules("pelanggaran", "Pelanggaran", "required");
		$this->form_validation->set_rules("terlambat_kembali", "Keterlambatan Kembali", "required");
		$this->form_validation->set_rules("nilai_rapor", "Nilai Rapor", "required");

		if ($this->form_validation->run() == FALSE)
		{
			$this->index();
		} 
		else
		{
			$this->Training_Model->tambah_data();
			$this->session->set_flashdata('flash_training', 'Disimpan');
			redirect('DataTraining');
		}	
	}

	public function hapus($id)
	{
		$this->Training_Model->hapus_data($id);
		$this->session->set_flashdata('flash_training', 'Dihapus');
		redirect('DataTraining');
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
		$this->form_validation->set_rules("status_izin", "Status Izin", "required");

		if ($this->form_validation->run() == FALSE)
		{
			$data['ubah']= $this->Training_Model->detail_data($id);
			$this->load->view('templates/header');
			$this->load->view('templates/sidebar');
			$this->load->view('training/ubah', $data);
			$this->load->view('templates/footer');
		}
		else
		{
			$this->Training_Model->ubah_data();
			$this->session->set_flashdata('flash_training', 'DiUbah');
			redirect('DataTraining');
		}	
	}


}
?>