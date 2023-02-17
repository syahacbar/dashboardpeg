<?php
/**
*	App Name	: Admin Template Dashboard Codeigniter 4	
*	Developed by: Agus Prawoto Hadi
*	Website		: https://jagowebdev.com
*	Year		: 2021-2022
*/

namespace App\Models;

class MultipleFileuploadModel extends \App\Models\BaseModel
{
	private $path = ROOTPATH . 'public/files/dokumen/';
	
	public function getData() {
		
		//  DISTINCT nama_file => Link nama file nya meleset 		
		$sql = 'SELECT *
						, GROUP_CONCAT(DISTINCT nama_penghadap) AS nama_penghadap
						, GROUP_CONCAT(DISTINCT nama_penanggung_jawab) AS nama_penanggung_jawab
				FROM akta
				LEFT JOIN akta_penghadap USING (id_akta)
				LEFT JOIN akta_file USING (id_akta)
				LEFT JOIN penghadap USING (id_penghadap)
				LEFT JOIN akta_penanggung_jawab USING (id_akta)
				LEFT JOIN penanggung_jawab USING (id_penanggung_jawab)
				
				GROUP BY id_akta ORDER BY id_akta DESC';
		
		$data_akta = $this->db->query($sql)->getResultArray();
		$akta_file = [];
		
		if ($data_akta) {
			$data['akta_file'] = [];

			foreach ($data_akta as $val) {
				$id_akta[] = $val['id_akta'];
			}
			
			$sql = 'SELECT *
					FROM akta_file
					WHERE id_akta IN (' . join(',', $id_akta) . ')';
			
			$file = $this->db->query($sql)->getResultArray();
			
			foreach ($file as $val) {
				$akta_file[$val['id_akta']][$val['id_akta_file']] = $val;
			}
		}
				
		$result['data_akta'] = $data_akta;
		$result['akta_file'] = $akta_file;
		return $result;
	}
	
	
	public function getAkta($id) { 
		$sql = 'SELECT * FROM akta WHERE id_akta = ?';
		$result = $this->db->query($sql, trim($id))->getResultArray();
		return $result;
	}
	
	public function getAktaPenanggungJawab($id) {
		$sql = 'SELECT id_penanggung_jawab FROM akta_penanggung_jawab WHERE id_akta = ?';
		$result = $this->db->query($sql, trim($id))->getResultArray();
		return $result;
	}
	
	public function getAktaPenghadap($id) {
		$sql = 'SELECT id_penghadap FROM akta_penghadap WHERE id_akta = ?';
		$result = $this->db->query($sql, trim($id))->getResultArray();
		return $result;
	}
	
	public function getAktaFile($id) {
		$sql = 'SELECT * FROM akta_file WHERE id_akta = ?';
		$result = $this->db->query($sql, trim($id))->getResultArray();
		return $result;
	}
	
	public function getPenghadap() {
		$sql = 'SELECT * FROM penghadap';
		$result = $this->db->query($sql)->getResultArray();
		return $result;
	}
	
	public function getPenanggungJawab() {
		$sql = 'SELECT * FROM penanggung_jawab';
		$result = $this->db->query($sql)->getResultArray();
		return $result;
	}
	
