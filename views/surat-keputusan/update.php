<?php

use yii\helpers\Html;
use kartik\icons\Icon;

/* @var $this yii\web\View */
/* @var $model app\models\SuratKeputusan */

$this->title = 'Unggah Ulang Surat Keputusan';
$this->params['breadcrumbs'][] = ['label' => 'Surat Keputusan', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="surat-keputusan-update">

    <div style="padding-bottom:2%">
        <?= Html::a(Icon::show('backward') . 'Kembali', ['index'], ['class' => 'btn btn-info']) ?>
    </div>

    <?= $this->render('_form-update', [
        'model' => $model,
    ]) ?>

</div>