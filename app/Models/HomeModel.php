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

	public function get_data_by_instansi($id_instansi) {
		$sql = 'SELECT * FROM tbl_instansi ti WHERE SHA1(ti.id_instansi)="'.$id_instansi.'"';
		$result = $this->db->query($sql)->getRow();
		return $result;
	}

	public function get_all_golru_by_instansi($id_instansi)
	{
		$sql = 'SELECT golru,COUNT(golru) AS jum_golru FROM tbl_pegawai WHERE SHA1(id_instansi)="'.$id_instansi.'" GROUP BY golru';
		$result = $this->db->query($sql)->getResult();
		return $result;
	}

	public function get_jenkel_by_instansi($id_instansi)
	{
		$sql = 'SELECT IF (tp.jk ="L","Laki-Laki","Perempuan") AS gender, COUNT(tp.jk) AS jum_gender FROM tbl_pegawai tp WHERE SHA1(tp.id_instansi)="'.$id_instansi.'" GROUP BY tp.jk DESC';
		$result = $this->db->query($sql)->getResult();
		return $result;
	}


	public function get_jenjab_by_instansi($id_instansi)
	{
		$sql = 'SELECT tp.jenis_jabatan AS jj, COUNT(tp.jenis_jabatan) AS jum_jj FROM tbl_pegawai tp WHERE SHA1(tp.id_instansi)="'.$id_instansi.'" GROUP BY tp.jenis_jabatan';
		$result = $this->db->query($sql)->getResult();
		return $result;
	}

	public function get_usulankp_by_instansi($id_instansi)
	{
		$sql = 'SELECT tkp.status, COUNT(tkp.status) AS jum_ukp FROM tbl_kenaikanpangkat tkp WHERE SHA1(tkp.id_instansi)="'.$id_instansi.'" GROUP BY tkp.status';
		$result = $this->db->query($sql)->getResult();
		return $result;
	}
	
}