<?php 

/**
 * 
 */
class Training_Model extends CI_Model
{
	public function getAllData()
	{
		return $this->db->get('tbl_training')->result();
	}

	public function tambah_data( )
	{
		$data = array(

			'nama' => $this->input->post('nama', true),
			'jenis_izin' => $this->input->post('jenis_izin', true),
			'jarak_izin' => $this->input->post('jarak_izin', true),
			'lama_izin' => $this->input->post('lama_izin', true),
			'pelanggaran' => $this->input->post('pelanggaran', true),
			'terlambat_kembali' => $this->input->post('terlambat_kembali', true),
			'nilai_rapor' => $this->input->post('nilai_rapor', true),
			'status_izin' => $this->input->post('status_izin', true)
		);

		$this->db->insert('tbl_training', $data);
	}

	public function tambah_data_uji_ya( )
	{
		$data = array(
			
			'nama' => $this->input->post('nama', true),
			'jenis_izin' => $this->input->post('jenis_izin', true),
			'jarak_izin' => $this->input->post('jarak_izin', true),
			'lama_izin' => $this->input->post('lama_izin', true),
			'pelanggaran' => $this->input->post('pelanggaran', true),
			'terlambat_kembali' => $this->input->post('terlambat_kembali', true),
			'nilai_rapor' => $this->input->post('nilai_rapor', true),
			'status_izin' => 'Ya'
		);

		$this->db->insert('tbl_training', $data);
	}

	public function tambah_data_uji_tidak( )
	{
		$data = array(
			
			'nama' => $this->input->post('nama', true),
			'jenis_izin' => $this->input->post('jenis_izin', true),
			'jarak_izin' => $this->input->post('jarak_izin', true),
			'lama_izin' => $this->input->post('lama_izin', true),
			'pelanggaran' => $this->input->post('pelanggaran', true),
			'terlambat_kembali' => $this->input->post('terlambat_kembali', true),
			'nilai_rapor' => $this->input->post('nilai_rapor', true),
			'status_izin' => 'Tidak'
		);

		$this->db->insert('tbl_training', $data);
	}

	public function ubah_data( )
	{
		$data = array(
			'nama' => $this->input->post('nama', true),
			'jenis_izin' => $this->input->post('jenis_izin', true),
			'jarak_izin' => $this->input->post('jarak_izin', true),
			'lama_izin' => $this->input->post('lama_izin', true),
			'pelanggaran' => $this->input->post('pelanggaran', true),
			'terlambat_kembali' => $this->input->post('terlambat_kembali', true),
			'nilai_rapor' => $this->input->post('nilai_rapor', true),
			'status_izin' => $this->input->post('status_izin', true)
		);
		$this->db->where('id_training', $this->input->post('id_training', true));
		$this->db->update('tbl_training', $data);
	}

	public function hapus_data($id)
	{
		$this->db->delete('tbl_training', ['id_training' => $id]);
	}

	public function detail_data($id)
	{
		return $this->db->get_where('tbl_training', ['id_training' => $id]) ->row_array(); 
	}

	public function count_izin_ya()
	{
		$this->db->where('status_izin', 'Ya');
		$this->db->from('tbl_training');
		return $this->db->count_all_results();
	}

	public function count_izin_tidak()
	{
		$this->db->where('status_izin', 'Tidak');
		$this->db->from('tbl_training');
		return $this->db->count_all_results();
	}

	// ambil probabilitas Jenis Izin
	public function Jenis_Izin($status)
	{
		// $status = "izin ya";
		$this->db->where('jenis_izin', $status);
		$this->db->where('status_izin', "Ya");
		$this->db->from('tbl_training');
		$ya = $this->db->count_all_results()/$this->count_izin_ya();	
		
		// $status = "izin tidak";
		$this->db->where('jenis_izin', $status);
		$this->db->where('status_izin', "Tidak");
		$this->db->from('tbl_training');
		$tidak = $this->db->count_all_results()/$this->count_izin_tidak();
		return array('ya' => $ya, 'tidak' => $tidak);
		
	}

	public function Jarak_Izin($status)
	{
		// $status = "jarak ya";
		$this->db->where('jarak_izin', $status);
		$this->db->where('status_izin', "Ya");
		$this->db->from('tbl_training');
		$ya = $this->db->count_all_results()/$this->count_izin_ya();	
		
		// $status = "jarak tidak";
		$this->db->where('jarak_izin', $status);
		$this->db->where('status_izin', "Tidak");
		$this->db->from('tbl_training');
		$tidak = $this->db->count_all_results()/$this->count_izin_tidak();
		return array('ya' => $ya, 'tidak' => $tidak);	
	}

	public function Lama_Izin($status)
	{
		// $status = "lama ya";
		$this->db->where('lama_izin', $status);
		$this->db->where('status_izin', "Ya");
		$this->db->from('tbl_training');
		$ya = $this->db->count_all_results()/$this->count_izin_ya();
		
		// $status = "lama tidak";
		$this->db->where('lama_izin', $status);
		$this->db->where('status_izin', "Tidak");
		$this->db->from('tbl_training');
		$tidak = $this->db->count_all_results()/$this->count_izin_tidak();
		return array('ya' => $ya, 'tidak' => $tidak);	
	}

	public function Pelanggaran($status)
	{
		// $status = "pelanggaran ya";
		$this->db->where('pelanggaran', $status);
		$this->db->where('status_izin', "Ya");
		$this->db->from('tbl_training');
		$ya = $this->db->count_all_results()/$this->count_izin_ya();
		
		// $status = "pelanggaran tidak";
		$this->db->where('pelanggaran', $status);
		$this->db->where('status_izin', "Tidak");
		$this->db->from('tbl_training');
		$tidak = $this->db->count_all_results()/$this->count_izin_tidak();
		return array('ya' => $ya, 'tidak' => $tidak);	
	}

