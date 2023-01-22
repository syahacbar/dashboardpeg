<!DOCTYPE HTML>
<html lang="en">
<title><?=$instansi->nama_instansi?> | Dashboard Kepegawaian</title>
<meta name="descrition" content="Home - Dashboard Kepegawaian"/>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0"/>

<link rel="shortcut icon" href="<?=$config->baseURL?>public/images/favicon.png" />
<link rel="stylesheet" type="text/css" href="<?=$config->baseURL?>public/vendors/font-awesome/css/all.css?r=<?=time()?>"/>
<link rel="stylesheet" type="text/css" href="<?=$config->baseURL?>public/vendors/bootstrap/css/bootstrap.min.css?r=<?=time()?>"/>
<link rel="stylesheet" type="text/css" href="<?=$config->baseURL?>public/themes/modern/builtin/css/bootstrap-custom.css?r=<?=time()?>"/>
<link rel="stylesheet" type="text/css" href="<?=$config->baseURL?>public/themes/modern/css/tanpalogin.css?r=<?=time()?>"/>
<link rel="stylesheet" type="text/css" href="<?=$config->baseURL?>public/vendors/overlayscrollbars/OverlayScrollbars.min.css?r=<?=time()?>"/>
<link rel="stylesheet" id="font-switch" type="text/css" href="<?=$config->baseURL . 'public/themes/modern/builtin/css/fonts/'.$app_layout['font_family'].'.css?r='.time()?>"/>
<link rel="stylesheet" id="font-size-switch" type="text/css" href="<?=$config->baseURL . 'public/themes/modern/builtin/css/fonts/font-size-'.$app_layout['font_size'].'.css?r='.time()?>"/>

<script type="text/javascript" src="<?=$config->baseURL?>public/vendors/jquery/jquery.min.js"></script>
<script type="text/javascript" src="<?=$config->baseURL?>public/themes/modern/js/site.js?r=<?=time()?>"></script>
<script type="text/javascript" src="<?=$config->baseURL?>public/vendors/bootstrap/js/bootstrap.min.js?r=<?=time()?>"></script>
<script type="text/javascript" src="<?=$config->baseURL?>public/vendors/overlayscrollbars/jquery.overlayScrollbars.min.js?r=<?=time()?>"></script>
<script type="text/javascript">
	var base_url = "<?=$config->baseURL?>";
</script>

<!-- Leaflet-->
	<link rel="stylesheet" href="https://unpkg.com/leaflet@1.6.0/dist/leaflet.css" />
	<script src="https://unpkg.com/leaflet@1.6.0/dist/leaflet.js"></script>

	<link rel="stylesheet" href="<?=$config->baseURL?>public/vendors/leaflet-locatecontrol/dist/L.Control.Locate.min.css" />
	<script src="<?=$config->baseURL?>public/vendors/leaflet-locatecontrol/src/L.Control.Locate.js"></script>

	<link rel="stylesheet" type="text/css" href="https://code.highcharts.com/css/highcharts.css">
	<script type="text/javascript" src="https://code.highcharts.com/highcharts.js"></script>
	<script type="text/javascript" src="https://code.highcharts.com/highcharts-3d.js"></script>
	<script type="text/javascript" src="https://code.highcharts.com/modules/exporting.js"></script>
	<script type="text/javascript" src="https://code.highcharts.com/modules/export-data.js"></script>
	<script type="text/javascript" src="https://code.highcharts.com/modules/accessibility.js"></script>

	<!-- datatables -->
	<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.13.1/css/jquery.dataTables.min.css">
<script type="text/javascript" src="https://cdn.datatables.net/1.13.1/js/jquery.dataTables.min.js"></script>

	
	<script src='https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.1.4/Chart.bundle.min.js'></script>
