<?php

namespace App\Models;
// use App\Spout;
use Box\Spout\Reader\Common\Creator\ReaderEntityFactory;


class ImpordataModel extends \App\Models\BaseModel
{
    public function __construct()
    {
        parent::__construct();
    }

    // public function uploadExcel() 
    // {
    //     helper(['upload_file', 'format']);
    //     $path = ROOTPATH . 'public/tmp/';
        
        
    //     $file = $this->request->getFile('file_excel');
    //     if (! $file->isValid())
    //     {
    //         throw new RuntimeException($file->getErrorString().'('.$file->getError().')');
    //     }
                
    //     require_once 'app/ThirdParty/Spout/src/Spout/Autoloader/autoload.php';
        
    //     $filename = upload_file($path, $_FILES['file_excel']);
    //     $reader = ReaderEntityFactory::createReaderFromFile($path . $filename);
    //     $reader->open($path . $filename);

    //     foreach ($reader->getSheetIterator() as $sheet) 
    //     {
    //         $total_row = 0;
    //         foreach ($sheet->getRowIterator() as $num_row => $row) 
    //         {
    //             $cols = $row->toArray();
                                
    //             if ($num_row == 1) {
    //                 $field_table = $cols;
    //                 $field_name = array_map('strtolower', $field_table);
    //                 continue;
    //             }
                
    //             $data_value = [];
                
    //             foreach ($field_name as $num_col => $field) 
    //             {
    //                 $val = null;
    //                 if (key_exists($num_col, $cols) && $cols[$num_col] != '') {
    //                     $val = $cols[$num_col];
    //                 }
                    
    //                 if ($val instanceof \DateTime) {
    //                     $val = $val->format('Y-m-d H:i:s');
    //                 }
                    
    //                 $data_value[$field] = $val;
    //             }
                
    //             $data_db[] = $data_value;
    //             $total_row += 1;
    //             if ($num_row % 2000 == 0) {
    //                 $query = $this->db->table($this->request->getPost('nama_tabel'))->insertBatch($data_db);
    //                 $data_db = [];
    //             }
    //         }
            
    //         if ($data_db) {
    //             $query = $this->db->table($this->request->getPost('nama_tabel'))->insertBatch($data_db);
    //         }
    //     }
    //     $reader->close();
    //     unlink ($path . $filename);
        
    //     $result = ['status' => '', 'content'];
    //     if ($query) {
    //         $result['status'] = 'ok';
    //         $result['content'] = 'Data berhasil di masukkan ke dalam tabel <strong>' . $_POST['nama_tabel'] . '</strong> sebanyak ' . format_ribuan($total_row) . ' baris';
    //     }
        
    //     return $result;
    // }

