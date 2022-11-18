<?php

/*
* @Author 	: Dicky Ermawan S., S.T., MTA
* @Email 	: wanasaja@gmail.com
* @Dashboard: http://dickyermawan.dev.php.or.id/
* @Date 	: 2018-06-04 10:38:30
* @Last Modified by	 : Dicky Ermawan S., S.T., MTA
* @Last Modified time: 2018-07-06 09:35:51
*/

?>

 <table style="width:100%;">
	<tbody>
		<tr>
			<td>
			<img align="center" src="<?= \yii\helpers\Url::to('@web/img/riau.png', true) ?>" width="55" alt="logo" />
			</td>
			<td style="text-align:center;margin-top:0px" width="100%">
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
					<strong>
					Jl. Dr. Soetomo No. 65 Telp.(0761) 23024. Pekanbaru
					</strong>
				</h5>
			</td>
		</tr>
	</tbody>
</table>
<hr style="margin-top:0px">

<table style="width:100%; margin-bottom: 35px;">
	<tbody>
		<tr>
			<td style="text-align:center;" width="100%">
				<h4 style="padding-top:8px;margin-bottom:15px;margin-left:15%">
				<strong>
					Laporan Sistem Informasi Surat Menyurat
				</strong>
				</h4>
				<h4 style="padding-top:8px;margin-bottom:15px;margin-left:15%">
				<strong>
					<?= ucfirst($judulDokumen) ?>
				</strong>
				</h4>
			</td>
		</tr>
	</tbody>
</table>

<table class="table table-bordered" style="padding-top:50px; " cellspacing="0.65">
	<thead >
		<tr>
			<th style="padding:1%;">No.</th>
			<th style="padding:1%;">Nomor Surat</th>
			<th style="padding:1%;">Tanggal Surat</th>
			<th style="padding:1%;">Tujuan</th>
			<th style="padding:1%;" width="25%">Perihal</th>
		</tr>
	</thead>
	<tbody>
		<?php
			$no = 1;
			foreach($model as $m)
			{
				echo '<tr>';

					echo '<td style="padding:0.5%;">'.$no.'</td>';
					echo '<td style="padding:0.5%;">'.$m->nomor_surat.'</td>';
					echo '<td style="padding:0.5%;">'.Yii::$app->formatter->asDate($m->tanggal, 'long').'</td>';
					echo '<td style="padding:0.5%;">'.$m->tujuan.'</td>';
					echo '<td style="padding:0.5%;">'.$m->perihal.'</td>';
				echo '</tr>';
				$no++;
			}
		?>
	</tbody>
</table>