<style type="text/css">
	header, footer {
		background: #5a43a0;
	}

	footer *,
	header * {
		color: #fff;
	}

	footer li a, header li a {
		color: #fff !important;
	}

	footer li a:hover, header li a:hover {
		color: orange !important;
	}

	/* charts	*/
	#container {
	    height: 400px;
	}

	.highcharts-figure,
	.highcharts-data-table table {
	    min-width: 310px;
	    max-width: 800px;
	    margin: 1em auto;
	}

	.highcharts-data-table table {
	    font-family: Verdana, sans-serif;
	    border-collapse: collapse;
	    border: 1px solid #ebebeb;
	    margin: 10px auto;
	    text-align: center;
	    width: 100%;
	    max-width: 500px;
	}

	.highcharts-data-table caption {
	    padding: 1em 0;
	    font-size: 1.2em;
	    color: #555;
	}

	.highcharts-data-table th {
	    font-weight: 600;
	    padding: 0.5em;
	}

	.highcharts-data-table td,
	.highcharts-data-table th,
	.highcharts-data-table caption {
	    padding: 0.5em;
	}

	.highcharts-data-table thead tr,
	.highcharts-data-table tr:nth-child(even) {
	    background: #f8f8f8;
	}

	.highcharts-data-table tr:hover {
	    background: #f1f7ff;
	}

	/* css pie jenkel */
	.highcharts-figure,
	.highcharts-data-table table {
	    min-width: 320px;
	    max-width: 800px;
	    margin: 1em auto;
	}

	.highcharts-data-table table {
	    font-family: Verdana, sans-serif;
	    border-collapse: collapse;
	    border: 1px solid #ebebeb;
	    margin: 10px auto;
	    text-align: center;
	    width: 100%;
	    max-width: 500px;
	}

	.highcharts-data-table caption {
	    padding: 1em 0;
	    font-size: 1.2em;
	    color: #555;
	}

	.highcharts-data-table th {
	    font-weight: 600;
	    padding: 0.5em;
	}

	.highcharts-data-table td,
	.highcharts-data-table th,
	.highcharts-data-table caption {
	    padding: 0.5em;
	}

	.highcharts-data-table thead tr,
	.highcharts-data-table tr:nth-child(even) {
	    background: #f8f8f8;
	}

	.highcharts-data-table tr:hover {
	    background: #f1f7ff;
	}

	.highcharts-title {
	    color: rgb(51, 51, 51);
	    font-size: 18px;
	    fill: rgb(51, 51, 51);
	}

	input[type="number"] {
	    min-width: 50px;
	}

	* {
		font-family: "Lucida Grande", "Lucida Sans Unicode", Arial, Helvetica, sans-serif;
	}

