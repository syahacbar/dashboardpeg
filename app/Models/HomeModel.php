<?php
namespace App\Models;

class HomeModel extends \App\Models\BaseModel
{
	public function __construct() {
		parent::__construct();
	}
	
	public function get_all_data_by_instansi() {
		$sql = 'SELECT ti.*, (SELECT COUNT(tp.id_pegawai) AS totpegawai FROM tbl_pegawai tp WHERE tp.id_instansi=ti.id_instansi) AS TotPegawai FROM tbl_instansi ti';
		$result = $this->db->query($sql)->getResult();
		return $result;
	}


	
}