	public function Terlambat_Kembali($status)
	{	
		// $status = "terlambat ya";
		$this->db->where('terlambat_kembali', $status);
		$this->db->where('status_izin', "Ya");
		$this->db->from('tbl_training');
		$ya = $this->db->count_all_results()/$this->count_izin_ya();
		
		// $status = "terlambat_kembali tidak";
		$this->db->where('terlambat_kembali', $status);
		$this->db->where('status_izin', "Tidak");
		$this->db->from('tbl_training');
		$tidak = $this->db->count_all_results()/$this->count_izin_tidak();
		return array('ya' => $ya, 'tidak' => $tidak);	
	}

	public function Nilai_Rapor($status)
	{
		// $status = "rapor ya";
		$this->db->where('nilai_rapor', $status);
		$this->db->where('status_izin', "Ya");
		$this->db->from('tbl_training');
		$ya = $this->db->count_all_results()/$this->count_izin_ya();
		
		// $status = "rapor tidak";
		$this->db->where('nilai_rapor', $status);
		$this->db->where('status_izin', "Tidak");
		$this->db->from('tbl_training');
		$tidak = $this->db->count_all_results()/$this->count_izin_tidak();
		return array('ya' => $ya, 'tidak' => $tidak);	
	}

	// PERHITUNGAN LAPLACE CORRECTION

	// ambil probabilitas Jenis Izin laplace 
	public function Jenis_Izin_Laplace($status)
	{
		// $status = "izin ya";
		$this->db->where('jenis_izin', $status);
		$this->db->where('status_izin', "Ya");
		$this->db->from('tbl_training');
		$ya = ($this->db->count_all_results()+1)/($this->count_izin_ya()+1);	
		
		// $status = "izin tidak";
		$this->db->where('jenis_izin', $status);
		$this->db->where('status_izin', "Tidak");
		$this->db->from('tbl_training');
		$tidak = ($this->db->count_all_results()+1)/($this->count_izin_tidak()+1);
		return array('ya' => $ya, 'tidak' => $tidak);
	}

	public function Jarak_Izin_Laplace($status)
	{
		// $status = "jarak ya";
		$this->db->where('jarak_izin', $status);
		$this->db->where('status_izin', "Ya");
		$this->db->from('tbl_training');
		$ya = ($this->db->count_all_results()+1)/($this->count_izin_ya()+1);	
		
		// $status = "jarak tidak";
		$this->db->where('jarak_izin', $status);
		$this->db->where('status_izin', "Tidak"); 
		$this->db->from('tbl_training');
		$tidak = ($this->db->count_all_results()+1)/($this->count_izin_tidak()+1);
		return array('ya' => $ya, 'tidak' => $tidak);	
	}

	public function Lama_Izin_Laplace($status)
	{
		// $status = "lama ya";
		$this->db->where('lama_izin', $status);
		$this->db->where('status_izin', "Ya");
		$this->db->from('tbl_training');
		$ya = ($this->db->count_all_results()+1)/($this->count_izin_ya()+1);
		
		// $status = "lama tidak";
		$this->db->where('lama_izin', $status);
		$this->db->where('status_izin', "Tidak");
		$this->db->from('tbl_training');
		$tidak = ($this->db->count_all_results()+1)/($this->count_izin_tidak()+1);
		return array('ya' => $ya, 'tidak' => $tidak);	
	}

	public function Pelanggaran_Laplace($status)
	{
		// $status = "pelanggaran ya";
		$this->db->where('pelanggaran', $status);
		$this->db->where('status_izin', "Ya");
		$this->db->from('tbl_training');
		$ya = ($this->db->count_all_results()+1)/($this->count_izin_ya()+1);
		
		// $status = "pelanggaran tidak";
		$this->db->where('pelanggaran', $status);
		$this->db->where('status_izin', "Tidak");
		$this->db->from('tbl_training');
		$tidak = ($this->db->count_all_results()+1)/($this->count_izin_tidak()+1);
		return array('ya' => $ya, 'tidak' => $tidak);	
	}

	public function Terlambat_Kembali_Laplace($status)
	{	
		// $status = "terlambat ya";
		$this->db->where('terlambat_kembali', $status);
		$this->db->where('status_izin', "Ya");
		$this->db->from('tbl_training');
		$ya = ($this->db->count_all_results()+1)/($this->count_izin_ya()+1);
		
		// $status = "terlambat_kembali tidak";
		$this->db->where('terlambat_kembali', $status);
		$this->db->where('status_izin', "Tidak");
		$this->db->from('tbl_training');
		$tidak = ($this->db->count_all_results()+1)/($this->count_izin_tidak()+1);
		return array('ya' => $ya, 'tidak' => $tidak);	
	}

	public function Nilai_Rapor_Laplace($status)
	{
		// $status = "rapor ya";
		$this->db->where('nilai_rapor', $status);
		$this->db->where('status_izin', "Ya");
		$this->db->from('tbl_training');
		$ya = ($this->db->count_all_results()+1)/($this->count_izin_ya()+1);
		
		// $status = "rapor tidak";
		$this->db->where('nilai_rapor', $status);
		$this->db->where('status_izin', "Tidak");
		$this->db->from('tbl_training');
		$tidak = ($this->db->count_all_results()+1)/($this->count_izin_tidak()+1);
		return array('ya' => $ya, 'tidak' => $tidak);	
	}
}
?>