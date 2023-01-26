<?php
helper('html'); ?>

<div class="card">
  <div class="card-header">
    <ul class="nav nav-tabs" id="myTab" role="tablist">
      <li class="nav-item" role="presentation">
        <button class="nav-link active" id="home-tab" data-bs-toggle="tab" data-bs-target="#tab-struktural" type="button" role="tab" aria-controls="home-tab-pane" aria-selected="true">Struktural</button>
      </li>
      <li class="nav-item" role="presentation">
        <button class="nav-link" id="profile-tab" data-bs-toggle="tab" data-bs-target="#tab-fungsionalumum" type="button" role="tab" aria-controls="profile-tab-pane" aria-selected="false">Fungsional Umum</button>
      </li>
      <li class="nav-item" role="presentation">
        <button class="nav-link" id="profile-tab" data-bs-toggle="tab" data-bs-target="#tab-fungsionaltertentu" type="button" role="tab" aria-controls="profile-tab-pane" aria-selected="false">Fungsional Tertentu</button>
      </li>
    </ul>
    <div class="tab-content" id="myTabContent">
      <br>
      <div class="tab-pane fade show active" id="tab-struktural" role="tabpanel" aria-labelledby="tab-struktural" tabindex="0">
        <div class="row">
          <form method="get" action="" class="d-flex">
          <div class="col-sm-4">
            <div class="row">
              <div class="col-sm-4 d-flex align-items-center">
                <label for="golonganruangstruktural">Prosedur</label>
              </div>
              <div class="col-sm-6">
                  <select id="golonganruangstruktural" onchange="" name="golonganruangstruktural" class="form-select">
                    <option value="">-- Pilih --</option>
                    <option value="IV/a">V/a - IV/b</option>
                    <option value="III/d">III/d ke bawah</option>
                  </select>
              </div>
            </div>
          </div>
          <div class="col-sm-4">
            <div class="row">
              <div class="col-sm-4 d-flex align-items-center">
                <label for="struktural">Status Pengusulan</label>
              </div>
              <div class="col-sm-6">
                  <select name="struktural" class="form-select">
                    <option value="">-- Pilih --</option>
                    <option value="ACC">ACC</option>
                    <option value="BTL">BTL</option>
                    <option value="TMS">TMS</option>
                    <option value="Proses Validasi">Proses Validasi</option>
                  </select>
              </div>
            </div>
          </div>
          </form>

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

            <table id="tbl-struktural" class="table display table-striped table-bordered table-hover tbl-struktural" style="width:100%">
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
      <div class="tab-pane fade" id="tab-fungsionalumum" role="tabpanel" aria-labelledby="tab-fungsionalumum" tabindex="0">
        <div class="row">
          ...
        </div>
      </div>

      <div class="tab-pane fade" id="tab-fungsionaltertentu" role="tabpanel" aria-labelledby="tab-fungsionaltertentu" tabindex="0">
        <div class="row">
          ...
        </div>
      </div>

    </div>
  </div>

  <div class="card-body">

  </div>
</div>


<script>
  $(document).ready(function() {
    // $('#table-result').DataTable();

    // $("#filterTable").dataTable({
    //     "searching": true
    // });

    // function filterData() {
    //   $('#table-result').DataTable().search(
    //     $('#golonganruangstruktural').val()
    //   ).draw();
    // }
    $('#golonganruangstruktural').on('change', function() {
      alert('tes');
    });

  });
</script>