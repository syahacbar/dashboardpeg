<?php
helper('html');?>

<div class="card">
  <div class="card-header">
<ul class="nav nav-tabs" id="myTab" role="tablist">
  <li class="nav-item" role="presentation">
    <button class="nav-link active" id="home-tab" data-bs-toggle="tab" data-bs-target="#tab-struktural-ivab" type="button" role="tab" aria-controls="home-tab-pane" aria-selected="true">IV/a - IV/b</button>
  </li>
  <li class="nav-item" role="presentation">
    <button class="nav-link" id="profile-tab" data-bs-toggle="tab" data-bs-target="#tab-struktural-iiid" type="button" role="tab" aria-controls="profile-tab-pane" aria-selected="false">III/d ke bawah</button>
  </li>
</ul>
<div class="tab-content" id="myTabContent">
  <br>
  <div class="tab-pane fade show active" id="tab-struktural-ivab" role="tabpanel" aria-labelledby="tab-struktural-ivab" tabindex="0">
    <div class="row">
     <div class="card">
      <div class="card-header">
        <h5 class="card-title">Golongan IV/a - IV/b</h5>
      </div>
      
      <div class="card-body">
        <hr/>
        <?php 
        if (!empty($msg)) {
          show_alert($msg);
        }
          
        $column =[
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
        
        $settings['order'] = [2,'asc'];
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
        
        <table id="tbl-struktural-ivab" class="table display table-striped table-bordered table-hover" style="width:100%">
        <thead>
          <tr>
            <?=$th?>
          </tr>
        </thead>
        <tfoot>
          <tr>
            <?=$th?>
          </tr>
        </tfoot>
        </table>
        <?php
          foreach ($column as $key => $val) {
            $column_dt[] = ['data' => $key];
          }
        ?>
        <span id="dataTables-column" style="display:none"><?=json_encode($column_dt)?></span>
        <span id="dataTables-setting" style="display:none"><?=json_encode($settings)?></span>
        <span id="dataTables-url" style="display:none"><?=current_url() . '/getDataDT'?></span>
      </div>
    </div>
    </div>

  </div>
  <div class="tab-pane fade" id="tab-struktural-iiid" role="tabpanel" aria-labelledby="tab-struktural-iiid" tabindex="0">...</div>

</div>
  </div>

  <div class="card-body">
    
  </div>
</div>

