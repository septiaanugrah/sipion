<?php

use yii\helpers\Html;
use kartik\icons\Icon;

/* @var $this yii\web\View */
/* @var $model app\models\KodeSurat */

$this->title = 'Tambah Kode Surat';
$this->params['breadcrumbs'][] = ['label' => 'Kode Surats', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="kode-surat-create">

    <div style="padding-bottom:2%">
        <?= Html::a(Icon::show('backward') . 'Kembali', ['index'], ['class' => 'btn btn-primary']) ?>
    </div>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>