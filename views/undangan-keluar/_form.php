<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\icons\Icon;
use kartik\file\FileInput;
use kartik\date\DatePicker;
use kartik\widgets\TimePicker;
use kartik\select2\Select2;
use kartik\datecontrol\DateControl;

$data_kode = \app\models\KodeSurat::dataKodeNama();

/* @var $this yii\web\View */
/* @var $model app\models\UndanganKeluar */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="undangan-keluar-form">

    <div class="box box-danger">
        <div class="box-body">
            <div class="table-responsive">
                <br>
                <?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]);; ?>

                <div class="col-md-6">
                    <?= $form->field($model, 'kode_surat')->widget(Select2::classname(), [
                        'data' =>  $data_kode,
                        'options' => ['placeholder' => 'Pilih Kode Surat'],
                        'pluginOptions' => [
                            'allowClear' => false,
                        ],
                    ])->label();
                    ?>

                    <?= $form->field($model, 'tanggal')->widget(DateControl::classname(), [
                        'type'=>DateControl::FORMAT_DATE,
                        'ajaxConversion'=>false,
                        'widgetOptions' => [
                            'pluginOptions' => [
                                'autoclose' => true,
                                'orientation' => 'bottom left'
                            ]
                        ]
                    ]); ?>

                    <?= $form->field($model, 'pukul')->widget(TimePicker::classname(), [
                        'pluginOptions' => [
                            'showMeridian' => false,
                        ]
                    ])->label($model->getAttributeLabel('pukul')); ?>

                </div>

                <div class="col-md-6">
                    <?= $form->field($model, 'tempat')->textInput(['maxlength' => true])->label($model->getAttributeLabel('tempat')); ?>

                    <?= $form->field($model, 'acara')->textArea(['maxlength' => true])->label($model->getAttributeLabel('acara')); ?>

                    <?= $form->field($model, 'keterangan')->textInput(['maxlength' => true])->label($model->getAttributeLabel('keterangan')); ?>
                </div>

                <div class="col-md-12">
                    <?php
                    echo '<label class="control-label">Unggah Hasil Scan Undangan Keluar (.PDF)</label>';
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