<?php

use yii\helpers\Html;
use yii\grid\GridView;
use kartik\icons\Icon;

/* @var $this yii\web\View */
/* @var $searchModel app\models\DokterSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Dokter';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="dokter-index">

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
                        'nama_dokter',
                        // 'kompetensi',
                        'nip',
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
