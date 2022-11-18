<?php

/*
* @Author   : Dicky Ermawan S., S.T., MTA
* @Email    : wanasaja@gmail.com
* @Dashboard: http://dickyermawan.dev.php.or.id/
* @Date     : 2018-05-04 15:43:22
 * @Last Modified by: Dicky Ermawan S., S.T., MTA
 * @Last Modified time: 2018-11-19 14:48:55
*/

use yii\helpers\Html;
// use yii\widgets\ActiveForm;
use kartik\form\ActiveForm;
use kartik\icons\Icon;

?>

<div style="padding-top: 2%">
    <?php 
        $form = ActiveForm::begin([
            'enableAjaxValidation' => true,
            'id' => 'login-form-horizontal-1', 
            'type' => ActiveForm::TYPE_VERTICAL,
            'formConfig' => ['labelSpan' => 2, 'deviceSize' => ActiveForm::SIZE_SMALL],
            'action' => ['profil/ubah-profil?id='.$model->id]
        ]); 
    ?>
    
    <?= Html::activeHiddenInput($model, 'id', ['value' => $model->id]);  ?>

    <?= $form->field($model, 'username')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'nama')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'no_hp')->textInput(['maxlength' => true, 'type'=>'number']) ?>

    <?= Html::submitButton(Icon::show('save') . ' Simpan', ['class' => 'btn bg-olive']) ?>

    <?php ActiveForm::end(); ?>
</div>