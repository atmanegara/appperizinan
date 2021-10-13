

<!-- begin breadcrumb -->
<ol class="breadcrumb pull-right">
	<li class="breadcrumb-item"><a href="javascript:;">Home</a></li>
</ol>
<!-- end breadcrumb -->
<!-- begin page-header -->
<h1 class="page-header">Dashboard </h1>
<!-- end page-header -->
<!-- begin row -->
<div class="row">
	<!-- begin col-3 -->
	<div class="col-lg-3 col-md-6">
		<div class="widget widget-stats bg-gradient-green">
			<div class="stats-icon stats-icon-lg"><i class="fa fa-globe fa-fw"></i></div>
			<div class="stats-content">
                            <div class="stats-title">Pendaftar online s/d  tanggal (<?= date('d-m-Y') ?>)</div>
                            <div class="stats-number"><?= Yii::$app->formatter->asDecimal($queryOnline) ?></div>
				<div class="stats-progress progress">
					<div class="progress-bar" style="width: <?=$persenOnline ?> %;"></div>
				</div>
				<div class="stats-desc">Better than last week (<?=$persenOnline ?> %)</div>
			</div>
		</div>
	</div>
	<!-- end col-3 -->
	<!-- begin col-3 -->
	<div class="col-lg-3 col-md-6">
		<div class="widget widget-stats bg-gradient-blue">
			<div class="stats-icon stats-icon-lg"><i class="fa fa-dollar-sign fa-fw"></i></div>
			<div class="stats-content">
				<div class="stats-title">Pendaftar manual s/d  tanggal (<?= date('d-m-Y') ?>)</div>
				<div class="stats-number"><?= Yii::$app->formatter->asDecimal($queryOffline) ?></div>
				<div class="stats-progress progress">
					<div class="progress-bar" style="width: <?=$persenOffline ?> %;"></div>
				</div>
				<div class="stats-desc">Better than last week ( <?=$persenOffline ?> %)</div>
			</div>
		</div>
	</div>
	<!-- end col-3 -->
	<!-- begin col-3 -->
	<div class="col-lg-3 col-md-6">
		<div class="widget widget-stats bg-gradient-purple">
			<div class="stats-icon stats-icon-lg"><i class="fa fa-archive fa-fw"></i></div>
			<div class="stats-content">
				<div class="stats-title">Berkas Perizinan (Valid) s/d Hari (<?= date('d-m-Y') ?>)</div>
				<div class="stats-number"><?=$queryBerkasVerifikasi ?></div>
				<div class="stats-progress progress">
					<div class="progress-bar" style="width:100%;"></div>
				</div>
				<div class="stats-desc">Berkas yang sudah verifikasi baik online/offline</div>
			</div>
		</div>
	</div>
	<!-- end col-3 -->
	<!-- begin col-3 -->
	<div class="col-lg-3 col-md-6">
		<div class="widget widget-stats bg-gradient-black">
			<div class="stats-icon stats-icon-lg"><i class="fa fa-comment-alt fa-fw"></i></div>
			<div class="stats-content">
				<div class="stats-title">Total Pemohon s/d Tahun (<?= date('Y') ?>)</div>
				<div class="stats-number"><?=$queryAll?></div>
				<div class="stats-progress progress">
					<div class="progress-bar" style="width: 100%;"></div>
				</div>
				<div class="stats-desc">Total Pemohon baik online / offline</div>
			</div>
		</div>
	</div>
	<!-- end col-3 -->
</div>
<!-- end row -->

<!-- begin row -->
<div class="row">
	<!-- begin col-8 -->
	<div class="col-lg-8">
		<div class="panel panel-inverse" data-sortable-id="index-1">
			<div class="panel-heading">
				<div class="panel-heading-btn">
					<a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-default" data-click="panel-expand"><i class="fa fa-expand"></i></a>
					<a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-success" data-click="panel-reload"><i class="fa fa-redo"></i></a>
					<a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-warning" data-click="panel-collapse"><i class="fa fa-minus"></i></a>
					<a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-danger" data-click="panel-remove"><i class="fa fa-times"></i></a>
				</div>
				<h4 class="panel-title">Website Analytics (Last 7 Days)</h4>
			</div>
			<div class="panel-body">
				<div id="interactive-chart" class="height-sm"></div>
			</div>
		</div>
	</div>
	<!-- end col-8 -->
	<!-- begin col-4 -->
	<div class="col-lg-4">
			<div class="panel panel-inverse" data-sortable-id="index-6">
			<div class="panel-heading">
				<div class="panel-heading-btn">
					<a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-default" data-click="panel-expand"><i class="fa fa-expand"></i></a>
					<a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-success" data-click="panel-reload"><i class="fa fa-redo"></i></a>
					<a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-warning" data-click="panel-collapse"><i class="fa fa-minus"></i></a>
					<a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-danger" data-click="panel-remove"><i class="fa fa-times"></i></a>
				</div>
				<h4 class="panel-title">Data Perizinan pada tahun <?=date('Y')?></h4>
			</div>
			<div class="panel-body p-t-0">
				<div class="table-responsive">
					<table class="table table-valign-middle">
						<thead>
							<tr>	
								<th>Jenis Perizinan</th>
								<th>Total Pemohon</th>
							</tr>
						</thead>
						<tbody>
                                                    <?php foreach($queryIzin as $value){ ?>
							<tr>
								<td><label class="label label-default"><?=$value['nm_jenis_izin'] ?></label></td>
								<td><?= $value['jml_pengajuan'] ?><span class="text-primary"></span></td>
							</tr>
                                                    <?php } ?>
						</tbody>
					</table>
				</div>
			</div>
		</div>
	</div>
	<!-- end col-4 -->
