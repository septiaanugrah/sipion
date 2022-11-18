<?php

$pesanQr = 'RSUD Petala Bumi \n' . $model->nomor_surat .'\n' .  $model->nama  . '\n' . Yii::$app->formatter->asDate($model->tanggal_lahir, 'php:d F Y') . '\n' . Yii::$app->formatter->asDate($model->tanggal, 'php:l, d F Y')  . '\n';
?>

 <table style="width:100%; font-family: 'Times New Rowman', Times, serif;">
	<tbody>
	<tr>
			<td>
				<img align="center" src="<?= \yii\helpers\Url::to('@web/img/riau.png', true) ?>" width="55" alt="logo" />
			</td>
			<td style="text-align:center;" width="80%">
				<h4>
					<strong>
					PEMERINTAH PROVINSI RIAU
					</strong>
				</h4>
				<h4>
					<strong>
					RUMAH SAKIT UMUM DAERAH PETALA BUMI
					</strong>
				</h4>
				<h5>
					Jl. Dr. Soetomo No. 65 Telp.(0761) 23024<br>
					Email: rsudpetalabumi@riau.go.id<br>
					<strong>
					PEKANBARU
					</strong>
				</h5>
			</td>
            <td>
				<img align="left" src="<?= \yii\helpers\Url::to('@web/img/rspb.png', true) ?>" width="100" alt="logo" />
			</td>
		</tr>
	</tbody>
</table>
<hr style="margin-top:0px;height:2.5px;border:none;color:#333;background-color:#333;">

<table style="width:100%; margin-bottom: 20px; font-family: 'Times New Rowman', Times, serif;">
	<tbody>
		<tr>
			<td style="text-align:center;margin-bottom:15px;" width="100%">
				<h4 style="padding-top:8px;margin-left:15%; font-family: 'Times New Rowman', Times, serif;">
				<strong><u>
					SURAT KETERANGAN PEMERIKSAAN URINE
				</u></strong>
				</h4>
				Nomor: <?= $model->nomor_surat ?>
			</td>
		</tr>
	</tbody>
</table>

<span style="font-family: 'Times New Rowman', Times, serif;">
Yang bertanda tangan dibawah ini Direktur Rumah Sakit Umum Daerah Petala Bumi Pekanbaru, Menerangkan bahwa:
</span>
<br>
<table class="" style="padding-top:20px;width:100%; font-family: 'Times New Rowman', Times, serif;" cellspacing="0.65">
	<tbody>
		<tr>
			<td style="width:25%;">Nama</td>
			<td style="padding:4px">: <b><?= $model->nama ?></b></td>
		</tr>
		<tr>
			<td style="width:25%;">Tempat/Tanggal Lahir</td>
			<td style="padding:4px">: <?= $model->tempat_lahir . ', ' .Yii::$app->formatter->asDate($model->tanggal_lahir, 'php:d F Y') ?></td>
		</tr>
		<tr>
			<td style="width:25%;">Pekerjaan</td>
			<td style="padding:4px">: <?= $model->pekerjaan ?></td>
		</tr>
		<tr>
			<td style="width:25%;">Alamat</td>
			<td style="padding:4px">: <?= $model->alamat ?></td>
		</tr>
	</tbody>
</table>
<table class="" style="padding-top:0px;width:100%; font-family: 'Times New Rowman', Times, serif;" cellspacing="0.65">
	<tbody>
		<tr>
			<td style="width:10%;"></td>
			<td style="width:15%;">RT/RW</td>
			<td style="padding:4px">: <?= $model->rt . ' / ' . $model->rw ?></td>
		</tr>
		<tr>
			<td style="width:8%;"></td>
			<td style="width:17%;">Kelurahan</td>
			<td style="padding:4px">: <?= $model->relasiKelurahan->nama ?></td>
		</tr>
		<tr>
			<td style="width:8%;"></td>
			<td style="width:17%;">Kecamatan</td>
			<td style="padding:4px">: <?= $model->relasiKecamatan->nama ?></td>
		</tr>
		<tr>
			<td style="width:8%;"></td>
			<td style="width:17%;">Kabupaten/Kota</td>
			<td style="padding:4px">: <?= $model->relasiKabupaten->nama ?></td>
		</tr>

	</tbody>
</table>
<br>
<span style="font-family: 'Times New Rowman', Times, serif;">
Telah dilakukan pemeriksaan urine terhadap nama diatas dengan hasil sebagai berikut: 
</span>
<br><br>
<table class="" style="padding-top:0px;width:100%; font-family: 'Times New Rowman', Times, serif;" cellspacing="0.65">
	<tbody>
		<tr>
			<td style="width:5%;"></td>
			<td style="width:20%;">1.  Amphethamine</td>
			<td style="padding:4px">: <?= $model->amphetamin ?></td>
		</tr>
		<tr>
			<td style="width:5%;"></td>
			<td style="width:20%;">2.  Morphine</td>
			<td style="padding:4px">: <?= $model->opiate ?></td>
		</tr>
		<tr>
			<td style="width:5%;"></td>
			<td style="width:20%;">3.  THC</td>
			<td style="padding:4px">: <?= $model->canabinoid ?></td>
		</tr>

	</tbody>
</table>
<br>
<span style="font-family: 'Times New Rowman', Times, serif;">
Demikian Surat Keterangan Pemeriksaan Urine ini dibuat dengan sebenarnya agar dapat dipergunakan sebagai persyaratan untuk <b><u><i><?= $model->keterangan ?> <i></u></b>
</span>
<br><br><br>

<table style="width:100%; font-family: 'Times New Rowman', Times, serif;">
	<tbody>
		<tr>
			<td align="center" style="width:50%"> 
				<barcode code="<?= $pesanQr ?>" disableborder="1" type="QR" class="barcode" size="1" error="M"/>
            </td>
			<td align="center" style="width:50%">
				Pekanbaru, <?= Yii::$app->formatter->asDate($model->tanggal, 'php:d F Y') ?>
				<!-- &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
				&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; -->
				<span>
					<?php // $hd->get_date(true, true) ?>
				</span>
				
				<br>
				<table>
					<tr>
						<td align="center">
							A.n. Direktur RSUD Petala Bumi<br>
							<!-- PROVINSI RIAU<br> -->
							Dokter Yang Menerangkan,
						</td>
					</tr>
				</table>
				<br>
				<br>
				<br>
				<br>
				<br>
				<table>
					<tr>
						<td align="center">
							<strong><u> <?= $model->relasiDokter->nama_dokter ?> </u></strong><br>
							NIP. <?= $model->relasiDokter->nip ?>
						</td>
					</tr>
				</table>
			</td>
		</tr>
	</tbody>
</table>
