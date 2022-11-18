<?php
// use dickyermawan\hijridate\HijriDate;

// $hd = new HijriDate();

/*
* @Author 	: Dicky Ermawan S., S.T., MTA
* @Email 	: wanasaja@gmail.com
* @Dashboard: http://dickyermawan.dev.php.or.id/
* @Date 	: 2018-06-04 10:38:30
 * @Last Modified by: Dicky Ermawan S., S.T., MTA
 * @Last Modified time: 2019-01-29 14:40:58
*/
$pesanQr = 'RSUD Petala Bumi \n' . $model->nomor_surat .'\n' .  $model->nama  . '\n' . $model->nik . '\n' . Yii::$app->formatter->asDate($model->tanggal, 'php:l, d F Y')  . '\n' . $model->hasil;
?>

 <table style="width:100%; font-family: 'Times New Rowman', Times, serif;">
	<tbody>
		<tr>
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
			<td style="padding:4px">: <?= $model->tanggal_lahir ?></td>
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
<b> Hasil Rapid Test Anti SARS-Cov 2 IgM/IgG 	: <u><?= $model->hasil?></u>  </b>
</span>

<br><br>
<span style="font-family: 'Times New Rowman', Times, serif;">
Demikian surat keterangan ini dibuat dengan sebenarnya, dan mohon dipergunakan sebagaimana mestinya. <?php // $model->tujuan ?>
</span>
<br><br><br>

<table style="width:100%; font-family: 'Times New Rowman', Times, serif;">
	<tbody>
		<tr>
			<td style="width:55%"> 
                <barcode code="<?= $pesanQr ?>" disableborder="1" type="QR" class="barcode" size="1" error="M"/>
            </td>
			<td style="width:45%">
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
							Kepala Instalasi Laboratorium
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
							<strong><u> dr.Wiwit Nila Sukma, Sp.PK </u></strong><br>
							NIP.19811217 200803 2001 
						</td>
					</tr>
				</table>
			</td>
		</tr>
	</tbody>
</table>
