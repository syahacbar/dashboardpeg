<div class="card">
    <div class="card-header">
        <h5 class="card-title">Impor Data</h5>
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
                    <label class="col-sm-3 col-md-2 col-lg-3 col-xl-2 col-form-label">Pilih File Excel</label>
                    <div class="col-sm-5">
                        <input type="file" class="file" name="file_excel">
                        <?php if (!empty($form_errors['file_excel'])) echo '<small class="alert alert-danger">' . $form_errors['file_excel'] . '</small>' ?>
                        <small class="small text-danger fst-italic" style="display:block">Ekstensi file harus .xlsx</small>
                        <div class="upload-img-thumb"><span class="img-prop"></span></div>
                    </div>
                </div>

                <div class="row mb-3">
                    <label class="col-sm-3 col-md-2 col-lg-3 col-xl-2 col-form-label"></label>
                    <div class="col-sm-5">
                        <div class="mt-1">Contoh file: <a title="Contoh Tabel Kenaikan Pangkat" href="<?= $config->baseURL ?>public/files/form_kenaikan_pangkat.xlsx">Tabel Kenaikan Pangkat.xlsx</a></div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-5">
                        <button type="submit" name="submit" value="submit" class="btn btn-primary">Impor</button>
                        <input type="hidden" name="id" value="<?= @$_GET['id'] ?>" />
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>

<div class="card">
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