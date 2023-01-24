<?php

namespace App\Controllers;

use App\Models\ImpordataModel;

class Impordata extends BaseController
{
    protected $model;

    public function __construct()
    {
        parent::__construct();
        $this->model = new ImpordataModel;

        $this->data['title'] = 'Upload Excel';
        $this->data['tabel'] = [
            'tbl_pegawai' => [
                'file_excel' => [
                    'url' => $this->config->baseURL . 'public/files/form_kenaikan_pangkat.xlsx', 'display' => 'Format Data Kenaikan Pangkat.xlsx'
                ], 'display' => 'Mahasiswa'
            ]
        ];

        foreach ($this->data['tabel'] as $key => $val) {
            $this->data['tabel_options'][$key] = $val['display'];
        }

        $this->addJs($this->config->baseURL . 'public/themes/modern/js/uploadexcel.js');
        $this->addJs(['print' => true, 'script' => 'var tabel = ' . json_encode($this->data['tabel'])]);
    }

    public function index()
    {
        if (isset($_POST['submit'])) {
            $form_errors = $this->validateForm();
            if ($form_errors) {
                $data['msg']['status'] = 'error';
                $data['msg']['content'] = $form_errors;
            } else {
                $this->data['message'] = $this->model->uploadExcel();
            }
        }

        $this->view('impordata.php', $this->data);
    }

    function validateForm()
    {

        $form_errors = [];

        if ($_FILES['file_excel']['name']) {
            $file_type = $_FILES['file_excel']['type'];
            $allowed = ['application/vnd.openxmlformats-officedocument.spreadsheetml.sheet'];

            if (!in_array($file_type, $allowed)) {
                $form_errors['file_excel'] = 'Tipe file harus ' . join(', ', $allowed);
            }
        } else {
            $form_errors['file_excel'] = 'File excel belum dipilih';
        }

        return $form_errors;
    }
}