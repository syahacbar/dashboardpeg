<?php

namespace App\Controllers;

use App\Models\DashboardModel;

class Dashboard1 extends BaseController
{
	public function __construct()
	{
		parent::__construct();
		$this->model = new DashboardModel;
		$this->addJs($this->config->baseURL . 'public/vendors/chartjs/chart.js');
		$this->addStyle($this->config->baseURL . 'public/vendors/material-icons/css.css');

		$this->addJs($this->config->baseURL . 'public/vendors/datatables/extensions/Buttons/js/dataTables.buttons.min.js');
		$this->addJs($this->config->baseURL . 'public/vendors/datatables/extensions/Buttons/js/buttons.bootstrap5.min.js');
		$this->addJs($this->config->baseURL . 'public/vendors/datatables/extensions/JSZip/jszip.min.js');
		$this->addJs($this->config->baseURL . 'public/vendors/datatables/extensions/pdfmake/pdfmake.min.js');
		$this->addJs($this->config->baseURL . 'public/vendors/datatables/extensions/pdfmake/vfs_fonts.js');
		$this->addJs($this->config->baseURL . 'public/vendors/datatables/extensions/Buttons/js/buttons.html5.min.js');
		$this->addJs($this->config->baseURL . 'public/vendors/datatables/extensions/Buttons/js/buttons.print.min.js');
		$this->addStyle($this->config->baseURL . 'public/vendors/datatables/extensions/Buttons/css/buttons.bootstrap5.min.css');

		$this->addStyle($this->config->baseURL . 'public/themes/modern/css/dashboard.css');
		$this->addJs($this->config->baseURL . 'public/themes/modern/js/dashboard.js');
	}

	public function index()
	{
		$this->data['count_instansi'] = $this->model->count_instansi();
		$this->data['count_str'] = $this->model->count_jenis_jabatan('STR');
		$this->data['count_fu'] = $this->model->count_jenis_jabatan('FU');
		$this->data['count_ft'] = $this->model->count_jenis_jabatan('FT');
		$this->data['count_kedudukan_hukum'] = $this->model->count_kedudukan_hukum();
		$this->data['count_usulan_kp'] = $this->model->count_usulan_kp();
		$this->data['count_usulan_kp_by_status_BTS'] = $this->model->count_usulan_kp_by_status('BTS');
		$this->data['count_usulan_kp_by_status_MS'] = $this->model->count_usulan_kp_by_status('MS');
		$this->data['count_usulan_kp_by_status_TMS'] = $this->model->count_usulan_kp_by_status('TMS');
		$this->data['count_usulan_kp_by_status_DPV'] = $this->model->count_usulan_kp_by_status('DALAM PROSES VALIDASI');
		$this->data['count_pegawai_all'] = $this->model->count_pegawai_all();
		$this->view('dashboard1.php', $this->data);
	}

	
}
