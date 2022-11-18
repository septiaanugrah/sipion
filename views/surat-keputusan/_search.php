<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\SuratKeputusanSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="surat-keputusan-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'kode_surat') ?>

    <?= $form->field($model, 'nomor_surat') ?>

    <?= $form->field($model, 'tanggal') ?>

    <?= $form->field($model, 'tahun') ?>

    <?= $form->field($model, 'perihal') ?>

    <?= $form->field($model, 'kode_surat') ?>

    <?= $form->field($model, 'created_by') ?>

    <?php  ?>

    <?php  ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div> 