<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\widgets\Select2;

use yii\widgets\Pjax;
/* @var $this yii\web\View */
/* @var $model app\models\KunjunganSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="kunjungan-search">

    <?php 
    Pjax::begin([
        'id' => 'pjax-search',
        // 'enablePushState' => false
    ]);
    ?>

    <?php $form = ActiveForm::begin([
        'action' => [Yii::$app->controller->action->id],
        'method' => 'get',
    ]); ?>

    <?php //echo $form->field($model, 'id') ?>

    <?php //echo $form->field($model, 'id_poliklinik') ?>

    <?php //echo $form->field($model, 'no_mr') ?>

    <?php // echo $form->field($model, 'nama_pasien') ?>

    <?php //echo $form->field($model, 'jenis_pembayaran') ?>

    <?php // echo $form->field($model, 'jenis_pasien') ?>

    <?php // echo $form->field($model, 'faskes_rujukan') ?>

    <?php  
        $dataSearch = [
            'semua' => 'Semua Kunjungan',
            'bulanIni' => 'Kunjungan Bulan Ini',
            'tahunIni' => 'Kunjungan Tahun Ini',
        ];
        $baseUrl = Yii::$app->getUrlManager()->getBaseUrl();

        echo $form->field($model, 'create_date')->widget(Select2::classname(), [
            'data' => $dataSearch,
            'options' => [
                'id' => 'search-wk', 
                // 'placeholder' => 'Pilih Poliklinik...'
            ],
            'pluginOptions' => [
                'allowClear' => false,
            ],
            'pluginEvents' => [
                'change' => 'function(e) { 
                    window.location = "'.$baseUrl.'/kunjungan/riwayat-semua?KunjunganSearch%5Bcreate_date%5D="+$("#search-wk").val();
                }',
            ],
        ])->label('<span style="color:#3c8dbc">Waktu Kunjungan</span>');
    ?>

    <?php // echo $form->field($model, 'change_by') ?>

    <?php // echo $form->field($model, 'processed') ?>

    <div class="form-group">
        <?php  // echo Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?php // echo Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

    <?php Pjax::end(); ?>

</div>
