<?php helper(['html','format']) ?>
<div class="card-body dashboard">
	<div class="row">
		<div class="col-lg-3 col-sm-6 col-xs-12 mb-4">
			<div class="card text-bg-primary shadow">
				<div class="card-body card-stats">
					<div class="description">
						<h5 class="card-title h4"><?php echo $count_usulan_kp_by_status_MS->jumlah_status;?></h5>
						<p class="card-text">Jumlah Usulan KP MS</p>

					</div>
					<div class="icon bg-warning-light">
						<i class="material-icons">group</i>
					</div>
				</div>
				<div class="card-footer">
					<div class="card-footer-left">
						<div class="icon me-2">
						</div>
					</div>
					<div class="card-footer-right">
					</div>
				</div>
			</div>
		</div>
		<div class="col-lg-3 col-sm-6 col-xs-12 mb-4">
			<div class="card text-white bg-success shadow">
				<div class="card-body card-stats">
					<div class="description">
						<h5 class="card-title h4"><?php echo $count_usulan_kp_by_status_BTS->jumlah_status;?></h5>
						<p class="card-text">Jumlah Usulan KP BTS</p>
					</div>
					<div class="icon">
						<i class="material-icons">group</i>
					</div>
				</div>
				<div class="card-footer">
					<div class="card-footer-left">
						<div class="icon me-2">
						</div>
					</div>
					<div class="card-footer-right">
					</div>
				</div>
			</div>
		</div>
		<div class="col-lg-3 col-sm-6 col-xs-12 mb-4">
			<div class="card text-white bg-warning shadow">
				<div class="card-body card-stats">
					<div class="description">
						<h5 class="card-title h4"><?php echo $count_usulan_kp_by_status_DPV->jumlah_status;?></h5>
						<p class="card-text">Jumlah Usulan KP Dalam Proses Validasi</p>
					</div>
					<div class="icon">
						<!-- <i class="fas fa-money-bill-wave"></i> -->
						<i class="material-icons">group</i>
					</div>
				</div>
				<div class="card-footer">
					<div class="card-footer-left">
						<div class="icon me-2">
						</div>
					</div>
					<div class="card-footer-right">
					</div>
				</div>
			</div>
		</div>
		<div class="col-lg-3 col-sm-6 col-xs-12 mb-4">
			<div class="card text-white bg-danger shadow">
				<div class="card-body card-stats">
					<div class="description">
						<h5 class="card-title h4"><?php echo $count_usulan_kp_by_status_TMS->jumlah_status;?></h5>
						<p class="card-text">Jumlah Usulan KP TMS</p>
					</div>
					<div class="icon">
						<i class="material-icons">group</i>
					</div>
				</div>
				<div class="card-footer">
					<div class="card-footer-left">
						<div class="icon me-2">
						</div>
					</div>
					<div class="card-footer-right">
					</div>
				</div>
			</div>
		</div>
	</div>

	<div class="row">
		<div class="col-12 col-md-12 col-lg-12 col-xl-6 mb-4">
			<div class="card">
				<div class="card-body">
					<figure class="highcharts-figure">
						<div id="daerah_pegawai"></div>
					</figure>

				</div>
			</div>
		</div>
		<div class="col-12 col-md-12 col-lg-12 col-xl-6 mb-4">
			<div class="card">
				<div class="card-body">
					<figure class="highcharts-figure">
						<div id="jenis_jabatan"></div>
					</figure>
				</div>
			</div>
		</div>
	</div>

	<div class="row">
		<div class="col-12 col-md-12 col-lg-12 col-xl-6 mb-4">
			<div class="card">
				<div class="card-body">
					<figure class="highcharts-figure">
						<div id="usulan_kp"></div>
					</figure>
				</div>
			</div>
		</div>
		<div class="col-12 col-md-12 col-lg-12 col-xl-6 mb-4">
			<div class="card">
				<div class="card-header">
					<div class="card-header-start">
						<h5 class="card-title">Jumlah Pegawai Berdasarkan Kedudukan Hukum</h5>
					</div>
				</div>
				<div class="card-body" style="display:flex">
					<div class="table-responsive">
						<table class="table table-border table-hover">
							<thead>
								<tr>
									<th style="text-align: center;" width="20px">NO.</th>
									<th style="text-align: center;">KEDUDUKAN HUKUM</th>
									<th style="text-align: center;">JUMLAH</th>
								</tr>
								</thead>
							<tbody>
								<?php 	
									$no = 1;
									foreach ($count_kedudukan_hukum AS $kh): 
								?>
									<tr>
										<td style="text-align: center;"><?php echo $no++; ?></td>
										<td style="text-align: center;"><?php echo $kh->kedudukan_hukum; ?></td>
										<td style="text-align: center;"><?php echo $kh->jumlah_pegawai; ?></td>
									</tr>
								<?php endforeach ?>
							</tbody>
							<tfoot>
								<th colspan="2">Total</th>
								<th><?php echo format_ribuan($count_pegawai_all->totalpegawai);?></th>
							</tfoot>
						</table>
					</div>
				</div>
			</div>
		</div>
	</div>

