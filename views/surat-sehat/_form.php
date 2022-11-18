<?php

use yii\helpers\Html;
use kartik\form\ActiveForm;
use kartik\icons\Icon;
use kartik\file\FileInput;
use kartik\date\DatePicker;

/* @var $this yii\web\View */
/* @var $model app\models\SuratSehat */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="surat-sehat-form">

<div class="box box-danger">
    <div class="box-body">
        <div class="table-responsive">
            <br>

                <?php $form = ActiveForm::begin(); ?>

                <div class="col-md-6">
                <?= $form->field($model, 'nama')->textInput(['maxlength' => true])->label($model->getAttributeLabel('nama')); ?>
                <?php
                echo $form->field($model, 'jenis_kelamin', [
                    'template' => '{beginLabel}{labelTitle}{endLabel}<br>{input}{error}{hint}'
                ])->radioButtonGroup(Yii::$app->params['dataJenisKelamin'], [
                    'class' => 'btn-group-md',
                    'itemOptions' => ['labelOptions' => ['class' => 'btn btn-default']]
                ])->label($model->getAttributeLabel('jenis_kelamin'));
                ?>
                </div>

                  <div class="col-md-6">

                    <?= $form->field($model, 'alamat')->textArea(['maxlength' => true])->label($model->getAttributeLabel('alamat')); ?>
                </div>

                <div class="col-md-6">
                    <?= $form->field($model, 'keterangan')->textInput(['maxlength' => true])->label($model->getAttributeLabel('keterangan')); ?>
                </div>

   <div class="col-md-12">
        <div class="form-group">
            <?= Html::submitButton(Icon::show('save') . 'Simpan', ['class' => 'btn bg-olive']) ?>
        </div>
    </div>

    <?php ActiveForm::end(); ?>

</div>
