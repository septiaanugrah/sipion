<?php

use dmstr\widgets\Alert;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\Pjax;
use yii\widgets\Breadcrumbs;

use kartik\dialog\Dialog;
Dialog::widget(['overrideYiiConfirm' => true]);
Dialog::widget([
    'options' => [
        'closable' => true
    ],
    'dialogDefaults' => [
        Dialog::DIALOG_CONFIRM => [
            'type' => Dialog::TYPE_WARNING,
            'title' => Yii::t('kvdialog', 'Konfirmasi'),
            'btnOKClass' => 'btn-warning',
            'btnCancelLabel' => '<span class="glyphicon glyphicon-ban-circle"></span> ' . Yii::t('kvdialog', 'Batal')
        ],
    ]
]);

use app\models\Profil;

setlocale(LC_ALL, 'IND');
/* @var $this \yii\web\View */
/* @var $content string */
$this->title = $this->title;
$day = strftime('%A', time());
$date = date('Y-m-d');
$time = date('H:i:s');
$now = Yii::$app->formatter->asDate($date, 'long');
dmstr\web\AdminLteAsset::register($this);
app\assets\AppAsset::register($this);
use kartik\icons\Icon;
// Icon::map($this);
// Icon::map($this, Icon::FA);
?>

<?php $this->beginPage() ?>
<!DOCTYPE html>
<html>
<head>
<link rel="icon" type="image/jpg" href="<?= Yii::getAlias('@web')?>/img/letter.png">
    <meta charset="UTF-8">
    <?= Html::csrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>

    <!-- <link href="//code.ionicframework.com/ionicons/1.5.2/css/ionicons.min.css" rel="stylesheet" type="text/css"/> -->

    <?php $this->head() ?>
    <link rel="icon" type="image/jpg" href="<?= Yii::getAlias('@web')?>/img/letter.png">
</head>

<body class="hold-transition skin-yellow sidebar-mini">
<?php $this->beginBody() ?>

<div class="wrapper">

    <header class="main-header">

    <?= Html::a('<img style="margin: 0 auto; padding-bottom:10px; padding-right:2px" width="30px"src="'. Yii::getAlias("@web").'/img/letter.png">' .  Yii::$app->name . '</span>', Yii::$app->homeUrl, ['class' => 'logo']) ?>

    <nav class="navbar navbar-static-top" role="navigation">

        <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
            <span class="sr-only">Toggle navigation</span>
        </a>

        <div class="navbar-custom-menu">
            <ul class="nav navbar-nav">
                <!-- User Account: style can be found in dropdown.less -->
                <li class="dropdown user user-menu">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                        <i class="glyphicon glyphicon-user"></i>
                        <span><?= Yii::$app->user->identity->nama ?> <i class="caret"></i></span>
                    </a>
                    <ul class="dropdown-menu">
                        <!-- User image -->
                        <li class="user-header bg-light-green">
                                <img class="img-circle" src="https://ui-avatars.com/api/?name=<?= Yii::$app->user->identity->nama ?>&background=001f3f&color=ffffff"/>
                            <p>
                                <?= Yii::$app->user->identity->nama ?>
                                <small><?= Yii::$app->user->identity->no_hp ?></small>
                            </p>
                        </li>
                        <!-- Menu Footer-->
                        <li class="user-footer">
                            <div class="pull-left">
                                <a href="<?= \yii\helpers\Url::to(['/profil/edit']) ?>"
                                    class="btn bg-red btn-flat"><?= Icon::show('user') ?> Profil</a>
                            </div>
                            <div class="pull-right">
                                <a href="<?= \yii\helpers\Url::to(['/site/logout']) ?>" 
                                    class="btn bg-red btn-flat" data-method="post"><?= Icon::show('sign-out') ?> Keluar</a>
                            </div>
                        </li>
                    </ul>
                </li>
            </ul>
        </div>

    </nav>
</header>


    <aside class="main-sidebar">
        <section class="sidebar" >
            <div class="user-panel" style="min-height: 70px;">
                <div class="pull-left image">
                    <img class="img-circle" src="https://ui-avatars.com/api/?name=<?= Yii::$app->user->identity->nama ?>&background=d81b60&color=ffffff"/>
                </div>
                <div class="pull-left info">
                    <p><?= Yii::$app->user->identity->nama ?></p>
                    <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
                </div>
            </div>
            <?= $this->render('_sidebar') ?>
        </section>
    </aside>

    <div class="content-wrapper">
        
        <section class="content-header" style="padding:25px 2% 30px 2%">
        <h1>
            <?= $this->title ?>
            <small><?= $day . " / " . $now?></small>
        </h1>
        <?= 
            Breadcrumbs::widget([
                'homeLink' => [ 
                    'label' =>Yii::t('yii', 'Beranda'),
                    'url' => Yii::$app->homeUrl,
                    'template' => "<li><b>{link}</b></li>\n",
                ],
                'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
            ]) 
        ?>
       

        <div style="padding-top:24px;">
            <?= Alert::widget() ?>
            <?= $content ?>
        </div>
            
        </section>
    </div>

    <footer class="main-footer">
        Sistem Informasi Perpusatakaan Online (SIPION) <strong>RSUD Petala Bumi Provinsi Riau</strong>
    </footer>
</div>


<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>

