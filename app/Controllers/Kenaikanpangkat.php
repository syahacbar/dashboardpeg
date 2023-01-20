<?php
namespace App\Controllers;
class Kenaikanpangkat extends BaseController
{
	public function index()
	{
		$data = $this->data;
		// $data['result'] = $this->produkModel->getDataProduk();
		$this->view('kenaikanpangkat.php', $data);
	}
}