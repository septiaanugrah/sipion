<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use app\models\User;
use kartik\icons\Icon;

/* @var $this yii\web\View */
/* @var $model app\models\NotaDinas */

$this->title = 'Nota Dinas Nomor: ' . $model->nomor_surat;
$this->params['breadcrumbs'][] = ['label' => 'Nota Dinas', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="nota-dinas-view">

        <div style="padding-bottom:2%">

            <?= Html::a(Icon::show('backward') . 'Kembali', ['index'], ['class' => 'btn btn-primary']) ?>
            <?= Html::a(Icon::show('download') . 'Download', ['index'], ['class' => 'btn btn-success']) ?>

            <div class="pull-right">
            <?= Html::a(Icon::show('pencil') . 'Ubah', ['update', 'id' => $model->id], ['class' => 'btn btn-warning']) ?>
            <?= Html::a(Icon::show('trash') . 'Hapus', ['delete', 'id' => $model->id], [
                'class' => 'btn btn-danger',
                'data' => [
                    'confirm' => 'Apakah anda yakin ingin mengosongkan data ini?',
                    'method' => 'post',
                ],
                ]) ?>
            </div>
        </div>

     <?php
    $username_created_by = $model->created_by;
    if ($user = User::findIdentity($model->created_by)) {
        $username_created_by = $user->nama;
    }

    $username_updated_by = $model->updated_by;
    if ($user = User::findIdentity($model->updated_by)) {
        $username_updated_by = $user->nama;
    }
    ?>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            // 'id',
            // 'kode_surat',
            'nomor_surat',
            [                      // the owner name of the model
                'label' => 'Tanggal Surat',
                'value' => Yii::$app->formatter->asDate($model->tanggal, 'php:d F Y'),
            ],
            // 'tahun',
            'perihal',
            [
                'attribute' => 'created_by',
                'value' => $username_created_by,
            ],
            [
                'attribute' => 'created_at',
                'format' => ['date', 'php:d F Y H:i:s']
            ],
            [
                'attribute' => 'updated_by',
                'value' => $username_updated_by,
            ],
            [
                'attribute' => 'updated_at',
                'format' => ['date', 'php:d F Y H:i:s']
            ],
        ],
    ]) ?>

</div>
