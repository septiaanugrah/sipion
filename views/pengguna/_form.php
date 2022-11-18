<?php

use yii\helpers\Html;
use kartik\form\ActiveForm;
use kartik\icons\Icon;
use kartik\widgets\Select2;

/* @var $this yii\web\View */
/* @var $model app\models\Pengguna */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="pengguna-form">

        <!-- /.box-header -->
        <div class="box box-danger">
            <div class="box-body">
                <div class="table-responsive">
            <br>
                <?php $form = ActiveForm::begin([
                    'enableAjaxValidation' => true,
                    'type' => ActiveForm::TYPE_VERTICAL,
                ]); ?>

            <div class="col-md-12">
                <?= $form->field($model, 'username')->textInput(['maxlength' => true]) ?>

                <?= $form->field($model, 'password')->passwordInput(['maxlength' => true]) ?>

                <?= $form->field($model, 'nama')->textInput(['maxlength' => true]) ?>

                <?= $form->field($model, 'no_hp')->textInput(['type' => 'number', 'maxlength' => true]) ?>
                
                <?php
                echo $form->field($model, 'akses')->widget(Select2::classname(), [
                    'data' => Yii::$app->params['dataAkses'],
                    'options' => ['id' => 'pb-akses', 'placeholder' => 'Jenis Pengguna'],
                    'pluginOptions' => [
                        'allowClear' => false,

                    ],
                    'pluginEvents' => [
                        'change' => 'function(e) { 
                            
                        }',
                    ],
                ]);
                ?> 
            </div>

           <div class="col-md-12">
                <div class="form-group">
                    <?= Html::submitButton(Icon::show('save') . 'Simpan', ['class' => 'btn bg-olive']) ?>
                </div>
            </div>

            <?php ActiveForm::end(); ?>
        </div>
    </div>
</div>
