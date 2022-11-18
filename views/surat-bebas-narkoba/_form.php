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
use yii\web\JsExpression;
use yii\web\View;
use app\models\User;
/* @var $this yii\web\View */
/* @var $model app\models\SuratBebasNarkoba */
/* @var $form yii\widgets\ActiveForm */


$formatJs = <<< 'JS'
var formatRepo = function (repo) {
    if (repo.loading) {
        console.log('loading');
        return repo.nama;
    }
    var markup =
    '<div class="row" style="padding: 1%; font-size: 1em; font-family: \'Lato\', sans-serif;">' + 
        '<div class="col-sm-6" style="min-height: 0px;">' +
            repo.nama + 
        '</div>'
    + '</div>';
    // if (repo.description) {
    // markup += '<p>' + repo.description + '</p>';
    // }
    return '<div style="overflow:hidden;">' + markup + '</div>';
    };
    var formatRepoSelection = function (repo) {
        if(repo.nama)
            return repo.nama;
        else
            return repo.text;
        // return hasil || repo.text;
    }
JS;
 
// Register the formatting script
$this->registerJs($formatJs, View::POS_HEAD); 

// script to parse the results into the format expected by Select2
$resultsJs = <<< JS
function (data, params) {
    params.page = params.page || 1;
    return {
        results: data.items,
        pagination: {
            more: (params.page * 30) < data.total_count
        }
    };
}
JS;
?>

<div class="surat-bebas-narkoba-form">


<?php $form = ActiveForm::begin(); ?>
   
    <div class="box box-danger">
        <div class="box-body">
            <br>
            <div class="row">
                <div class="col-md-12">
                    <div class="col-md-6">
                        <?= $form->field($model, 'nama')->textInput(['maxlength' => true, 'style'=>'text-transform: uppercase;'])->label($model->getAttributeLabel('nama')); ?>
                    </div>

                    <div class="col-md-4">
                        <?= $form->field($model, 'alamat')->textArea(['maxlength' => true, 'style'=>'text-transform: uppercase;'])->label($model->getAttributeLabel('alamat')); ?>  
                    </div>

                    <div class="col-md-1">
                        <?= $form->field($model, 'rt')->textInput(['maxlength' => true])->label($model->getAttributeLabel('rt')); ?>
                    </div>

                    <div class="col-md-1">
                        <?= $form->field($model, 'rw')->textInput(['maxlength' => true])->label($model->getAttributeLabel('rw')); ?>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-12">
                    <div class="col-md-3">
                        <?= $form->field($model, 'tempat_lahir')->textInput(['maxlength' => true, 'style'=>'text-transform: uppercase;'])->label($model->getAttributeLabel('tempat_lahir')); ?> 
                    </div>

                    <div class="col-md-3">
                        <?= $form->field($model, 'tanggal_lahir')->widget(DateControl::classname(), [
                                    'type'=>DateControl::FORMAT_DATE,
                                    'ajaxConversion'=>false,
                                    'widgetOptions' => [
                                        'pluginOptions' => [
                                            'autoclose' => true,
                                            'orientation' => 'bottom left'
                                        ]
                                    ],
                            ]); ?>
                    </div>

                    <div class="col-md-6">
                        <?php
                            echo $form->field($model, 'kabupaten')->widget(Select2::classname(), [
                                'id' => 'kabupaten-id',
                                'name' => 'Kabupaten',
                                'options' => [
                                    'id' => 'kabupaten-id',
                                    'placeholder' => 'Ketik Nama Kabupaten/Kota'
                                ],
                                'pluginOptions' => [
                                    'allowClear' => true,
                                    'minimumInputLength' => 1,
                                    'ajax' => [
                                        'url' => Url::to(['/surat-bebas-narkoba/get-kabupaten']),
                                        'dataType' => 'json',
                                        'delay' => 250,
                                        'data' => new JsExpression('function(params) { return {q:params.term, page: params.page}; }'),
                                        'processResults' => new JsExpression($resultsJs),
                                        'cache' => true
                                    ],
                                    'escapeMarkup' => new JsExpression('function (markup) { return markup; }'),
                                    'templateResult' => new JsExpression('formatRepo'),
                                    'templateSelection' => new JsExpression('formatRepoSelection'),
                                ],
                                'pluginEvents' => [
                                    "select2:select" => "function() { 
                                        console.log($('#kabupaten-id').val());
                                        let id = $('#kabupaten-id').val();
                                    }",
                                ],
                            ])->label($model->getAttributeLabel('kabupaten'));
                        ?>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-12">
                    <div class="col-md-2">
                        <?php
                            echo $form->field($model, 'jenis_kelamin', [
                                'template' => '{beginLabel}{labelTitle}{endLabel}<br>{input}{error}{hint}'
                            ])->radioButtonGroup(Yii::$app->params['dataJenisKelamin'], [
                                'class' => 'btn-group-md',
                                'itemOptions' => ['labelOptions' => ['class' => 'btn btn-default']]
                            ])->label($model->getAttributeLabel('jenis_kelamin'));
                        ?>
                    </div>

                    <div class="col-md-4">
                        <?= $form->field($model, 'pekerjaan')->textInput(['maxlength' => true, 'style'=>'text-transform: uppercase;'])->label($model->getAttributeLabel('pekerjaan')); ?> 
                    </div>

                    <div class="col-md-6">
                        <?php
                            echo $form->field($model, 'kecamatan')->widget(DepDrop::classname(), [
                                'type' => DepDrop::TYPE_SELECT2,
                                'options'=>['id'=>'kecamatan-id'],
                                'pluginOptions'=>[
                                    'depends'=>['kabupaten-id'],
                                    'placeholder'=>'Pilih Kecamatan...',
                                    'url'=>Url::to(['/surat-bebas-narkoba/get-kecamatan'])
                                ]
                                ]);
                        ?>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-12">
                    <div class="col-md-6">
                        <?= $form->field($model, 'keterangan')->textInput(['maxlength' => true, 'style'=>'text-transform: uppercase;'])->label($model->getAttributeLabel('keterangan')); ?>
                    </div>
                    <div class="col-md-6">
                        <?php
                            echo $form->field($model, 'kelurahan')->widget(DepDrop::classname(), [
                                'type' => DepDrop::TYPE_SELECT2,
                                'options'=>['id'=>'kelurahan-id'],
                                'pluginOptions'=>[
                                    'depends'=>['kecamatan-id'],
                                    'placeholder'=>'Pilih Kelurahan...',
                                    'url'=>Url::to(['/surat-bebas-narkoba/get-kelurahan'])
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
                </div>
            </div>

            <div class="row">
                <div class="col-md-12">
                    <div class="col-md-6">
                        <?php 
                            echo $form->field($model, 'id_dokter')->widget(Select2::classname(), [
                                'data' => $dataDokter,
                                'options' => ['id' => 'dokter-id', 'placeholder' => 'Pilih Dokter Penanggung Jawab',],
                                'pluginOptions' => [
                                    'allowClear' => false,
                                ],
                            ]);
                        ?>
                    </div>
                </div>
            </div>


            <?php if (in_array(Yii::$app->user->identity->akses, [ User::ROLE_ADMIN_LABORATORIUM ])) { ?>
                <div class="col-md-12">
                    <div class="form-group">
                    <?= Html::submitButton(Icon::show('save') . 'Simpan', ['class' => 'btn bg-olive']) ?>
                    </div>
                </div>
            <?php } ?>
        </div>
    </div>

<?php ActiveForm::end(); ?>

</div>

<?php

$this->registerJs($this->render('form.js'));
