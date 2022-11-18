<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\icons\Icon;

/* @var $this yii\web\View */
/* @var $model app\models\KodeSurat */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="kode-surat-form">


<div class="box box-danger">
    <div class="box-body">
        <div class="table-responsive">

        <?php $form = ActiveForm::begin(); ?>

        <?= $form->field($model, 'kode')->textInput(['maxlength' => true]) ?>

        <?= $form->field($model, 'keperluan')->textInput(['maxlength' => true]) ?>

        <div class="form-group">
            <?= Html::submitButton(Icon::show('save') . 'Simpan', ['class' => 'btn bg-olive']) ?>
        </div>

        <?php ActiveForm::end(); ?>
            </div>
        </div>
    </div>
</div>
