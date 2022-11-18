<?php
// use dickyermawan\hijridate\HijriDate;

// $hd = new HijriDate();

$pesanQr = 'RSUD Petala Bumi \n' . $model->nomor_surat .'\n' .  $model->nama  . '\n' . Yii::$app->formatter->asDate($model->tanggal_lahir, 'php:d F Y') . '\n' . Yii::$app->formatter->asDate($model->tanggal, 'php:l, d F Y')  . '\n';
?>

 <table style="width:100%; font-family: 'Times New Rowman', Times, serif;">
	<tbody>
		<!-- <tr>
			<td>
				<img align="center" src="<?= \yii\helpers\Url::to('@web/img/riau.png', true) ?>" width="55" alt="logo" />
			</td>
			<td style="text-align:center;" width="100%">
				<h3>
					<strong>
					PEMERINTAH PROVINSI RIAU
					</strong>
				</h3>
				<h3>
					<strong>
					RUMAH SAKIT UMUM DAERAH PETALA BUMI
					</strong>
				</h3>
				<h5>
					Jl. Dr. Soetomo No. 65 Telp.(0761) 23024<br>
					Email: rsudpetalabumi@riau.go.id<br>
					<strong>
					PEKANBARU
					</strong>
				</h5>
			</td>
		</tr> -->
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
					SURAT KETERANGAN PEMERIKSAAN LABORATORIUM
				</u></strong>
				</h4>
				Nomor: <?= $model->nomor_surat ?>
			</td>
		</tr>
	</tbody>
</table>

<span style="font-family: 'Times New Rowman', Times, serif;">
Berdasarkan pemeriksaan Laboratorium, pada hari <?= Yii::$app->formatter->asDate($model->tanggal, 'php:l, d F Y')?>, maka dengan ini menerangkan bahwa:
</span>
<br>
<table class="" style="padding-top:20px;width:100%; font-family: 'Times New Rowman', Times, serif;" cellspacing="0.65">
	<tbody>
		<tr>
			<td style="width:25%;">Nama</td>
			<td style="padding:4px">: <b><?= $model->nama ?></b></td>
		</tr>
		<tr>
			<td style="width:25%;">No. Rekam Medis</td>
			<td style="padding:4px">: <?= $model->no_mr ?></td>
		</tr>
		<tr>
			<td style="width:25%;">Tanggal Lahir</td>
			<td style="padding:4px">: <?= Yii::$app->formatter->asDate($model->tanggal_lahir, 'php:d F Y') ?></td>
		</tr>
		<tr>
			<td style="width:25%;">NIK</td>
			<td style="padding:4px">: <?= $model->nik ?></td>
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
			<td style="width:15%;">Kelurahan</td>
			<td style="padding:4px">: <?= $model->relasiKelurahan->nama ?></td>
		</tr>
		<tr>
			<td style="width:10%;"></td>
			<td style="width:15%;">Kecamatan</td>
			<td style="padding:4px">: <?= $model->relasiKecamatan->nama ?></td>
		</tr>
		<tr>
			<td style="width:10%;"></td>
			<td style="width:15%;">Kabupaten</td>
			<td style="padding:4px">: <?= $model->relasiKabupaten->nama ?></td>
		</tr>
		<tr>
			<td style="width:10%;"></td>
			<td style="width:15%;">Provinsi</td>
			<td style="padding:4px">: <?= $model->relasiProvinsi->nama ?></td>
		</tr>

	</tbody>
</table>
<br>
<span style="font-family: 'Times New Rowman', Times, serif;">
	<?php if($model->jenis === 'ANTIGEN') { ?>
		<b> Hasil Rapid Test Antigen SARS-Cov 2 : <u><?= $model->hasil?></u>  </b>
	<?php }
	 	  else if ($model->jenis == 'ANTIBODI') { ?>
		<b> Hasil Rapid Test Anti SARS-Cov 2 IgM/IgG 	: <u>NON-REAKTIF</u>  </b>
	<?php } ?> 
</span>

<br><br>
<span style="font-family: 'Times New Rowman', Times, serif;">
Demikian surat keterangan ini dibuat dengan sebenarnya, dan mohon dipergunakan sebagaimana mestinya. <?php // $model->tujuan ?>
</span>
<br><br><br>

<table style="width:100%; font-family: 'Times New Rowman', Times, serif;">
	<tbody>
		<tr>
			<td align="center" style="width:50%"> 
				<barcode code="<?= $pesanQr ?>" disableborder="1" type="QR" class="barcode" size="1" error="M"/>	
            </td>
			<td style="width:50%" align="center">
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
							<?php 
								if ($model->id_dokter == 213)
									echo 'Kepala Instalasi Laboratorium';
								else
									echo 'Dokter yang Menerangkan,';
							?> 
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
						<strong><u><?=$model->relasiDokter->nama_dokter?></u></strong><br>
							<?php if ($model->relasiDokter->nip != NULL)
									echo 'NIP.' .  $model->relasiDokter->nip;
								else
									echo '';
							?>
						</td>
					</tr>
				</table>
			</td>
		</tr>
	</tbody>
</table>
