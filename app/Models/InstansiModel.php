<?php
namespace App\Models;

class InstansiModel extends \App\Models\BaseModel
{
	public function __construct() {
		parent::__construct();
	}
	
	public function countAllData($where) {
		$sql = 'SELECT COUNT(*) AS jml FROM tbl_instansi ti LEFT JOIN user u ON u.id_user=ti.id_user '. $where;
		$result = $this->db->query($sql)->getRow();
		return $result->jml;
	}
	
	public function getListData($where) {

		$columns = $this->request->getPost('columns');
	    $searchName = @$this->request->getPost('search')['value'];

	    $search_arr = array();
	    $searchQuery = "";

	    //search
	    if($searchName != ''){
        $where .= ' AND (nip LIKE "%'.$searchName.'%" OR 
         nama LIKE "%'.$searchName.'%" OR 
         jabatan LIKE "%'.$searchName.'%" ) ';
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
		$sql = 'SELECT COUNT(*) AS jml_data FROM tbl_instansi ti LEFT JOIN user u ON u.id_user=ti.id_user ' . $where;
		$total_filtered = $this->db->query($sql)->getRowArray()['jml_data'];
		
		// Query Data
		$start = $this->request->getPost('start') ?: 0;
		$length = $this->request->getPost('length') ?: 10;
		if($length=="-1")
		{
			$sql = 'SELECT * FROM tbl_instansi ti LEFT JOIN user u ON u.id_user=ti.id_user ' . $where . ' ' . $order;
		}
		else
		{
			$sql = 'SELECT * FROM tbl_instansi ti LEFT JOIN user u ON u.id_user=ti.id_user ' . $where . ' ' . $order . ' LIMIT ' . $start . ', ' . $length;
		}
		$data = $this->db->query($sql)->getResultArray();
				
		return ['data' => $data, 'total_filtered' => $total_filtered];
	}
}