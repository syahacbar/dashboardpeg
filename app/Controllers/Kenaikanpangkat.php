<?php
namespace App\Controllers; 
use App\Models\KenaikanPangkatModel;

class Kenaikanpangkat extends BaseController
{

	public function __construct() {
		
		parent::__construct(); 
		
		$this->model = new KenaikanPangkatModel;	
		$this->data['site_title'] = 'Image Upload';
		
		$this->addJs ( $this->config->baseURL . 'public/vendors/bootstrap-datepicker/js/bootstrap-datepicker.js' );
		$this->addJs ( $this->config->baseURL . 'public/themes/modern/js/date-picker.js');
		$this->addJs ( $this->config->baseURL . 'public/themes/modern/js/image-upload.js');
		$this->addJs ( $this->config->baseURL . 'public/themes/modern/js/data-tables-ajax.js');
		$this->addStyle ( $this->config->baseURL . 'public/vendors/bootstrap-datepicker/css/bootstrap-datepicker3.css');
	}
	

	public function index()
	{
		$this->cekHakAkses('read_data');
		
		$data = $this->data;
		// if (!empty($_POST['delete'])) 
		// {
		// 	$this->cekHakAkses('delete_data', 'tbl_kenaikanpangkat');
			
		// 	$result = $this->model->deleteData();
		// 	// $result = true;
		// 	if ($result) {
		// 		$data['msg'] = ['status' => 'ok', 'message' => 'Data Mahasiswa berhasil dihapus'];
		// 	} else {
		// 		$data['msg'] = ['status' => 'error', 'message' => 'Data Mahasiswa gagal dihapus'];
		// 	}
		// }
		$this->view('kenaikanpangkat.php', $data);
	}

	public function getDataDT() {
		
		$this->cekHakAkses('read_data');

		$userdata = $_SESSION['user'];
		$id_instansi = SHA1($userdata['id_instansi']);
		
		$num_data = $this->model->countAllData($this->whereOwn(),$id_instansi);
		$result['draw'] = $start = $this->request->getPost('draw') ?: 1;
		$result['recordsTotal'] = $num_data;
		
		$query = $this->model->getListData($this->whereOwn(),$id_instansi);
		$result['recordsFiltered'] = $query['total_filtered'];
				
		helper('html');
		
		$no = $this->request->getPost('start') + 1 ?: 1;
		foreach ($query['data'] as $key => &$val) 
		{
			$image = 'noimage.png';
			// if ($val['foto']) {
			// 	if (file_exists('public/images/foto/' . $val['foto'])) {
			// 		$image = $val['foto'];
			// 	}
			// }
			
			// $val['ignore_search_foto'] = '<div class="list-foto"><img src="'. $this->config->baseURL.'public/images/foto/' . $image . '"/></div>';
			// $val['tgl_lahir'] = $val['tempat_lahir'] . ', '. format_tanggal($val['tgl_lahir']);
			
			$val['ignore_search_urut'] = $no;
			$val['ignore_search_action'] = btn_action([
									'edit' => ['url' => $this->config->baseURL . $this->currentModule['nama_module'] . '/edit?id='. $val['id']]
								, 'delete' => ['url' => ''
												, 'id' =>  $val['id']
												, 'delete-title' => 'Hapus data mahasiswa: <strong>'.$val['nama'].'</strong> ?'
											]
							]);
			$no++;
		}
					
		$result['data'] = $query['data'];
		echo json_encode($result); exit();
	}
}