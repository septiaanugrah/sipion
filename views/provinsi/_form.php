<?php

use yii\helpers\Html;

use kartik\form\ActiveForm;
use kartik\widgets\Select2;

/* @var $this yii\web\View */
/* @var $model app\models\Dokter */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="provinsi-form">

<div class="box box-danger">
    <div class="box-body">
        <div class="table-responsive">

                <?php $form = ActiveForm::begin(); ?>

                <?php 
                    echo $form->field($model, 'pulau')->widget(Select2::classname(), [
                    'data' => Yii::$app->params['dataPulau'],
                    'options' => ['id' => 'pulau_id', 'placeholder' => 'Pilih Pulau...', 'style' => 'text-transform: uppercase'],
                    'pluginOptions' => [
                        'allowClear' => false,
                    ],
                    'pluginEvents' => [
                        'change' => 'function(e) { 
                            
                        }',
                    ],
                    ])->label($model->getAttributeLabel('Nama Pulau') . Html::tag('span', ' *',['style'=>'color:red']));
                ?>

                <?= $form->field($model, 'nama')->textInput(['maxlength' => true])->label($model->getAttributeLabel('Nama Provinsi')) ?>

                <div class="form-group">
                    <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
                </div>

                <?php ActiveForm::end(); ?>
            </div>
        </div>
    </div>
</div>
