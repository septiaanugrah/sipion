<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\SuratPerintahTugasSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="surat-perintah-tugas-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'kode_surat') ?>

    <?= $form->field($model, 'nomor_surat') ?>

    <?= $form->field($model, 'tanggal') ?>

    <?= $form->field($model, 'tahun') ?>

    <?php // echo $form->field($model, 'memerintahkan') ?>

    <?php // echo $form->field($model, 'perintah') ?>

    <?php // echo $form->field($model, 'updated_by') ?>

    <?php // echo $form->field($model, 'updated_at') ?>

    <?php // echo $form->field($model, 'created_at') ?>

    <?php // echo $form->field($model, 'created_by') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
