<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Dokter */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="kabupaten-form">

<div class="box box-danger">
    <div class="box-body">
        <div class="table-responsive">

                <?php $form = ActiveForm::begin(); ?>

                <?= $form->field($model, 'id')->textInput(['maxlength' => true]) ?>
                
                <?= $form->field($model, 'nama')->textInput(['maxlength' => true]) ?>

                <div class="form-group">
                    <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
                </div>

                <?php ActiveForm::end(); ?>
            </div>
        </div>
    </div>
</div>
