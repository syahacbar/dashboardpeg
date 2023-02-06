 <?php
        helper(['html', 'format']);
        if (!empty($message)) {
            show_message($message);
        }
        ?>
<div class="row">
    <div class="col-12 col-md-12 col-lg-12 col-xl-4 mb-4">
        <div class="card">
            <div class="card-header">
                <h5 class="card-title">Impor Data Pegawai</h5>
            </div>
            <div class="card-body">
                <form method="post" action="" class="form-horizontal" enctype="multipart/form-data">
                    <div class="tab-content" id="myTabContent">
                        <div class="row mb-3">
                            <label class="col-sm-12 col-md-12 col-lg-12 col-xl-12 col-form-label">Pilih Tabel</label>
                            <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                <?= options(['name' => 'nama_tabel', 'id' => 'nama-tabel'], $tabel_options) ?>
                                <div class="mt-1">Contoh file: <a title="Contoh Data Pegawai" href="<?= $config->baseURL ?>public/files/form_data_pegawai.xlsx">form_data_pegawaixlsx</a></div>
                                <small>Baris pertama file excel harus disertakan, dan tidak boleh dirubah, karena akan diidentifikasi sebagai nama kolom tabel database</small>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label class="col-sm-12 col-md-12 col-lg-12 col-xl-12 col-form-label">Pilih Instansi</label>
                            <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                <select class="form-select" name="dropdowninstansi">
                                    <option value="">-- Pilih Salah Satu --</option>
                                    <?php foreach ($dropdowninstansi as $ddi) : ?>
                                        <option value="<?php echo $ddi->id_instansi; ?>" 
                                            <?php
                                             if (isset($_POST['dropdowninstansi'])) {
                                                 if ($ddi->id_instansi == $_POST['dropdowninstansi']) {
                                                    echo 'selected="selected"';
                                                }
                                            }
                                        ?>>

                                        <?php echo $ddi->nama_instansi; ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label class="col-sm-12 col-md-12 col-lg-12 col-xl-12 col-form-label">Pilih File Excel</label>
                            <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                <input type="file" class="file" name="file_excel">
                                <?php if (!empty($form_errors['file_excel'])) echo '<small class="alert alert-danger">' . $form_errors['file_excel'] . '</small>' ?>
                                <small class="small" style="display:block">Ekstensi file harus .xlsx</small>
                                <div class="upload-img-thumb"><span class="img-prop"></span></div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-5">
                                <button type="submit" name="submit" value="submit" class="btn btn-primary">Submit</button>
                                <input type="hidden" name="id" value="<?= @$_GET['id'] ?>" />
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <div class="col-12 col-md-12 col-lg-12 col-xl-8 mb-4">
        <div class="card">
            <div class="card-header">
                <h5 class="card-title">Riwayat Impor Data</h5>
            </div>
            <div class="card-body">
                    <div class="table-responsive">
                        <table id="example" style="width:100%" class="table table-striped table-bordered dt-body-center">
                            <thead>
                                <tr>
                                    <th width="20px">No.</th>
                                    <th>Nama File</th>
                                    <th width="150px">Tanggal Upload</th>
                                    <th>User</th>
                                    <th width="200px">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td class="text-center">1.</td>
                                    <td>Kenaikan Pangkat Gelombang I</td>
                                    <td class="text-center">20022200</td>
                                    <td class="text-center">Sukses</td>
                                    <td>
                                        <div class="form-switch">
                                            <input type="checkbox" data-onstyle="primary" data-on="Enable" data-off="Disable" data-size="small" checked data-toggle="toggle">
                                            <button name="button" class="btn btn-success btn-sm">Unduh</button>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="text-center">2.</td>
                                    <td>Kenaikan Pangkat Gelombang I</td>
                                    <td class="text-center">20022200</td>
                                    <td class="text-center">Sukses</td>
                                    <td>
                                        <div class="form-switch">
                                            <input type="checkbox" data-onstyle="primary" data-on="Enable" data-off="Disable" data-size="small" checked data-toggle="toggle">
                                            <button name="button" class="btn btn-success btn-sm">Unduh</button>
                                        </div>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
            </div>
        </div>
    </div>
</div>