</div>
<!-- end row -->
<!-- begin row -->
<div class="row">
	<!-- begin col-4 -->

	<!-- end col-4 -->
	<!-- begin col-4 -->
	<div class="col-lg-4">
		<!-- begin panel -->
		<div class="panel panel-inverse" data-sortable-id="index-3">
			<div class="panel-heading">
				<h4 class="panel-title">Jadwal Petugas Loket pertanggal <?= date('d-m-Y') ?></h4>
			</div>
			<div id="schedule-calendar" class="bootstrap-calendar"></div>
			<div class="list-group">
                            <?php foreach($model as $value){ ?>
				<a href="javascript:;" class="list-group-item d-flex justify-content-between align-items-center text-ellipsis">
					<?= $value['nama_petugas'] ?>
					<span class="badge f-w-500 bg-gradient-green f-s-10"><?= $value['jam_pagi'] ?></span>
						<span class="badge f-w-500 bg-gradient-blue f-s-10"><?= $value['jam_siang'] ?></span>
						<span class="badge f-w-500 bg-gradient-orange f-s-10"><?= $value['jam_sore'] ?></span>
				</a> 
                            <?php } ?>
			</div>
		</div>
		<!-- end panel -->
	</div>
        
	<!-- end col-4 -->
	<!-- begin col-4 -->
	<div class="col-lg-4">
		<!-- begin panel -->
		<div class="panel panel-inverse" data-sortable-id="index-4">
			<div class="panel-heading">
                            <h4 class="panel-title">Registrasi User Baru pertanggal <?= date('d-m-Y').' s/d '. date('d-m-Y', strtotime('+7 days', strtotime(date('d-m-Y')))) ?></h4>
			</div>
			<ul class="registered-users-list clearfix">
                            <?php foreach ($queryPemohonBaru as $value) { ?>
                               				<li>
					<a href="javascript:;"><img src="<?= './uploads/'.$value['foto_profil'] ?>" alt="" /></a>
					<h4 class="username text-ellipsis">
						<?= $value['nm_pemohon'] ?>
						<small><?= $value['no_ktp']?></small>
					</h4>
				</li> 
                          <?php  } ?>

				
				
			</ul>
			
		</div>
		<!-- end panel -->
	</div>
	<!-- end col-4 -->
</div>
<!-- end row -->
	
<script type="text/javascript">
	"use strict";
    function showTooltip(x, y, contents) {
        $('<div id="tooltip" class="flot-tooltip">' + contents + '</div>').css( {
            top: y - 45,
            left: x - 55
        }).appendTo("body").fadeIn(200);
    }
	if ($('#interactive-chart').length !== 0) {
	
        var data1 = [ 
            [1, 40], [2, 50], [3, 60], [4, 60], [5, 60], [6, 65], [7, 75], [8, 90], [9, 100], [10, 105], 
            [11, 110], [12, 110], [13, 120], [14, 130], [15, 135],[16, 145], [17, 132], [18, 123], [19, 135], [20, 150] 
        ];
        var data2 = [
            [1, 10],  [2, 6], [3, 10], [4, 12], [5, 18], [6, 20], [7, 25], [8, 23], [9, 24], [10, 25], 
            [11, 18], [12, 30], [13, 25], [14, 25], [15, 30], [16, 27], [17, 20], [18, 18], [19, 31], [20, 23]
        ];
        var xLabel = [
            [1,''],[2,''],[3,'May&nbsp;15'],[4,''],[5,''],[6,'May&nbsp;19'],[7,''],[8,''],[9,'May&nbsp;22'],[10,''],
            [11,''],[12,'May&nbsp;25'],[13,''],[14,''],[15,'May&nbsp;28'],[16,''],[17,''],[18,'May&nbsp;31'],[19,''],[20,'']
        ];
        $.plot($("#interactive-chart"), [{
			data: data1, 
			label: "Page Views", 
			color: COLOR_BLUE,
			lines: { show: true, fill:false, lineWidth: 2 },
			points: { show: true, radius: 3, fillColor: COLOR_WHITE },
			shadowSize: 0
		}, {
			data: data2,
			label: 'Visitors',
			color: COLOR_GREEN,
			lines: { show: true, fill:false, lineWidth: 2 },
			points: { show: true, radius: 3, fillColor: COLOR_WHITE },
			shadowSize: 0
		}], {
			xaxis: {  ticks:xLabel, tickDecimals: 0, tickColor: COLOR_BLACK_TRANSPARENT_2 },
			yaxis: {  ticks: 10, tickColor: COLOR_BLACK_TRANSPARENT_2, min: 0, max: 200 },
			grid: { 
				hoverable: true, 
				clickable: true,
				tickColor: COLOR_BLACK_TRANSPARENT_2,
				borderWidth: 1,
				backgroundColor: 'transparent',
				borderColor: COLOR_BLACK_TRANSPARENT_2
			},
			legend: {
				labelBoxBorderColor: COLOR_BLACK_TRANSPARENT_2,
				margin: 10,
				noColumns: 1,
				show: true
			}
		});
        var previousPoint = null;
        $("#interactive-chart").bind("plothover", function (event, pos, item) {
            $("#x").text(pos.x.toFixed(2));
            $("#y").text(pos.y.toFixed(2));
            if (item) {
                if (previousPoint !== item.dataIndex) {
                    previousPoint = item.dataIndex;
                    $("#tooltip").remove();
                    var y = item.datapoint[1].toFixed(2);
                    
                    var content = item.series.label + " " + y;
                    showTooltip(item.pageX, item.pageY, content);
                }
            } else {
                $("#tooltip").remove();
                previousPoint = null;            
            }
            event.preventDefault();
        });
    };
</script>