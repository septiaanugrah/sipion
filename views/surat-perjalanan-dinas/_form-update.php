<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\icons\Icon;
use kartik\file\FileInput;
use kartik\date\DatePicker;
use kartik\select2\Select2;

/* @var $this yii\web\View */
/* @var $model app\models\SuratKeputusan */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="surat-perjalanan-dinas-form">

    <div class="box box-danger">
        <div class="box-body">
            <div class="table-responsive">
                <br>

                <?php $form = ActiveForm::begin(); ?>

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
                    <?= $form->field($model, 'nama')->hiddenInput(['maxlength' => true])->label(false); ?>
                </div>

                <div class="col-md-12">
                    <?= $form->field($model, 'keterangan')->hiddenInput(['maxlength' => true])->label(false); ?>
                </div>

                <div class="col-md-12">
                    <?php
                    echo '<label class="control-label">Unggah Ulang Hasil Scan Surat Masuk (.PDF)</label>';
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