<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use kartik\icons\Icon;

/* @var $this yii\web\View */
/* @var $model app\models\KodeSurat */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Kode Surats', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="kode-surat-view">

    <div style="padding-bottom:2%">
        <?= Html::a(Icon::show('backward') . 'Kembali', ['index'], ['class' => 'btn btn-primary']) ?>

        <div class="form-group pull-right">
            <?=
            Html::a(Icon::show('pencil') . 'Ubah', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']),
                Html::a(Icon::show('trash') . 'Hapus', ['delete', 'id' => $model->id], [
                'class' => 'btn btn-danger',
                'data' => [
                    'confirm' => 'Anda Yakin Ingin Menghapus Data Ini?',
                    'method' => 'post',
                ],
            ])
            ?>
        </div>

    </div>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'kode',
            'keperluan',
        ],
    ]) ?>

</div>
