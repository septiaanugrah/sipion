<?php

/* @var $this yii\web\View */
/* @var $name string */
/* @var $message string */
/* @var $exception Exception */

use yii\helpers\Html;
use yii\helpers\Url;
use kartik\icons\Icon;

$this->title = $name;
?>
<div class="site-error">

    <h1><?= Html::encode($this->title) ?></h1>

    <div class="alert alert-danger">
        <?= nl2br(Html::encode($message)) ?>
    </div>

    <p>
        The above error occurred while the Web server was processing your request.
    </p>
    <p>
        Please contact us if you think this is a server error. Thank you.
    </p>

    <p style="padding-top:25px;">
        <?=
            Html::a(Icon::show('arrow-left'). ' Kembali', Yii::$app->homeUrl, [
                'class' => 'btn btn-info'
            ])
        ?>
    </p>

</div>
