<div class="card">
    <div class="card-header">
        <h5 class="card-title">Impor Data Pegawai</h5>
    </div>

    <div class="card-body">
        <?php
        helper(['html', 'format']);
        if (!empty($message)) {
            show_message($message);
        }
        ?>
        <form method="post" action="" class="form-horizontal" enctype="multipart/form-data">
            <div class="tab-content" id="myTabContent">
                <div class="row mb-3">
                    <label class="col-sm-3 col-md-2 col-lg-3 col-xl-2 col-form-label">Pilih Tabel</label>
                    <div class="col-sm-5">
                       <?=options(['name' => 'nama_tabel', 'id' => 'nama-tabel'], $tabel_options)?>
                        <div class="mt-1">Contoh file: <a title="Contoh Data Pegawai" href="<?=$config->baseURL?>public/files/form_data_pegawai.xlsx">form_data_pegawaixlsx</a></div>
                        <small>Baris pertama file excel harus disertakan, dan tidak boleh dirubah, karena akan diidentifikasi sebagai nama kolom tabel database</small>
                    </div>
                </div>
                <div class="row mb-3">
                    <label class="col-sm-3 col-md-2 col-lg-3 col-xl-2 col-form-label">Pilih Instansi</label>
                    <div class="col-sm-5">
                        <select class="form-select" name="dropdowninstansi">
                            <option value="">-- Pilih Salah Satu --</option>
                            <?php foreach($dropdowninstansi AS $ddi) : ?>
                                <option value="<?php echo $ddi->id_instansi;?>"
                                    <?php 
                                        if(isset($_POST['dropdowninstansi']))
                                        {
                                            if($ddi->id_instansi == $_POST['dropdowninstansi'])
                                            {
                                                echo 'selected="selected"';
                                            }
                                        }
                                    ?>
                                    ><?php echo $ddi->nama_instansi;?></option>
                            <?php endforeach;?>
                        </select>

                        
                    </div>
                </div>
                <div class="row mb-3">
                    <label class="col-sm-3 col-md-2 col-lg-3 col-xl-2 col-form-label">Pilih File Excel</label>
                    <div class="col-sm-5">
                        <input type="file" class="file" name="file_excel">
                            <?php if (!empty($form_errors['file_excel'])) echo '<small class="alert alert-danger">' . $form_errors['file_excel'] . '</small>'?>
                            <small class="small" style="display:block">Ekstensi file harus .xlsx</small>
                        <div class="upload-img-thumb"><span class="img-prop"></span></div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-5">
                        <button type="submit" name="submit" value="submit" class="btn btn-primary">Submit</button>
                        <input type="hidden" name="id" value="<?=@$_GET['id']?>"/>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>

<div class="card" style="display: none;">
    <div class="card-header">
        <h5 class="card-title">Riwayat Impor Data</h5>
    </div>

    <div class="card-body">
        <div class="table-responsive">
            <table id="import-history" class="table display nowrap table-striped table-bordered">
                <thead>
                    <tr>
                        <th>No.</th>
                        <th>Nama Tabel</th>
                        <th>Waktu Upload</th>
                        <th>Keterangan</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <td>1.</td>
                    <td>Kenaikan Pangkat Gelombang I</td>
                    <td>20022200</td>
                    <td>Sukses</td>
                    <td>
                        <div class="form-switch">
                            <input name="aktif" type="checkbox" class="form-check-input switch" checked="">
                        </div>
                    </td>
                </tbody>
            </table>
        </div>

    </div>


</div>

<script>
    $(document).ready(function() {
        $('#import-history').DataTable();
    });
</script>