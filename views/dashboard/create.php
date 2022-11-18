<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Kunjungan */

$this->title = 'Tambah Kunjungan';
$this->params['breadcrumbs'][] = ['label' => 'Kunjungan', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="kunjungan-create">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
