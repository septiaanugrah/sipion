<?php
/*
 * @Author: Dicky Ermawan S., S.T., MTA 
 * @Email: wanasaja@gmail.com 
 * @Linkedin: linkedin.com/in/dickyermawan 
 * @Date: 2018-09-28 09:02:30 
 * @Last Modified by: Dicky Ermawan S., S.T., MTA
 * @Last Modified time: 2018-11-19 11:41:24
 */

use yii\helpers\Html;
// use yii\bootstrap\ActiveForm;
use kartik\form\ActiveForm;
use kartik\icons\Icon;

$this->title = 'Sistem Informasi Perpustakaan Online';
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="login-logo" style="margin-bottom: 0px;">
    <img  style="margin: 0 auto; padding-bottom:5px; padding-right:0px" width="100px" src="<?= Yii::getAlias('@web') ?>/img/letter.png"/>   
    <br><a href="../../index2.html">SI<b>RARA</b></a><br>
  </div>
    <div style="margin-bottom: 25px; text-align:center;">
      <h3>
        Sistem Informasi Perpusatakaan Online
      </h3>
    </div>
  <!-- /.login-logo -->
  <div class="login-box-body">
    <p class="login-box-msg">Silahkan Masuk</p>

    <?php $form = ActiveForm::begin([
      // 'id' => 'login-form',
      'fieldConfig' => [
        'errorOptions' => [
          'encode' => false,
          'class' => 'help-block'
        ],
      ],
    ]); ?>

      <div class="form-group has-feedback">
        <!-- <input type="email" class="form-control" placeholder="Email"> -->
        <?= $form->field($model, 'username',['addon' => ['append' => ['content' => '<i class="fa fa-user"></i>']]])->textInput(['autofocus' => true, 'placeholder' => 'Ketik Username']) ?>
      </div>
      <div class="form-group has-feedback">
        <?= $form->field($model, 'password',['addon' => ['append' => ['content' => '<i class="fa fa-lock"></i>']]])->passwordInput(['autofocus' => true, 'placeholder' => 'Ketik Password']) ?>
      </div>
      <div class="row">
        <div class="col-xs-8">

        </div>
        <!-- /.col -->
        <div class="col-xs-4">
          <button type="submit" class="btn btn-primary btn-block btn-flat">Masuk <?= Icon::show('sign-in') ?></button>
        </div>
        <!-- /.col -->
      </div>
    <?php ActiveForm::end(); ?>
</div>