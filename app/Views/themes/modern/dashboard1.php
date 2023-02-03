<?php helper('html') ?>
<div class="card-body dashboard">
	<div class="row">
		<div class="col-lg-3 col-sm-6 col-xs-12 mb-4">
			<div class="card text-bg-primary shadow">
				<div class="card-body card-stats">
					<div class="description">
						<h5 class="card-title h4">52000</h5>
						<p class="card-text">Jumlah Pegawai Struktural</p>

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
						<h5 class="card-title">1000</h5>
						<p class="card-text">Jumlah Pegawai Fungsional Umum</p>
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
						<h5 class="card-title">10000</h5>
						<p class="card-text">Jumlah Pegawai Fungsional Tertentu</p>
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
						<h5 class="card-title">20000</h5>
						<p class="card-text">Total Pengajuan KP</p>
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
						<div id="jabatan_pegawai"></div>
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
				<figure class="highcharts-figure">
					<div id="jenis_kelamin"></div>
				</figure>
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
			type: 'column'
		},
		title: {
			text: 'Grafik Jumlah Pegawai Berdasarkan Daerah'
		},
		xAxis: {
			categories: [
				'Manokwari',
				'Pegaf',
				'Mansel',
				'Bintuni'
			],
			crosshair: true
		},
		yAxis: {
			min: 0,
			title: {
				text: 'Jumlah (orang)'
			}
		},
		tooltip: {
			headerFormat: '<span style="font-size:10px">{point.key}</span><table>',
			pointFormat: '<tr><td style="color:{series.color};padding:0">{series.name}: </td>' +
				'<td style="padding:0"><b>{point.y:.1f} mm</b></td></tr>',
			footerFormat: '</table>',
			shared: true,
			useHTML: true
		},
		plotOptions: {
			column: {
				pointPadding: 0.2,
				borderWidth: 0
			}
		},
		series: [{
			name: 'Tetap',
			data: [49.9, 71.5, 106.4]

		}, {
			name: 'Honorer',
			data: [83.6, 78.8, 98.5]

		}, {
			name: 'Karep',
			data: [48.9, 38.8, 39.3]

		}, {
			name: 'Boss',
			data: [42.4, 33.2, 34.5]

		}]
	});

	Highcharts.chart('jabatan_pegawai', {
		chart: {
			type: 'pie',
			options3d: {
				enabled: true,
				alpha: 45,
				beta: 0
			}
		},
		title: {
			text: 'Grafik Jumlah Pegawai Berdasarkan Jabatan',
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
				['Struktural', 23],
				['Fungsional', 18],
				{
					name: 'KP',
					y: 12,
					sliced: true,
					selected: true
				},
				['XXX', 9],
				['XXXsd', 8],
				['XXXsa', 30]
			]
		}]
	});

	Highcharts.chart('usulan_kp', {
		chart: {
			type: 'column'
		},
		title: {
			text: 'Grafik Jumlah Usulan KP Berdasarkan Daerah'
		},
		xAxis: {
			categories: [
				'Bintuni',
				'Amban',
				'Wosi',
				'Sanggeng'
			],
			crosshair: true
		},
		yAxis: {
			min: 0,
			title: {
				text: 'Jumlah (orang)'
			}
		},
		tooltip: {
			headerFormat: '<span style="font-size:10px">{point.key}</span><table>',
			pointFormat: '<tr><td style="color:{series.color};padding:0">{series.name}: </td>' +
				'<td style="padding:0"><b>{point.y:.1f} mm</b></td></tr>',
			footerFormat: '</table>',
			shared: true,
			useHTML: true
		},
		plotOptions: {
			column: {
				pointPadding: 0.2,
				borderWidth: 0
			}
		},
		series: [{
			name: 'errer',
			data: [49.9, 71.5, 106.4, 129.2]

		}, {
			name: 'ereee',
			data: [83.6, 78.8, 98.5, 93.4]

		}, {
			name: '6y65',
			data: [48.9, 38.8, 39.3, 41.4]

		}, {
			name: 'segf',
			data: [42.4, 33.2, 34.5, 39.7]

		}]
	});

	Highcharts.chart('jenis_kelamin', {
		chart: {
			type: 'column'
		},
		title: {
			text: 'Grafik Jenis Kelamin Berdasarkan Daerah'
		},
		xAxis: {
			categories: [
				'Pegaf',
				'Reremi',
				'Permai',
				'Amban',
				'Marina',
				'Irman Jaya'
			],
			crosshair: true
		},
		yAxis: {
			min: 0,
			title: {
				text: 'Jumlah (orang)'
			}
		},
		tooltip: {
			headerFormat: '<span style="font-size:10px">{point.key}</span><table>',
			pointFormat: '<tr><td style="color:{series.color};padding:0">{series.name}: </td>' +
				'<td style="padding:0"><b>{point.y:.1f} mm</b></td></tr>',
			footerFormat: '</table>',
			shared: true,
			useHTML: true
		},
		plotOptions: {
			column: {
				pointPadding: 0.2,
				borderWidth: 0
			}
		},
		series: [{
			name: 'Laki-Laki',
			data: [49.9, 71.5, 106.4, 129.2, 144.0, 176.0]

		}, {
			name: 'Perempuan',
			data: [83.6, 78.8, 98.5, 93.4, 106.0, 84.5]

		}]
	});
</script>