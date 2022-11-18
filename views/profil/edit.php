<?php

/*
* @Author 	: Dicky Ermawan S., S.T., MTA
* @Email 	: wanasaja@gmail.com
* @Dashboard: http://dickyermawan.dev.php.or.id/
* @Date 	: 2018-05-04 15:13:59
 * @Last Modified by: Dicky Ermawan S., S.T., MTA
 * @Last Modified time: 2018-11-13 18:59:555
*/

use kartik\tabs\TabsX;

$this->title = 'Profil';
// $this->params['secondTitle'] = 'Edit';
$this->params['breadcrumbs'][] = $this->title;
?>

<style>
	.tabs-krajee.tabs-left .nav-tabs, .tabs-krajee.tabs-right .nav-tabs {
	    width: 169px;
	}
	.tabs-krajee.tabs-left .tab-content {
	    margin-left: 168px;
	}
</style>


<?php 
	$items = [
		[
			'label'=>'<i class="fa fa-lock"></i> Ubah Password',
	        // 'content'=>$this->render('_form-profil', ['model' => $model]),
	        'content'=>$this->render('_form-password', ['passmodel' => $passmodel]),
	    ],
		[
			'label'=>'<i class="fa fa-user"></i> Ubah Data Profil',
			'content'=> $this->render('_form-profil', ['model' => $model]),
			// 'content'=>'asdads',
			'active'=>true
		],
	];
?>

<div class="profil-edit">

	<div class="box box-danger">
        <div class="box-body">
            <div class="table-responsive">
	<?php

	echo TabsX::widget([
		'items' => $items,
		'position' => TabsX::POS_LEFT,
		'align' => TabsX::ALIGN_RIGHT,
		'bordered' => true,
		'encodeLabels' => false
	]);
	?>
			</div>
		</div>
	</div>
</div>