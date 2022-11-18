<?php

use yii\helpers\Html;
use kartik\icons\Icon;

/* @var $this yii\web\View */
/* @var $model app\models\SuratSehat */

$this->title = 'Tambah Surat Sehat';
$this->params['breadcrumbs'][] = ['label' => 'Surat Sehat', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="surat-sehat-create">

    <div style="padding-bottom:2%">
        <?= Html::a(Icon::show('backward') . 'Kembali', ['index'], ['class' => 'btn btn-info']) ?>
    </div>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
