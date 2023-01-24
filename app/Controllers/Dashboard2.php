<?php
namespace App\Controllers;
use App\Models\HomeModel;

class Dashboard2 extends BaseController
{
	public function __construct() {
		parent::__construct();
		$this->model = new HomeModel;
		$this->addJs($this->config->baseURL . 'public/vendors/chartjs/chart.js');
		$this->addStyle($this->config->baseURL . 'public/vendors/material-icons/css.css');
		
		$this->addJs ( $this->config->baseURL . 'public/vendors/datatables/extensions/Buttons/js/dataTables.buttons.min.js');
		$this->addJs ( $this->config->baseURL . 'public/vendors/datatables/extensions/Buttons/js/buttons.bootstrap5.min.js');
		$this->addJs ( $this->config->baseURL . 'public/vendors/datatables/extensions/JSZip/jszip.min.js');
		$this->addJs ( $this->config->baseURL . 'public/vendors/datatables/extensions/pdfmake/pdfmake.min.js');
		$this->addJs ( $this->config->baseURL . 'public/vendors/datatables/extensions/pdfmake/vfs_fonts.js');
		$this->addJs ( $this->config->baseURL . 'public/vendors/datatables/extensions/Buttons/js/buttons.html5.min.js');
		$this->addJs ( $this->config->baseURL . 'public/vendors/datatables/extensions/Buttons/js/buttons.print.min.js');
		$this->addStyle ( $this->config->baseURL . 'public/vendors/datatables/extensions/Buttons/css/buttons.bootstrap5.min.css');
		
		$this->addStyle($this->config->baseURL . 'public/themes/modern/css/dashboard.css');
		$this->addJs($this->config->baseURL . 'public/themes/modern/js/dashboard.js');

		//untuk highchart
		$this->addStyle('https://code.highcharts.com/css/highcharts.css');
		$this->addJs('https://code.highcharts.com/highcharts.js');
		$this->addJs('https://code.highcharts.com/highcharts-3d.js');
		$this->addJs('https://code.highcharts.com/modules/exporting.js');
		$this->addJs('https://code.highcharts.com/modules/export-data.js');
		$this->addJs('https://code.highcharts.com/modules/accessibility.js');
		$this->addJs('https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.1.4/Chart.bundle.min.js');
	}

	public function index()
	{		
		$userdata = $_SESSION['user'];
		$id_instansi = SHA1($userdata['id_instansi']);
		$this->data['instansi'] = $this->model->get_data_by_instansi($id_instansi);
		$this->data['golru'] = $this->model->get_all_golru_by_instansi($id_instansi);
		$this->data['gender'] = $this->model->get_jenkel_by_instansi($id_instansi);
		$this->data['jenjab'] = $this->model->get_jenjab_by_instansi($id_instansi);
		$this->data['usulankp'] = $this->model->get_usulankp_by_instansi($id_instansi);
		$this->view('dashboard2.php', $this->data);
	}
}