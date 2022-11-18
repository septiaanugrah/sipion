<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\icons\Icon;
use kartik\file\FileInput;
use kartik\date\DatePicker;
use kartik\select2\Select2;
use kartik\datecontrol\DateControl;

// $data_kode = \app\models\KodeSurat::dataKodeNama();

/* @var $this yii\web\View */
/* @var $model app\models\SuratKeputusan */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="surat-keputusan-form">

    <div class="box box-danger">
        <div class="box-body">
            <div class="table-responsive">
                <br>

                <?php $form = ActiveForm::begin(); ?>

                <div class="col-md-6">

                    <?= $form->field($model, 'tanggal')->widget(DateControl::classname(), [
                        'type'=>DateControl::FORMAT_DATE,
                        'ajaxConversion'=>false,
                        'widgetOptions' => [
                            'pluginOptions' => [
                                'autoclose' => true
                            ]
                        ]
                    ]); ?>

                </div>

                <div class="col-md-6">
                    <?= $form->field($model, 'perihal')->textArea(['maxlength' => true])->label($model->getAttributeLabel('perihal')); ?>
                </div>

                <div class="col-md-6">
                    <?= $form->field($model, 'penanggung_jawab')->textInput(['maxlength' => true])->label($model->getAttributeLabel('penanggung_jawab')); ?>
                </div>

                <div class="col-md-12">
                    <?php
                    echo '<label class="control-label">Unggah Hasil Scan Surat Masuk (.PDF)</label>';
                    echo $form->field($model, 'file')->widget(FileInput::classname(), [
                        'pluginOptions' => [
                            'showPreview' => true,
                            'previewFileType' => 'text',
                            'showCaption' => false,
                            'showRemove' => true,
                            'showCancel' => false,
                            'showUpload' => false,
                            'browseClass' => 'btn btn-default btn-block bg-blue',
                            'browseIcon' => '<i class="fa fa-file-pdf-o"></i> ',
                            'browseLabel' => ' Pilih File'
                        ],
                    ])->label(false);
                    ?>
                </div>  

                <div class="col-md-12">
                    <div class="form-group">
                        <?= Html::submitButton(Icon::show('save') . 'Simpan', ['class' => 'btn bg-olive']) ?>
                    </div>
                </div>

                <?php ActiveForm::end(); ?>

            </div> 