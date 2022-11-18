<?php
/*
 * @Author: Dicky Ermawan S., S.T., MTA 
 * @Email: wanasaja@gmail.com 
 * @Linkedin: linkedin.com/in/dickyermawan 
 * @Date: 2018-11-19 09:14:42 
 * @Last Modified by: Dicky Ermawan S., S.T., MTA
 * @Last Modified time: 2018-11-19 10:08:04
 */


use yii\helpers\Html;
use kartik\form\ActiveForm;
use kartik\icons\Icon;
use kartik\widgets\Select2;

/* @var $this yii\web\View */
/* @var $model app\models\Pengguna */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="pengguna-form">

    <div class="box box-success">
        <div class="box-header with-border">
            <h3 class="box-title">
            <?= Html::a(Icon::show('arrow-left'). ' Kembali', \Yii::$app->request->referrer, ['class' => 'btn btn-default']) ?>
            </h3>

            <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                </button>
                <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
            </div>
        </div>
        <!-- /.box-header -->
        <div class="box-body">
            <?php $form = ActiveForm::begin([
                'enableAjaxValidation' => true,
                'type' => ActiveForm::TYPE_HORIZONTAL,
            ]); ?>

            <?= $form->field($model, 'username')->textInput(['maxlength' => true, 'style' => 'width:50%;']) ?>

            <?= $form->field($model, 'password')->passwordInput(['maxlength' => true, 'style' => 'width:50%;']) ?>

            <?= $form->field($model, 'nama')->textInput(['maxlength' => true, 'style' => 'width:50%;']) ?>

            <?= $form->field($model, 'no_hp')->textInput(['type' => 'number', 'maxlength' => true, 'style' => 'width:50%;']) ?>
            
            <?php
                echo $form->field($model, 'akses')->widget(Select2::classname(), [
                    'data' => Yii::$app->params['dataAkses'],
                    'options' => ['id' => 'pb-akses', 'placeholder' => 'Pilih Jenis Akun...'],
                    'pluginOptions' => [
                        'allowClear' => false,
                        'style' => 'width:50%;'
                    ],
                    'pluginEvents' => [
                        'change' => 'function(e) { 
                                
                            }',
                    ],
                ])->label($model->getAttributeLabel('akses') . Html::tag('span', ' *', ['style' => 'color:red']));
            ?>

            <div class="form-group">
                <div class="col-sm-offset-2 col-sm-9">
                    <?= Html::submitButton(Icon::show('bookmark') . 'Simpan', ['class' => 'btn btn-success']) ?>
                </div>
            </div>

            <?php ActiveForm::end(); ?>
        </div>

    </div>

    

</div>
