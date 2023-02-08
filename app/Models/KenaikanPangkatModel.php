<?php

namespace App\Models;

class KenaikanPangkatModel extends \App\Models\BaseModel
{
	private $fotoPath;
	
	public function __construct() {
		parent::__construct();
	}

	public function get_prosedurkp($id_instansi) {
		$sql = 'SELECT DISTINCT prosedur FROM tbl_kenaikanpangkat WHERE SHA1(id_instansi) = "'.$id_instansi.'"';
		$result = $this->db->query($sql)->getResult();
		return $result;
	}

	public function get_statuskp($id_instansi) {
		$sql = 'SELECT DISTINCT status FROM tbl_kenaikanpangkat WHERE SHA1(id_instansi) = "'.$id_instansi.'"';
		$result = $this->db->query($sql)->getResult();
		return $result;
	}

	public function get_satuankerja($id_instansi) {
		$sql = 'SELECT DISTINCT unit_kerja FROM tbl_kenaikanpangkat WHERE SHA1(id_instansi) = "'.$id_instansi.'"';
		$result = $this->db->query($sql)->getResult();
		return $result;
	}
	
	public function countAllData($where,$id_instansi) {
		$sql = 'SELECT COUNT(*) AS jml FROM tbl_kenaikanpangkat '. $where . ' AND SHA1(id_instansi) = "'.$id_instansi.'"';
		$result = $this->db->query($sql)->getRow();
		return $result->jml;
	}
	
	public function getListData($where,$id_instansi) {

		$columns = $this->request->getPost('columns');
	    $searchName = @$this->request->getPost('search')['value'];
		$searchJenisJabatan = $_POST['searchJenisJabatan'];
	    $searchProsedur = $_POST['searchProsedur'];
	    $searchStatusKP = $_POST['searchStatusKP'];
	    $searchSatuanKerja = $_POST['searchSatuanKerja'];

	    $search_arr = array();
	    $searchQuery = "";

	    //search
	    if($searchName != ''){
        $where .= ' AND (nip LIKE "%'.$searchName.'%" OR 
         nama LIKE "%'.$searchName.'%" OR 
         jabatan LIKE "%'.$searchName.'%" ) ';
		}

		if($searchJenisJabatan != ''){
		$where .= ' AND prosedur="'.$searchJenisJabatan.'" ';
		}

		if($searchProsedur != ''){
			if($searchProsedur == "prosedur1")
			{
				$where .= ' AND (pangkat = "IV/a" OR pangkat = "IV/b")';
			} 
			elseif ($searchProsedur == "prosedur2")
			{
				$where .= ' AND (pangkat = "III/d" OR pangkat= "III/c" OR pangkat= "III/b" OR pangkat= "III/a" OR pangkat= "II/d" OR pangkat= "II/c" OR pangkat= "II/b" OR pangkat= "II/a" OR pangkat= "I/d" OR pangkat= "I/c" OR pangkat= "I/b" OR pangkat= "I/a")';
			}
		// $where .= ' AND pangkat="'.$searchProsedur.'" ';
		}

		if($searchStatusKP != ''){
		$where .= ' AND status="'.$searchStatusKP.'" ';
		}

		if($searchSatuanKerja != ''){
		$where .= ' AND unit_kerja="'.$searchSatuanKerja.'" ';
		}

		if(count($search_arr) > 0){
		$where .= implode(" AND ",$search_arr);
		}

		
		
		// Order		
		$order_data = $this->request->getPost('order');
		$order = '';
		if (strpos($_POST['columns'][$order_data[0]['column']]['data'], 'ignore_search') === false) {
			$order_by = $columns[$order_data[0]['column']]['data'] . ' ' . strtoupper($order_data[0]['dir']);
			$order = ' ORDER BY ' . $order_by;
		}

		// Query Total Filtered
		$sql = 'SELECT COUNT(*) AS jml_data FROM tbl_kenaikanpangkat ' . $where. ' AND SHA1(id_instansi) = "'.$id_instansi.'"';
		$total_filtered = $this->db->query($sql)->getRowArray()['jml_data'];
		
		// Query Data
		$start = $this->request->getPost('start') ?: 0;
		$length = $this->request->getPost('length') ?: 10;
		$sql = 'SELECT *, LCASE(pangkat) AS pangkatkecil FROM tbl_kenaikanpangkat ' . $where . ' AND SHA1(id_instansi) = "' . $id_instansi . '" ' . $order . ' LIMIT ' . $start . ', ' . $length;
		$data = $this->db->query($sql)->getResultArray();
				
		return ['data' => $data, 'total_filtered' => $total_filtered];
	}
}
?>