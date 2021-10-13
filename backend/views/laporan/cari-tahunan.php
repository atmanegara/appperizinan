
<head>
<meta content="en-us" http-equiv="Content-Language">
<style type="text/css">
.auto-style1 {
	border-collapse: collapse;
}
.auto-style2 {
	border-style: solid;
	border-width: 1px;
}
.auto-style3 {
	border-bottom-style: solid;
	border-bottom-width: 1px;
}
.auto-style4 {
	text-align: center;
}
</style>
</head>
<div class="col-md-5">
 
<table class="auto-style1" style="width: 100%">
	<tr>
		<td colspan="3" class="auto-style4">DINAS PERIZINAN SATU PINTU</td>
	</tr>
	<tr>
		<td style="height: 24px; width: 54px"></td>
		<td style="height: 24px"></td>
		<td style="height: 24px"></td>
	</tr>
	<tr>
		<td style="width: 54px">&nbsp;</td>
		<td>Tahun / Bulan : <?= $tahun ?></td>
		<td>&nbsp;</td>
	</tr>
	<tr>
		<td class="auto-style3" style="width: 54px">&nbsp;</td>
		<td class="auto-style3">&nbsp;</td>
		<td class="auto-style3">&nbsp;</td>
	</tr>
	<tr>
		<td class="auto-style2" style="width: 54px">No</td>
		<td class="auto-style2">Nama Perizinan</td>
		<td class="auto-style2">Jumlah</td>
	</tr>
        <?php 
        $no=1;
        foreach ($query as $value) {
   
        ?>
	<tr>
		<td class="auto-style2" style="width: 54px"><?=$no ?></td>
		<td class="auto-style2"><?= $value['nm_jenis_izin'] ?></td>
		<td class="auto-style2"><?= $value['jml_pengajuan'] ?></td>
	</tr>
        <?php $no++;} ?>
</table>
 
</div>
<div class="col-md-7">
  			<div id="donut-chart" class="height-sm"></div>
</div>

<script>

	if ($('#donut-chart').length !== 0) {
        var donutData = <?= $dataJson?>;
		$.plot('#donut-chart', donutData, {
			series: {
				pie: {
					innerRadius: 0.5,
					show: true,
					label: {
						show: true
					}
				}
			},
			legend: {
				show: true
			}
		});
    }


    </script>