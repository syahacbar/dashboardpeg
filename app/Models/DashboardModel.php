<?php
namespace App\Models;

class DashboardModel extends \App\Models\BaseModel
{
	public function __construct() {
		parent::__construct();
	}

	public function count_instansi()
	{
		$sql = 'SELECT ti.nama_instansi, COUNT(tp.id_instansi) AS jumlah_pegawai FROM tbl_pegawai tp RIGHT JOIN tbl_instansi ti ON ti.id_instansi=tp.id_instansi GROUP BY ti.id_instansi';
				
		$result = $this->db->query($sql)->getResult();
		return $result;
	}

	public function count_jenis_jabatan($jj)
	{
		if($jj == 'STR')
		{
			$sql = 'SELECT COUNT(tp.str_namajabatan) AS jumlah FROM tbl_pegawai tp WHERE tp.str_namajabatan <>""';
		}
		elseif ($jj == 'FU')
		{
			$sql = 'SELECT COUNT(tp.fung_namajabatan_fu) AS jumlah FROM tbl_pegawai tp WHERE tp.fung_namajabatan_fu <>""';
		} 
		elseif ($jj == 'FT')
		{
			$sql = 'SELECT COUNT(tp.fung_namajabatan_ft) AS jumlah FROM tbl_pegawai tp WHERE tp.fung_namajabatan_ft <>""';
		}
		
		$result = $this->db->query($sql)->getRow();
		return $result;
	}

	public function count_kedudukan_hukum()
	{
		$sql = 'SELECT tp.kedudukan_hukum, COUNT(tp.kedudukan_hukum) AS jumlah_pegawai FROM tbl_pegawai tp GROUP BY tp.kedudukan_hukum';
		$result = $this->db->query($sql)->getResult();
		return $result;
	}

	public function count_usulan_kp()
	{
		$sql = 'SELECT ti.nama_instansi, COUNT(tk.id_instansi) AS jumlah_pegawai FROM tbl_kenaikanpangkat tk RIGHT JOIN tbl_instansi ti ON ti.id_instansi=tk.id_instansi GROUP BY ti.id_instansi';
		$result = $this->db->query($sql)->getResult();
		return $result;
	}

	public function count_usulan_kp_by_status($status)
	{
		$sql = 'SELECT COUNT(tk.status) AS jumlah_status FROM tbl_kenaikanpangkat tk WHERE tk.status="'.$status.'"';
		$result = $this->db->query($sql)->getRow();
		return $result;
	}

	public function count_pegawai_all()
	{
		$sql = 'SELECT COUNT(id_pegawai) AS totalpegawai FROM tbl_pegawai';
		$result = $this->db->query($sql)->getRow();
		return $result;
	}

}