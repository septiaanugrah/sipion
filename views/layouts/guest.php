<?php 
/*
 * @Author: Dicky Ermawan S., S.T., MTA 
 * @Email: wanasaja@gmail.com 
 * @Linkedin: linkedin.com/in/dickyermawan 
 * @Date: 2018-09-28 08:46:51 
 * @Last Modified by: Dicky Ermawan S., S.T., MTA
 * @Last Modified time: 2018-11-23 19:08:12
 */

use dmstr\widgets\Alert;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\Pjax;

use app\models\Profil;

/* @var $this \yii\web\View */
/* @var $content string */
$this->title = $this->title;
dmstr\web\AdminLteAsset::register($this);
app\assets\AppAsset::register($this);
use kartik\icons\Icon;

// Icon::map($this);
?>

<?php $this->beginPage() ?>
<!DOCTYPE html>
<html>
<head>
    <!-- /*
    * @Author: Dicky Ermawan S., S.T., MTA
    * @Email: wanasaja@gmail.com
    * @Linkedin: linkedin.com/in/dickyermawan
    * @Date: 2018-11-17 23:59:45
    * @Last Modified by:   Dicky Ermawan S., S.T., MTA
    * @Last Modified time: 2018-11-17 23:59:45
    */ -->

    <meta charset="UTF-8">
    <?= Html::csrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
    <!-- Google Font -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">

    <!-- <link href="//code.ionicframework.com/ionicons/1.5.2/css/ionicons.min.css" rel="stylesheet" type="text/css"/> -->

    <?php $this->head() ?>
    <link rel="icon" type="image/jpg" href="<?= Yii::$app->request->baseUrl; ?>/img/letter.png">
</head>

<body class="hold-transition login-page">
<?php $this->beginBody() ?>
<div class="login-box">
    <?= $content ?>
  <!--  -->
  <!-- /.login-box-body -->
</div>
<!-- /.login-box -->

<div class="row" style="padding-bottom:2%">
    <div class="text-center">
        <a href="http://rsudpetalabumi.riau.go.id/">RSUD Petala Bumi Provinsi Riau</a>
    </div>
    <div class="lockscreen-footer text-center">
        Developed with <span title="<?=Yii::$app->params['love']?>"><?=Icon::show('heart')?></span> by <b><a href="" class="text-black">Unit EDP RSUD Petala Bumi</a></b> - ©2022<br>
        All rights reserved
    </div>
</div>

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
