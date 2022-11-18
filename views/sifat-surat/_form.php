<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\icons\Icon;

/* @var $this yii\web\View */
/* @var $model app\models\SifatSurat */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="sifat-surat-form">

<div class="box box-danger">
    <div class="box-body">
        <div class="table-responsive">

        <?php $form = ActiveForm::begin(); ?>

        <?= $form->field($model, 'sifat')->textInput(['maxlength' => true]) ?>

         <div class="form-group">
            <?= Html::submitButton(Icon::show('save') . 'Simpan', ['class' => 'btn bg-olive']) ?>
        </div>

        <?php ActiveForm::end(); ?>
             </div>
        </div>
    </div>
</div>
