<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\icons\Icon;
use kartik\file\FileInput;
use kartik\date\DatePicker;
use kartik\select2\Select2;


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

                    <?= $form->field($model, 'kode_surat')->hiddenInput(['maxlength' => true])->label(false); ?>

                    <?= $form->field($model, 'tanggal')->widget(DatePicker::classname(), [
                        'options' => ['placeholder' => 'Pilih Tanggal Surat'],
                        'type' => DatePicker::TYPE_COMPONENT_APPEND,
                        'removeButton' => false,
                        'pluginOptions' => [
                            'autoclose' => true,
                            'format' => 'dd-mm-yyyy',
                            'todayHighlight' => true,
                        ],
                    ])->label(false)->hiddenInput(['maxlength' => true]);
                    ?>

                </div>

                <div class="col-md-6">

                    <?= $form->field($model, 'alamat_pengirim')->hiddenInput(['maxlength' => true])->label(false); ?>

                    <?= $form->field($model, 'perihal')->hiddenInput(['maxlength' => true])->label(false); ?>

                </div>

                <div class="col-md-6">

                <?= $form->field($model, 'disposisi_1')->widget(Select2::classname(), [
                    // 'data' => $data_jabatan,
                    'options' => ['id' => 'disposisi_1', 'placeholder' => 'Pilih Disposisi'],
                    'pluginOptions' => [
                        'allowClear' => false,
                    ],
                ])->label(false)->hiddenInput(['maxlength' => true]);
                ?>
                </div>

                <div class="col-md-6">

                    <?= $form->field($model, 'disposisi_2')->widget(Select2::classname(), [
                        // 'data' => $data_jabatan,
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
                    echo $form->field($model, 'status')->hiddenInput(Yii::$app->params['dataStatus'], [
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
                    echo '<label class="control-label">Unggah Ulang Dokumen(.PDF)</label>';
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