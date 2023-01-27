<?php
helper('html'); ?>

<div class="card">
  <div class="card-header">
   <h5 class="card-title"><?=$current_module['judul_module']?></h5>
  </div>

  <div class="card-body">
    <div class="row">
      <div class="col-sm-4">
        <div class="row">
          <div class="col-sm-4 d-flex align-items-center">
            <label for="dd_jenisjabatan">Jenis Jabatan</label>
          </div>
          <div class="col-sm-6">
              <select id="dd_jenisjabatan" name="dd_jenisjabatan" class="form-select">
                <option value="">-- SEMUA JENIS JABATAN --</option>
                <option value="STRUKTURAL">STRUKTURAL</option>
                <option value="FUNGSIONAL TERTENTU">FUNGSIONAL TERTENTU</option>
                <option value="FUNGSIONAL UMUM">FUNGSIONAL UMUM</option>
              </select>
          </div>
        </div>
      </div>
      <div class="col-sm-4">
        <div class="row">
          <div class="col-sm-4 d-flex align-items-center">
            <label for="dd_prosedur">Prosedur</label>
          </div>
          <div class="col-sm-6">
              <select id="dd_prosedur" name="dd_prosedur" class="form-select">
                <option value="">-- SEMUA PROSEDUR --</option>
                <option value="prosedur1">V/a - IV/b</option>
                <option value="prosedur2">III/d ke bawah</option>
              </select>
          </div>
        </div>
      </div>
      <div class="col-sm-4">
        <div class="row">
          <div class="col-sm-4 d-flex align-items-center">
            <label for="dd_statuspengusulan">Status Pengusulan</label>
          </div>
          <div class="col-sm-6">
              <select id="dd_statuspengusulan" name="dd_statuspengusulan" class="form-select">
                <option value="">-- SEMUA STATUS --</option>
                <option value="ACC">ACC</option>
                <option value="BTL">BTL</option>
                <option value="TMS">TMS</option>
                <option value="Proses Validasi">Proses Validasi</option>
              </select>
          </div>
        </div>
      </div>

      <div class="card-body">
        <?php
        if (!empty($msg)) {
          show_alert($msg);
        }

        $column = [
          'ignore_search_urut' => 'No',
          'nama' => 'Nama',
          'nip' => 'NIP',
          'pangkat' => 'Golongan/Ruang',
          'jabatan' => 'Jabatan',
          'jenis_jabatan' => 'Jenis Jabatan',
          'prosedur' => 'Prosedur Kenaikan Pangkat',
          'status' => 'Status',
          'alasan' => 'Alasan',
          // 'ignore_search_action' => 'Action'

        ];

        $settings['order'] = [2, 'asc'];
        $index = 0;
        $th = '';
        foreach ($column as $key => $val) {
          $th .= '<th>' . $val . '</th>';
          if (strpos($key, 'ignore_search') !== false) {
            $settings['columnDefs'][] = ["targets" => $index, "orderable" => false];
          }
          $index++;
        }

        ?>

        <table id="tbl-struktural-kp" class="table display table-striped table-bordered table-hover tbl-struktural" style="width:100%">
          <thead>
            <tr>
              <?= $th ?>
            </tr>
          </thead>
          <tfoot>
            <tr>
              <?= $th ?>
            </tr>
          </tfoot>
        </table>
        <?php
        foreach ($column as $key => $val) {
          $column_dt[] = ['data' => $key];
        }
        ?>
        <span id="dataTables-column" style="display:none"><?= json_encode($column_dt) ?></span>
        <span id="dataTables-setting" style="display:none"><?= json_encode($settings) ?></span>
        <span id="dataTables-url" style="display:none"><?= current_url() . '/getDataDT' ?></span>
      </div>
    </div>
  </div>
</div>
