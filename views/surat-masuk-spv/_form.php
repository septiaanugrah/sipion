<?php

use yii\helpers\Html;
use kartik\form\ActiveForm;
use kartik\icons\Icon;
use kartik\file\FileInput;
use kartik\date\DatePicker;
use kartik\select2\Select2;
use kartik\datecontrol\DateControl;


/* @var $this yii\web\View */
/* @var $model app\models\SuratMasuk */
/* @var $form yii\widgets\ActiveForm */

// $data_sifat = \app\models\SifatSurat::dataSifatId();
?>

<div class="surat-masuk-form">

    <div class="box box-danger">
        <div class="box-body">
            <div class="table-responsive">
                <br>
                <?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]);; ?>

                <div class="col-md-6">

                    <?= $form->field($model, 'kode_surat')->textInput(['maxlength' => true])->label($model->getAttributeLabel('kode_surat')); ?>

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
                    
                </div>

                <div class="col-md-6">

                    <?= $form->field($model, 'alamat_pengirim')->textInput(['maxlength' => true])->label($model->getAttributeLabel('alamat_pengirim')); ?>

                    <?= $form->field($model, 'perihal')->textArea(['maxlength' => true])->label($model->getAttributeLabel('perihal')); ?>

                </div>


                <div class="col-md-6">

                    <?= $form->field($model, 'disposisi_1')->widget(Select2::classname(), [
                        'data' => $data_jabatan,
                        'options' => ['id' => 'disposisi_1', 'placeholder' => 'Pilih Disposisi'],
                        'pluginOptions' => [
                            'allowClear' => false,
                        ],
                    ])->label(false)->hiddenInput(['maxlength' => true]);
                    ?>
                </div>

                <div class="col-md-6">

                    <?= $form->field($model, 'disposisi_2')->widget(Select2::classname(), [
                        'data' => $data_jabatan,
                        'options' => ['id' => 'disposisi_2', 'placeholder' => 'Pilih Disposisi'],
                        'pluginOptions' => [
                            'allowClear' => false,
                        ],
                    ])->label(false)->hiddenInput(['maxlength' => true]);
                    ?>
                </div>

                <div class="col-md-6">

                <?= $form->field($model, 'disposisi_lainnya')->HiddenInput(['maxlength' => true])->label($model->getAttributeLabel('disposisi_lainnya'))->label(false); ?>

                </div>

                <div class="col-md-6">
                <?php
                    echo $form->field($model, 'status', [
                        'template' => '{beginLabel}{labelTitle}{endLabel}<br>{input}{error}{hint}'
                        ])->hiddenInput(Yii::$app->params['dataStatus'], [
                            'class' => 'btn-group-md',
                            'itemOptions' => ['labelOptions' => ['class' => 'btn btn-default']]
                        ])->label(false);
                        ?>
                </div>

                <div class="col-md-12">

                <?= $form->field($model, 'keterangan')->hiddenInput(['maxlength' => true])->label(false); ?>

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