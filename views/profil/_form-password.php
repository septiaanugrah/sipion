<?php

/*
* @Author   : Dicky Ermawan S., S.T., MTA
* @Email    : wanasaja@gmail.com
* @Dashboard: http://dickyermawan.dev.php.or.id/
* @Date     : 2018-05-04 16:19:25
 * @Last Modified by: Dicky Ermawan S., S.T., MTA
 * @Last Modified time: 2018-11-13 18:11:477
*/

use yii\helpers\Html;
use kartik\form\ActiveForm;
use kartik\icons\Icon;

?>

<div style="padding-top: 2%">
    <?php 
        $form = ActiveForm::begin([
            'id' => 'login-form-horizontal-2', 
            'type' => ActiveForm::TYPE_VERTICAL,
            'formConfig' => ['labelSpan' => 2, 'deviceSize' => ActiveForm::SIZE_SMALL],
            'action' => ['profil/ubah-password']
        ]); 
    ?>
    
    <?= Html::activeHiddenInput($passmodel, 'id', ['value' => $passmodel->id]);  ?>

    <?= $form->field($passmodel, 'username')->textInput(['maxlength' => true, 'readOnly' => true]) ?>

    <?= $form->field($passmodel, 'pass_lama')->passwordInput(['maxlength' => true]) ?>

    <?= $form->field($passmodel, 'pass_baru')->passwordInput(['maxlength' => true]) ?>

    <?= $form->field($passmodel, 'pass_baru2')->passwordInput(['maxlength' => true]) ?>
 
    <?= Html::submitButton(Icon::show('save') . ' Simpan', ['class' => 'btn bg-olive']) ?>

    <?php ActiveForm::end(); ?>
</div>