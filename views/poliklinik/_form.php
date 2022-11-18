<?php
/*
 * @Author: Dicky Ermawan S., S.T., MTA 
 * @Email: wanasaja@gmail.com 
 * @Linkedin: linkedin.com/in/dickyermawan 
 * @Date: 2018-11-19 11:36:42 
 * @Last Modified by:   Dicky Ermawan S., S.T., MTA 
 * @Last Modified time: 2018-11-19 11:36:42 
 */


use yii\helpers\Html;
use kartik\form\ActiveForm;
use kartik\icons\Icon;
use kartik\widgets\Select2;

/* @var $this yii\web\View */
/* @var $model app\models\Poliklinik */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="poliklinik-form">

    <div class="box box-success">
        <div class="box-header with-border">
            <h3 class="box-title">
            <?= Html::a(Icon::show('arrow-left') . ' Kembali', \Yii::$app->request->referrer, ['class' => 'btn btn-default']) ?>
            </h3>

            <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                </button>
                <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
            </div>
        </div>
        <!-- /.box-header -->
        <div class="box-body" style="padding-bottom:5%">
            <?php $form = ActiveForm::begin([
                'enableAjaxValidation' => true,
                'type' => ActiveForm::TYPE_HORIZONTAL,
            ]);?>

            <div class="col-md-offset-1 col-md-6">
            <?=$form->field($model, 'nama')->textInput(['maxlength' => true])?>
            </div>

            <div class="col-sm-offset-2 col-sm-9">
                <?= Html::submitButton(Icon::show('bookmark') . 'Simpan', ['class' => 'btn btn-success']) ?>
            </div>

            <?php ActiveForm::end();?>
        </div>
    </div>

</div>
