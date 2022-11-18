<?php

use yii\helpers\Html;
use kartik\icons\Icon;

/* @var $this yii\web\View */
/* @var $model app\models\SuratMasuk */

$this->title = 'Tambah Surat Masuk';
$this->params['breadcrumbs'][] = ['label' => 'Surat Masuk', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="surat-masuk-create">

   <div style="padding-bottom:2%">
        <?= Html::a(Icon::show('backward') . 'Kembali', ['index'], ['class' => 'btn btn-primary']) ?>
    </div>
    
    <?= $this->render('_form', [
        'data_jabatan' => $data_jabatan,
        'model' => $model,
    ]) ?>

</div>
