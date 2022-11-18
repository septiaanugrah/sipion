<?php

use yii\helpers\Html;
use kartik\icons\Icon;
use kartik\file\FileInput;
use kartik\date\DatePicker;
use kartik\form\ActiveForm;
use kartik\datecontrol\DateControl;
/* @var $this yii\web\View */
/* @var $model app\models\SuratRapid */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="surat-rapid-form">

<div class="box box-danger">
    <div class="box-body">
        <div class="table-responsive">
        <br>

<?php $form = ActiveForm::begin(); ?>

<div class="col-md-6">
    <?= $form->field($model, 'nama')->textInput(['maxlength' => true])->label($model->getAttributeLabel('nama')); ?>
    <?= $form->field($model, 'no_mr')->textInput(['maxlength' => true])->label($model->getAttributeLabel('no_mr')); ?>
</div>

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
    <?= $form->field($model, 'nik')->textInput(['maxlength' => true])->label($model->getAttributeLabel('nik')); ?>
</div>

<div class="col-md-6">
    <?= $form->field($model, 'alamat')->textArea(['maxlength' => true])->label($model->getAttributeLabel('alamat')); ?>
  
</div>


<div class="col-md-12">
<div class="form-group">
<?= Html::submitButton(Icon::show('save') . 'Simpan', ['class' => 'btn bg-olive']) ?>
</div>
</div>

<?php ActiveForm::end(); ?>

</div>
