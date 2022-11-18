<?php

use yii\helpers\Html;
use kartik\icons\Icon;

/* @var $this yii\web\View */
/* @var $model app\models\SuratKeputusan */

$this->title = 'Tambah Surat Perintah Perjalanan Dinas';
$this->params['breadcrumbs'][] = ['label' => 'Surat Perintah Perjalanan Dinas', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="surat-perjalanan-dinas-create">

     <div style="padding-bottom:2%">
        <?= Html::a(Icon::show('backward') . 'Kembali', ['index'], ['class' => 'btn btn-info']) ?>
    </div>

    <?= $this->render('_form', [
        'model' => $model,
        // 'dataProvinsi' => $dataProvinsi
    ]) ?>

</div>
