<?php 

/**
 * 
 */
class Uji_Model extends CI_Model
{
	public function getAllData()
	{
		return $this->db->get('tbl_training')->result();
	}

	public function tambah_data($kesimpulan) 
	{
		$data = array(
			// 'id_training' => $this->input->post('id_training', true),
			'nama' => $this->input->post('nama', true),
			'jenis_izin' => $this->input->post('jenis_izin', true),
			'jarak_izin' => $this->input->post('jarak_izin', true),
			'lama_izin' => $this->input->post('lama_izin', true),
			'pelanggaran' => $this->input->post('pelanggaran', true),
			'terlambat_kembali' => $this->input->post('terlambat_kembali', true),
			'nilai_rapor' => $this->input->post('nilai_rapor', true),
			'status_izin' => $kesimpulan
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
}
?>