    public function impordatapegawai()
    {
        helper(['upload_file', 'format']);
        $path = ROOTPATH . 'public/tmp/';
        
        
        $file = $this->request->getFile('file_excel');
        if (! $file->isValid())
        {
            throw new RuntimeException($file->getErrorString().'('.$file->getError().')');
        }
                
        require_once 'app/ThirdParty/Spout/src/Spout/Autoloader/autoload.php';
        
        $filename = upload_file($path, $_FILES['file_excel']);
        $reader = ReaderEntityFactory::createReaderFromFile($path . $filename);
        $reader->open($path . $filename);

        $builder = $this->db->table('tbl_pegawai');
        $waktu_update = date("Y-m-d H:s");

        foreach ($reader->getSheetIterator() as $sheet) 
        {
            $total_row = 0;
            foreach ($sheet->getRowIterator() as $num_row => $row) 
            {
                $total_row += 1;
                $cells = $row->getCells();        
                if ($num_row > 7) {
                      $data_db['nip'] = $cells[1]->getValue();
                      $data_db['nip_lama'] = $cells[2]->getValue();
                      $data_db['nama'] = strtoupper($cells[3]->getValue());
                      $data_db['gelar_depan'] = strtoupper($cells[4]->getValue());
                      $data_db['gelar_belakang'] = strtoupper($cells[5]->getValue());
                      // $data_db['jabatan'] = strtoupper($cells[]->getValue());
                      // $data_db['jenis_jabatan'] = strtoupper($cells[]->getValue());
                      $data_db['tempat_lahir'] = strtoupper($cells[6]->getValue());
                      $data_db['tgl_lahir'] = strtoupper($cells[7]->getValue());
                      $data_db['gol_awal'] = strtoupper($cells[8]->getValue());
                      $data_db['tmt_cpns'] = strtoupper($cells[9]->getValue());
                      $data_db['tmt_pns'] = strtoupper($cells[10]->getValue());
                      $data_db['jk'] = strtoupper($cells[11]->getValue());
                      $data_db['gol_akhir'] = strtoupper($cells[12]->getValue());
                      $data_db['tmt_gol_akhir'] = strtoupper($cells[13]->getValue());
                      $data_db['masakerja_tahun'] = strtoupper($cells[14]->getValue());
                      $data_db['masakerja_bulan'] = strtoupper($cells[15]->getValue());
                      $data_db['str_eselon'] = strtoupper($cells[16]->getValue());
                      $data_db['str_tmt'] = strtoupper($cells[17]->getValue());
                      $data_db['str_namajabatan'] = strtoupper($cells[18]->getValue());
                      $data_db['fung_tmt'] = strtoupper($cells[19]->getValue());
                      $data_db['fung_namajabatan_ft'] = strtoupper($cells[20]->getValue());
                      $data_db['fung_namajabatan_fu'] = strtoupper($cells[21]->getValue());
                      $data_db['unit_kerja'] = strtoupper($cells[22]->getValue());
                      $data_db['unit_kerja_induk'] = strtoupper($cells[23]->getValue());
                      $data_db['nama_pendidikan_terakhir'] = strtoupper($cells[24]->getValue());
                      $data_db['tahunlulus_pendidikan_terakhir'] = strtoupper($cells[25]->getValue());
                      $data_db['kedudukan_hukum'] = strtoupper($cells[26]->getValue());
                      $data_db['jenis_pegawai'] = strtoupper($cells[27]->getValue());
                      $data_db['instansi_induk'] = strtoupper($cells[28]->getValue());
                      $data_db['instansi_kerja'] = strtoupper($cells[29]->getValue());
                      $data_db['id_pns'] = $cells[30]->getValue();

                    $data_db['id_instansi'] = $_POST['dropdowninstansi'];
                    $data_db['waktu_update'] = $waktu_update;
                    $builder->insert($data_db);
                    $id_pegawai = $this->db->insertID();
                }
                
            }
        }
        $reader->close();
        unlink ($path . $filename);

        $result = ['status' => '', 'content'];
        if ($id_pegawai) {
            $result['status'] = 'ok';
            $result['content'] = 'Data berhasil di masukkan ke dalam tabel';
            // <strong>' . $_POST['nama_tabel'] . '</strong> sebanyak ' . format_ribuan($total_row) . ' baris';
        }
        
        return $result;

    }

    public function imporkenaikanpangkat()
    {
        helper(['upload_file', 'format']);
        $path = ROOTPATH . 'public/tmp/';
        
        
        $file = $this->request->getFile('file_excel');
        if (! $file->isValid())
        {
            throw new RuntimeException($file->getErrorString().'('.$file->getError().')');
        }
                
        require_once 'app/ThirdParty/Spout/src/Spout/Autoloader/autoload.php';
        
        $filename = upload_file($path, $_FILES['file_excel']);
        $reader = ReaderEntityFactory::createReaderFromFile($path . $filename);
        $reader->open($path . $filename);

        $builder = $this->db->table('tbl_kenaikanpangkat');
        $waktu_update = date("Y-m-d H:s");

        foreach ($reader->getSheetIterator() as $sheet) 
        {
            $total_row = 0;
            foreach ($sheet->getRowIterator() as $num_row => $row) 
            {
                $total_row += 1;
                $cells = $row->getCells();        
                if ($num_row > 1) {
                    $data_db['nip'] = $cells[1]->getValue();
                    $data_db['nama'] = strtoupper($cells[2]->getValue());
                    $data_db['pangkat'] = strtoupper($cells[3]->getValue());
                    $data_db['jabatan'] = strtoupper($cells[4]->getValue());
                    $data_db['jenis_jabatan'] = strtoupper($cells[5]->getValue());
                    $data_db['prosedur'] = strtoupper($cells[6]->getValue());
                    $data_db['status'] = strtoupper($cells[7]->getValue());
                    $data_db['alasan'] = strtoupper($cells[8]->getValue());
                    $data_db['waktu_update'] = $waktu_update;
                    $data_db['id_instansi'] = $_POST['dropdowninstansi'];
                    $builder->insert($data_db);
                    $id_pegawai = $this->db->insertID();   
                }                
            }
        }
        $reader->close();
        unlink ($path . $filename);

        $result = ['status' => '', 'content'];
        if ($id_pegawai) {
            $result['status'] = 'ok';
            $result['content'] = 'Data berhasil di masukkan ke dalam tabel <strong>' . $_POST['nama_tabel'] . '</strong> sebanyak ' . format_ribuan($total_row-1) . ' baris';
        }
        
        return $result;

    }

    public function get_all_instansi() {
        $sql = 'SELECT * FROM tbl_instansi ti';
        $result = $this->db->query($sql)->getResult();
        return $result;
    }
}