	public function saveData() 
	{
		helper('upload_file');
		$this->db->transStart();
				
		list($tanggal, $bulan, $tahun) = explode('-', $_POST['tgl_akta']);
		$data_db['no_akta'] = $_POST['no_akta'];
		$data_db['tgl_akta'] = $tahun . '-' . $bulan . '-' . $tanggal;
		$data_db['nama_akta'] = $_POST['nama_akta'];
		$data_db['nama_customer'] = $_POST['nama_customer'];
		$data_db['minuta'] = $_POST['minuta'];
		
		// EDIT
		if (!empty($_POST['id'])) 
		{
			if (@$_POST['delete_current_file']) {
				foreach ($_POST['delete_current_file'] as $key => $val) {

					// Hapus file

					if ($val == 1) {
						\delete_file ($this->path . $_POST['current_file_nama_file'][$key]);
						$result = $this->db->table('akta_file')->delete(['id_akta_file' => $_POST['current_file_id_akta_file'][$key]] );
					} else {
					
					// Edit file
						$data_db_file = [
									'judul_file' => $_POST['judul_file_edit'][$key]
									,'deskripsi_file' => $_POST['deskripsi_file_edit'][$key]
									,'nama_file' => $_POST['nama_file_edit'][$key]
								];
								
						if ($_POST['nama_file_edit'][$key] != $_POST['current_file_nama_file'][$key]) {
							if (file_exists($this->path . $_POST['current_file_nama_file'][$key])) {
								rename($this->path . $_POST['current_file_nama_file'][$key], $this->path . $_POST['nama_file_edit'][$key]);
							}
						}
						
						$query = $this->db->table('akta_file')->update($data_db_file, 'id_akta_file = ' . $_POST['current_file_id_akta_file'][$key]);
					}
				}
				
			}
			
			$query  = $this->db->table('akta')->update($data_db, 'id_akta = ' . $_POST['id']);
			$result = $this->db->table('akta_penghadap')->delete(['id_akta' => $_POST['id']]);
			$result = $this->db->table('akta_penanggung_jawab')->delete(['id_akta' => $_POST['id']]);
			
			$id_akta = $_POST['id'];
			
		} else {
			$query = $this->db->table('akta')->insert($data_db);
			$id_akta = $newid = $this->db->insertID();
		}
		
		$file_name = '';

		if (!empty($_FILES['nama_file']['name'])) 
		{
			$data_db_file = [];
			foreach($_FILES['nama_file']['name'] as $key => $val) 
			{
				// IF template input
				if ($key == 0)
					continue;
				
				$file_upload = ['name' => $_FILES['nama_file']['name'][$key], 'tmp_name' => $_FILES['nama_file']['tmp_name'][$key]];
				
				$file_name = \upload_file($this->path, $file_upload);
				if (!is_dir($this->path)) {
					if (!mkdir($this->path, 0777, true)) {
						$data['msg']['status'] = 'error';
						$form_errors['file'] = 'Unable to create a directory: ' . $this->path;
					}
				}
				$data_db_file[] = ['id_akta' => $id_akta
									,'judul_file' => $_POST['judul_file'][$key]
									,'deskripsi_file' => $_POST['deskripsi_file'][$key]
									,'nama_file' => $val
								];
				
			}
			if (!empty($data_db_file)) {
				$query = $this->db->table('akta_file')->insertBatch($data_db_file);
			}
		}
		
		foreach ($_POST['id_penghadap'] as $val) {
			$data_db_penghadap[] = ['id_akta' => $id_akta, 'id_penghadap' => $val];
		}
		
		$query = $this->db->table('akta_penghadap')->insertBatch($data_db_penghadap);
		foreach ($_POST['id_penanggung_jawab'] as $val) {
			$data_db_pj[] = ['id_akta' => $id_akta, 'id_penanggung_jawab' => $val];
		}
		$query = $this->db->table('akta_penanggung_jawab')->insertBatch($data_db_pj);
		
		$query = $this->db->transComplete();
		$result = $this->db->transStatus();
		
		if ($result)
			return $id_akta;
		
		return false;
	}
	
	public function deleteData() {
		
		$sql = 'SELECT * FROM akta_file WHERE id_akta = ' . $_POST['id'];
		$query_file = $this->db->query($sql)->result();
					
		if ($query_file) {
			foreach ($query_file as $val) {
				unlink ($this->path . $val['nama_file']);
			}
		}
		
		$this->db->transStart();
		$result = $this->db->table('akta')->delete(['id_akta' => $_POST['id']]);
		$result = $this->db->table('akta_penghadap')->delete(['id_akta' => $_POST['id']]);
		$result = $this->db->table('akta_file')->delete(['id_akta' => $_POST['id']]);
		$this->db->transComplete();
		$result = $this->db->transStatus();
			
		return $result;
	}
}
?>