<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
<meta content="en-us" http-equiv="Content-Language" />
<meta content="text/html; charset=utf-8" http-equiv="Content-Type" />
<title>Untitled 1</title>
<style type="text/css">
.auto-style2 {
	border-collapse: collapse;
	border-left-width: 0px;
	border-right-width: 0px;
	border-bottom-width: 0px;
}
.auto-style5 {
	border-bottom-style: solid;
	border-bottom-width: 1px;
}
.auto-style7 {
	border-style: solid;
	border-width: 1px;
}
.auto-style8 {
	text-align: center;
}
.auto-style9 {
	text-align: center;
	font-size: xx-small;
}
.auto-style10 {
	font-size: x-large;
}
.auto-style11 {
	font-size: xx-small;
}
.auto-style18 {
	white-space: nowrap;
	border-style: none;
	border-width: medium;
}
.auto-style20 {
	border-style: none;
	border-width: medium;
}
.auto-style25 {
	white-space: nowrap;
	border-left-style: none;
	border-left-width: medium;
	border-right-style: none;
	border-right-width: medium;
	border-top-style: solid;
	border-top-width: 1px;
	border-bottom-style: none;
	border-bottom-width: medium;
}
</style>
</head>

<body>

<table style="width: 100%" class="auto-style2">
	<tr>
		<td style="width: 27px">&nbsp;</td>
		<td style="width: 240px">&nbsp;</td>
		<td>&nbsp;</td>
		<td class="auto-style11">&nbsp;</td>
		<td class="auto-style11">LAP-01</td>
	</tr>
	<tr>
		<td class="auto-style8" colspan="5"><span class="auto-style10">Dinas
		</span><span class="ILfuVd NA6bn"><span class="auto-style10">Pelayanan 
		Terpadu Satu Pintu</span></span></td>
	</tr>
	<tr>
		<td class="auto-style9" colspan="5">Jln. xxxxxxxxx</td>
	</tr>
	<tr>
		<td style="width: 27px" class="auto-style5">&nbsp;</td>
		<td style="width: 240px" class="auto-style5">&nbsp;</td>
		<td class="auto-style5">&nbsp;</td>
		<td class="auto-style5">&nbsp;</td>
		<td class="auto-style5">&nbsp;</td>
	</tr>
	<tr>
		<td style="width: 27px" class="auto-style7">No</td>
		<td style="width: 240px" class="auto-style7">Nama Pemohon / Perusahaan</td>
		<td class="auto-style7">alamat pemohon / perusahaan</td>
		<td class="auto-style7">Jenis Perizinan</td>
		<td class="auto-style7">Perizinan</td>
	</tr>
    <?php 
    $no=1;
    foreach ($query as $value) {?>
	<tr>
		<td style="width: 27px" class="auto-style7"><?=$no ?></td>
		<td style="width: 240px" class="auto-style7"><?=$value['nm_pemohon'] ?><br> <?= $value['alamat_pemohon'] ?></td>
		<td class="auto-style7"><?=$value['nm_perusahaan'] ?><br> <?= $value['alamat'] ?></td>
		<td class="auto-style7"><?=$value['nm_jenis_izin'] ?></td>
		<td class="auto-style7"><?=$value['nm_jenis_permohonan']?></td>
	</tr>
    <?php $no++;} ?>	
	<tr>
		<td class="auto-style25" colspan="5">&nbsp;</td>
	</tr>
	<tr>
		<td style="height: 25px;" class="auto-style18" colspan="3"></td>
		<td class="auto-style18" style="height: 25px">Barabai,</td>
		<td class="auto-style20" style="height: 25px"></td>
	</tr>
	<tr>
		<td class="auto-style18" colspan="5">&nbsp;</td>
	</tr>
	<tr>
		<td class="auto-style18" colspan="5">&nbsp;</td>
	</tr>
	<tr>
		<td class="auto-style18" colspan="3">&nbsp;</td>
		<td class="auto-style20"><?=$ttd['nip_ttd']?></td>
		<td class="auto-style18">&nbsp;</td>
	</tr>
	<tr>
		<td class="auto-style18" colspan="3">&nbsp;</td>
		<td class="auto-style20"><?=$ttd['jbt_ttd'] ?></td>
		<td class="auto-style18">&nbsp;</td>
	</tr>
</table>

</body>

</html>
