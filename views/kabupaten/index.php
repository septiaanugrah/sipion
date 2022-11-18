<?php

use yii\helpers\Html;
use yii\grid\GridView;
use kartik\icons\Icon;

/* @var $this yii\web\View */
/* @var $searchModel app\models\KabupatenSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Kabupaten';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="kabupaten-index">

    <p>
        <?= Html::a(Icon::show('plus') . 'Tambah', ['create'], ['class' => 'btn bg-olive']) ?>
    </p>

    <div class="box box-danger">
        <div class="box-body">
            <div class="table-responsive">
                <?= GridView::widget([
                    'dataProvider' => $dataProvider,
                    'filterModel' => $searchModel,
                    'columns' => [
                        ['class' => 'yii\grid\SerialColumn'],

                        // 'id',
                        'id',
                        [
                            'attribute' => 'namaProvinsi',
                            'value' => function($model) {
                                return $model->provinsi->nama;
                            },
                        ],
                        // 'kompetensi',
                        [
                            'attribute' => 'nama',
                            'label' => 'Nama Kabupaten',
                            'value' => function($model) {
                                return $model->nama;
                            },
                        ],
                        // 'status',
                        //'created_by',
                        //'created_at',
                        //'updated_by',
                        //'updated_at',

                        [
                            'class' => 'dickyermawan\ActionColumn\BtnGroup',
                            'label' => ['Lihat', 'Ubah', 'Hapus']
                        ],
                    ],
                ]); ?>
            <div>
        </div>
    </div>
</div>