</style>
</head>
<body>
	<div class="site-container">
	<header class="shadow-sm">
		<div class="menu-wrapper wrapper clearfix">
			<a href="#" id="mobile-menu-btn" class="show-mobile">
				<i class="fa fa-bars"></i>
			</a>
			<div class="nav-left">
				<a href="" class="logo-header" title="Jagowebdev">
					<img src="<?=$config->baseURL?>public/images/logohome.png" alt="Dashboard Kepegawaian"/>
				</a>
			</div>
			<nav class="nav-right nav-header">
				<ul class="main-menu">
					<li class="menu">
						<a class="depth-0" href="<?=$config->baseURL?>">
							<i class="menu-icon fas fa-home"></i>Home </a>
					</li>
					<li class="menu">
						<a class="depth-0" href="<?=$config->baseURL?>login"><i class="menu-icon fas fa-sign-in-alt"></i>Login</a>
					</li>
				</ul>
			</nav>
			<div class="clearfix"></div>
		</div>
	</header>
	<!-- <div class="page-container"> -->
	<div class="container">
		
		<div class="row p-2 border mt-3">
			<div class="col-sm-4">
				<!-- Golongan Ruang -->
				<div class="row">
					<div class="card highcharts-figure border-0">
					<div class="highcharts-title">
							<h5 class="p-3">Jumlah Pegawai berdasarkan Golongan/Ruang</h5>
						</div>
						 
						<div class="card-body">
								<div class="table-responsive">
								<table class="table table-striped table-bordered table-hover mytables">
								<thead>
								<tr>
									<th width="20px">No.</th>
									<th>Golongan/Ruang</th>
									<th>Jumlah</th>
								</tr>
								</thead>
								<tbody>
									<?php 	
										$no = 1;
										foreach ($golru AS $gr): 
									?>
										<tr>
											<td style="text-align: center;"><?php echo $no++; ?></td>
											<td style="text-align: center;"><?php echo $gr->golru; ?></td>
											<td style="text-align: center;"><?php echo $gr->jum_golru; ?></td>
										</tr>
									<?php endforeach ?>
								</tbody>
								</table>
								</div>
						</div>
					</div>
				</div>
			</div>

			<div class="col-sm-8">
				<div class="row">
					<figure class="highcharts-figure">
					    <div id="graph-golru" style="height: 600px;"></div>
					</figure>
				</div>
			</div>	
		</div>

		<div class="row p-2 border mt-3">
			<div class="col-sm-4">
				<!-- Jenis Kelamin -->
				<div class="row">
					<div class="card highcharts-figure border-0" style="height: 400px">
					<div class="highcharts-title">
							<h5 class="p-3">Jumlah Pegawai berdasarkan Jenis Kelamin</h5>
						</div>
						 
						<div class="card-body">
								<div class="table-responsive">
								<table class="table table-striped table-bordered table-hover mytables">
								<thead>
								<tr>
									<th>No.</th>
									<th>Jenis Kelamin</th>
									<th>Jumlah</th>
								</tr>
								</thead>
								<tbody>		
									
									<?php 	
										$no = 1;
										foreach ($gender AS $jk): 
									?>
										<tr>
											<td style="text-align: center;"><?php echo $no++; ?></td>
											<td><?php echo $jk->gender; ?></td>
											<td style="text-align: center;"><?php echo $jk->jum_gender; ?></td>
										</tr>
									<?php endforeach ?>
								</tbody>
								</table>
								</div>
						</div>
					</div>
				</div>

			</div>

			<div class="col-sm-8">
				<div class="row">
					<figure class="highcharts-figure">
					    <div id="graph-gender"></div>
					</figure>
				</div>
			</div>	

		</div>

		<div class="row p-2 border mt-3">
			<div class="col-sm-4">
				<!-- Jenis Kelamin -->
				<div class="row">
					<div class="card highcharts-figure border-0" style="height: 400px;">
					<div class="highcharts-title">
							<h5 class="p-3">Jumlah Pegawai berdasarkan Jenis Jabatan</h5>
						</div>
						 
						<div class="card-body">
								<div class="table-responsive">
								<table class="table table-striped table-bordered table-hover mytables">
								<thead>
								<tr>
									<th>No.</th>
									<th>Jenis Jabatan</th>
									<th>Jumlah</th>
								</tr>
								</thead>
								<tbody>		
									
									<?php 	
										$no = 1;
										foreach ($jenjab AS $jj): 
									?>
										<tr>
											<td style="text-align: center;"><?php echo $no++; ?></td>
											<td><?php echo ucwords(strtolower($jj->jj)); ?></td>
											<td style="text-align: center;"><?php echo $jj->jum_jj; ?></td>
										</tr>
									<?php endforeach ?>
								</tbody>
								</table>
								</div>
						</div>
					</div>
				</div>

			</div>

			<div class="col-sm-8">
				<div class="row">
					<figure class="highcharts-figure">
					    <div id="graph-jenjab"></div>
					</figure>
				</div>
			</div>	
		</div>
	</div>
	</div>
	<footer>
		<div class="footer-menu-container">
			<div class="wrapper clearfix">
				<div class="nav-left">Copyright &copy; 2023 <a title="Manokwari Web" href="https://manokwariweb.com">ManokwariWeb</a>
				</div>
				<nav class="nav-right nav-footer">
					<ul class=footer-menu>
						<li class="menu">
							<a class="depth-0" href="<?=$config->baseURL?>">Home</a>
						</li>
						<li class="menu">
							<a class="depth-0" href="tremofuser">Term of Use</a>
						</li>
					</ul>
				</nav>
			</div>
		</div>
	</footer>
	</div><!-- site-container -->


	<script>
	// Highcharts.setOptions({
	// 	colors: ['#50B432', '#ED561B', '#DDDF00', '#24CBE5', '#64E572', '#FF9655', '#FFF263', '#6AF9C4']
	// });

	var chart1;
	var chart2;
	
		// chart golru
		chart1 = new Highcharts.Chart({
		    chart: {
		        renderTo: 'graph-golru',
		        type: 'column',
		        options3d: {
		            enabled: true,
		            alpha: 15,
		            beta: 15,
		            depth: 50,
		            viewDistance: 25
		        }
		    },
		    xAxis: {
		        categories: [<?php foreach ($golru AS $gr){ echo "'".$gr->golru."',"; }?>]
		    },
		    yAxis: {
		        title: {
		            enabled: false
		        }
		    },
		    tooltip: {
		        headerFormat: '<b>Gol/Ruang : {point.key}</b><br>',
		        pointFormat: 'Jumlah: {point.y}'
		    },
		    title: {
		        text: 'Jumlah Pegawai berdasarkan Golongan/Ruang',
		        align: 'left'
		    },
		    legend: {
		        enabled: false
		    },
		    plotOptions: {
		        column: {
		            depth: 25
		        }
		    },
		    series: [{
		        data: [<?php foreach ($golru AS $gr){ echo $gr->jum_golru.","; }?>],
		        colorByPoint: true
		    }]
		});

		//graph gender
	
		chart2 = new Highcharts.Chart({
		    chart: {
		    	renderTo: 'graph-gender',
		        type: 'pie',
		        options3d: {
		            enabled: true,
		            alpha: 45,
		            beta: 0
		        }
		    },


		    title: {
		        text: 'Jumlah Pegawai berdasarkan Jenis Kelamin',
		        align: 'left'
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
		        name: 'Jumlah',
		        data: [<?php foreach($gender AS $jk){ echo "['".$jk->gender."',".$jk->jum_gender."],"; }?>
		        ]
		    }]
		});


		//graph jenjis jabatan
	
		chart2 = new Highcharts.Chart({
		    chart: {
		    	renderTo: 'graph-jenjab',
		        type: 'pie',
		        options3d: {
		            enabled: true,
		            alpha: 45,
		            beta: 0
		        }
		    },


		    title: {
		        text: 'Jumlah Pegawai berdasarkan Jenis Jabatan',
		        align: 'left'
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
		        name: 'Jumlah',
		        data: [<?php foreach($jenjab AS $jj){ echo "['".ucwords(strtolower($jj->jj))."',".$jj->jum_jj."],"; }?>
		        ]
		    }]
		});

		function showValues() {
		    document.getElementById('alpha-value').innerHTML = chart.options.chart.options3d.alpha;
		    document.getElementById('beta-value').innerHTML = chart.options.chart.options3d.beta;
		    document.getElementById('depth-value').innerHTML = chart.options.chart.options3d.depth;
		}

		// Activate the sliders
		document.querySelectorAll('#sliders input').forEach(input => input.addEventListener('input', e => {
		    chart.options.chart.options3d[e.target.id] = parseFloat(e.target.value);
		    showValues();
		    chart.redraw(false);
		}));

		showValues();


		   
	</script>


	<script>
		$(document).ready( function () {
		    $('.mytables').DataTable({
		    	"lengthChange": false,
		    	"searching": false
		    });

		} );
	</script>

</body>
</html>
