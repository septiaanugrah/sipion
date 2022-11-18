<?php

use yii\helpers\Html;
use kartik\icons\Icon;
use kartik\file\FileInput;
use kartik\date\DatePicker;
use kartik\form\ActiveForm;
use kartik\datecontrol\DateControl;
use kartik\select2\Select2;
use kartik\depdrop\DepDrop;
use yii\helpers\Url;
/* @var $this yii\web\View */
/* @var $model app\models\SuratRapid */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="surat-rapid-form">

<?php $form = ActiveForm::begin(); ?>
<div class="box box-danger">
    <div class="box-body">
        <br>

        <div class="row">
            <div class="col-md-12">
                <div class="col-md-6">
                    <?= $form->field($model, 'nama')->textInput(['maxlength' => true, 'style'=>'text-transform: uppercase;'])->label($model->getAttributeLabel('nama')); ?>
                </div>
                <div class="col-md-6">
                    <?= $form->field($model, 'alamat')->textArea(['maxlength' => true, 'style'=>'text-transform: uppercase;'])->label($model->getAttributeLabel('alamat')); ?>     
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-12">
                <div class="col-md-6">
                    <?= $form->field($model, 'no_mr')->textInput(['maxlength' => true, 'type' => 'number'])->label($model->getAttributeLabel('no_mr')); ?>
                </div>
                <div class="col-md-6">
                    <?php
                        echo $form->field($model, 'provinsi')->widget(Select2::classname(), [
                            'data' => $dataProvinsi,
                            'options' => ['id' => 'provinsi-id', 'placeholder' => 'Pilih Provinsi...',],
                            'pluginOptions' => [
                                'allowClear' => false,
                            ],
                            'pluginEvents' => [
                                'change' => 'function(e) { 
                                    let idProvinsi = $("#pb-provinsi").val();
                                    console.log(idProvinsi); 
                                }',
                            ],
                            ]);
                    ?>
                </div>
            </div>
        </div>
        
        <div class="row">
            <div class="col-md-12">
                <div class="col-md-6">
                    <?= $form->field($model, 'tanggal_lahir')->widget(DateControl::classname(), [
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
                    <?php
                        echo $form->field($model, 'kabupaten')->widget(DepDrop::classname(), [
                            'type' => DepDrop::TYPE_SELECT2,
                            'options'=>['id'=>'kabupaten-id'],
                            'pluginOptions'=>[
                                'depends'=>['provinsi-id'],
                                'placeholder'=>'Pilih Kabupaten...',
                                'url'=>Url::to(['/surat-rapid/get-kabupaten'])
                            ]
                            ]);
                    ?>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-12">
                <div class="col-md-6">
                    <?= $form->field($model, 'nik')->textInput(['maxlength' => true, 'type' => 'number'])->label($model->getAttributeLabel('nik')); ?>
                </div>
                <div class="col-md-6">
                    <?php
                        echo $form->field($model, 'kecamatan')->widget(DepDrop::classname(), [
                            'type' => DepDrop::TYPE_SELECT2,
                            'options'=>['id'=>'kecamatan-id'],
                            'pluginOptions'=>[
                                'depends'=>['kabupaten-id'],
                                'placeholder'=>'Pilih Kecamatan...',
                                'url'=>Url::to(['/surat-rapid/get-kecamatan'])
                            ]
                        ]);
                    ?>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-12">
                <div class="col-md-6">
    
                </div>

                <div class="col-md-6">
                    <?php
                        echo $form->field($model, 'kelurahan')->widget(DepDrop::classname(), [
                            'type' => DepDrop::TYPE_SELECT2,
                            'options'=>['id'=>'kelurahan-id'],
                            'pluginOptions'=>[
                                'depends'=>['kecamatan-id'],
                                'placeholder'=>'Pilih Kelurahan...',
                                'url'=>Url::to(['/surat-rapid/get-kelurahan'])
                            ]
                            ]);
                    ?>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-12">
                <div class="col-md-6">
                    <?php
                        echo $form->field($model, 'hasil', [
                            'template' => '{beginLabel}{labelTitle}{endLabel}<br>{input}{error}{hint}'
                        ])->radioButtonGroup(Yii::$app->params['dataHasilPemeriksaan'], [
                            'class' => 'btn-group-md',
                            'itemOptions' => ['labelOptions' => ['class' => 'btn btn-default']]
                        ])->label($model->getAttributeLabel('hasil-pemeriksaan'));
                    ?>
                </div>
            </div>
        </div>
        
          
    
        <div class="col-md-12">
            <div class="form-group">
            <?= Html::submitButton(Icon::show('save') . 'Simpan', ['class' => 'btn bg-olive']) ?>
            </div>
        </div>
    </div>
</div>
    
<?php ActiveForm::end(); ?>

</div>
