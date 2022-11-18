<?php

use yii\helpers\Html;
use kartik\icons\Icon;

/* @var $this yii\web\View */
/* @var $model app\models\SuratBebasNarkoba */

$this->title = 'Tambah Surat Bebas Narkoba';
$this->params['breadcrumbs'][] = ['label' => 'Surat Bebas Narkoba', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="surat-bebas-narkoba-create">

    <div style="padding-bottom:2%">
        <?= Html::a(Icon::show('backward') . 'Kembali', ['index'], ['class' => 'btn btn-info']) ?>
    </div>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