</div>

<script src="https://code.highcharts.com/highcharts.js"></script>
<script src="https://code.highcharts.com/highcharts-3d.js"></script>
<script src="https://code.highcharts.com/modules/exporting.js"></script>
<script src="https://code.highcharts.com/modules/export-data.js"></script>
<script src="https://code.highcharts.com/modules/accessibility.js"></script>


<script>
	Highcharts.chart('daerah_pegawai', {
	    chart: {
	        type: 'bar'
	    },
	    title: {
	        text: 'Jumlah Pegawai Berdasarkan Instansi',
	        align: 'left'
	    },
	    xAxis: {
	        categories: [<?php foreach($count_instansi AS $peg) { echo "'".$peg->nama_instansi."',"; } ?>],
	        title: {
	            text: null
	        }
	    },
	    yAxis: {
	        min: 0,
	        // title: {
	        //     text: 'Population (millions)',
	        //     align: 'high'
	        // },
	        labels: {
	            overflow: 'justify'
	        }
	    },
	    tooltip: {
	        valueSuffix: ' pegawai'
	    },
	    plotOptions: {
	        bar: {
	            dataLabels: {
	                enabled: true
	            }
	        }
	    },
	    legend: {
	        layout: 'vertical',
	        align: 'right',
	        verticalAlign: 'top',
	        x: -40,
	        y: 80,
	        floating: true,
	        borderWidth: 1,
	        backgroundColor:
	            Highcharts.defaultOptions.legend.backgroundColor || '#FFFFFF',
	        shadow: true
	    },
	    credits: {
	        enabled: false
	    },
	    series: [{
	        name: 'Jumlah Pegawai',
	        data: [<?php foreach($count_instansi AS $peg) { echo $peg->jumlah_pegawai.","; } ?>]
	    }]
	});

	Highcharts.chart('usulan_kp', {
	    chart: {
	        type: 'bar'
	    },
	    title: {
	        text: 'Jumlah Usulan Kenaikan Pangkat',
	        align: 'left'
	    },
	    xAxis: {
	        categories: [<?php foreach($count_usulan_kp AS $peg) { echo "'".$peg->nama_instansi."',"; } ?>],
	        title: {
	            text: null
	        }
	    },
	    yAxis: {
	        min: 0,
	        // title: {
	        //     text: 'Population (millions)',
	        //     align: 'high'
	        // },
	        labels: {
	            overflow: 'justify'
	        }
	    },
	    tooltip: {
	        valueSuffix: ' pegawai'
	    },
	    plotOptions: {
	        bar: {
	            dataLabels: {
	                enabled: true
	            }
	        }
	    },
	    legend: {
	        layout: 'vertical',
	        align: 'right',
	        verticalAlign: 'top',
	        x: -40,
	        y: 80,
	        floating: true,
	        borderWidth: 1,
	        backgroundColor:
	            Highcharts.defaultOptions.legend.backgroundColor || '#FFFFFF',
	        shadow: true
	    },
	    credits: {
	        enabled: false
	    },
	    series: [{
	        name: 'Jumlah Pegawai',
	        data: [<?php foreach($count_usulan_kp AS $peg) { echo $peg->jumlah_pegawai.","; } ?>]
	    }]
	});


	Highcharts.chart('jenis_jabatan', {
		chart: {
			type: 'pie',
			options3d: {
				enabled: true,
				alpha: 45,
				beta: 0
			}
		},
		title: {
			text: 'Jumlah Pegawai Berdasarkan Jenis Jabatan',
		},
		accessibility: {
			point: {
				valueSuffix: '%'
			}
		},
		tooltip: {
			pointFormat: '{series.name}: <b>{point.percentage:.1f}%</b>'
		},
		plotOptions: {
			pie: {
				allowPointSelect: true,
				cursor: 'pointer',
				depth: 35,
				dataLabels: {
					enabled: true,
					format: '{point.name}'
				}
			}
		},
		series: [{
			type: 'pie',
			name: 'Share',
			data: [
				['Struktural', <?php echo $count_str->jumlah;?>],
				['Fungsional Umum', <?php echo $count_fu->jumlah;?>],
				['Fungsional Tertentu', <?php echo $count_ft->jumlah;?>]
			]
		}]
	});

	

</script>