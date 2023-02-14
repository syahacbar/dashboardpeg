<div class="card">
	<div class="card-header">
		<h5 class="card-title"><?=$title?></h5>
	</div>
	
	<div class="card-body">
		<?php 
		helper ('html');
		if (!empty($msg)) {
			show_message($msg['content'], $msg['status']);
		}
		
		echo btn_label(['attr' => ['class' => 'btn btn-success btn-xs'],
			'url' => $config->baseURL . $current_module['nama_module'] . '/add',
			'icon' => 'fa fa-plus',
			'label' => 'Tambah Data'
		]);
		
		echo btn_label(['attr' => ['class' => 'btn btn-light btn-xs'],
			'url' => $config->baseURL . $current_module['nama_module'],
			'icon' => 'fa fa-arrow-circle-left',
			'label' => $current_module['judul_module']
		]); 
		?>
		<hr/>
		<form method="post" action="" id="form-container" enctype="multipart/form-data">
			<div class="tab-content" id="form-container">
				<div class="row mb-3">
					<label class="col-sm-3 col-md-2 col-lg-3 col-xl-2 col-form-label">Nama Instansi</label>
					<div class="col-sm-5">
						<input class="form-control" type="text" name="nama_instansi" value="<?=set_value('nama_instansi', @$nama_instansi)?>" placeholder="Nama Instansi" required="required"/>
					</div>
				</div>
				<div class="row mb-3">
					<label class="col-sm-3 col-md-2 col-lg-3 col-xl-2 col-form-label">User ID</label>
					<div class="col-sm-5">
						<?php
			
						if (!$userx) {
							echo '<div class="alert alert-danger">Data User ID masih kosong, silakan diisi terlebih dahulu</div>';
						} else {
							echo options(['class' => 'form-control id_user select2'
											, 'name' => 'id_user[]'
											, 'multiple' => 'multiple'
											, 'required' => 'required'
											]
										, $userx
										, set_value('id_user', @$id_user)
									);
						} ?>
					</div>
				</div>
			</div>
		</form>
	</div>
</div>