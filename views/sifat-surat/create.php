<?php

use yii\helpers\Html;
use kartik\icons\Icon;

/* @var $this yii\web\View */
/* @var $model app\models\SifatSurat */

$this->title = 'Tambah Data Sifat Surat';
$this->params['breadcrumbs'][] = ['label' => 'Sifat Surat', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="sifat-surat-create">

    <div style="padding-bottom:2%">
        <?= Html::a(Icon::show('backward') . 'Kembali', ['index'], ['class' => 'btn btn-primary']) ?>
    </div>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
