<?php

use yii\helpers\Html;
use kartik\icons\Icon;

/* @var $this yii\web\View */
/* @var $model app\models\SuratKeputusan */

$this->title = 'Tambah Nota Kesepahaman';
$this->params['breadcrumbs'][] = ['label' => 'Surat MOU', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="nota-kesepahaman-create">

     <div style="padding-bottom:2%">
        <?= Html::a(Icon::show('backward') . 'Kembali', ['index'], ['class' => 'btn btn-info']) ?>
    </div>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
