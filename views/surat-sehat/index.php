<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
use kartik\icons\Icon;
use kartik\date\DatePicker;
use yii\helpers\Url;
use kartik\widgets\Select2;

/* @var $this yii\web\View */
/* @var $searchModel app\models\SuratSehatSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Surat Keterangan Sehat';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="surat-sehat-index">

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

   <?php Pjax::begin([
        'id' => 'pjax-tb-surat-masuk',
                // 'timeout' => '50000'
    ]);
    ?>

    <p>
        <?= Html::a(Icon::show('plus') . 'Tambah', ['create'], ['class' => 'btn bg-olive']) ?>
    </p>
    <div class="box box-danger">
        <div class="box-body">
            <div class="table-responsive">

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'pager' => [
            'firstPageLabel' => 'Pertama',
            'lastPageLabel' => 'Terakhir'
        ],
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'no_urut',
            'nomor_surat',
            [
                'attribute' => 'tanggal',
                'value' => function ($model) {
                    return Yii::$app->formatter->asDate($model->tanggal, 'php:l, d F Y');
                    // return date('l, d F Y', strtotime($model->tanggal));
                },
                'filter' => DatePicker::widget([
                    'model' => $searchModel,
                    'attribute' => 'tanggal',
                    'type' => DatePicker::TYPE_COMPONENT_APPEND,
                    'pluginOptions' => [
                        'autoclose' => true,
                        'format' => 'yyyy-mm-dd',
                        'orientation' => 'bottom right'
                    ],
                    'options' => [
                        'onkeydown' => 'return false'
                    ]
                ]),
                'format' => 'raw',
            ],
            'nama',
            [
                'attribute' => 'jenis_kelamin',
                'value' => function ($model) {
                    return $model->jenis_kelamin;
                },
                'filter' => Select2::widget([
                    'model' => $searchModel,
                    'attribute' => 'jenis_kelamin',
                    'data' => Yii::$app->params['dataJenisKelamin'],
                    'options' => ['placeholder' => 'Pilih Jenis Kelamin'],
                    'pluginOptions' => [
                        'allowClear' => true
                    ],
                ]),
                'format' => 'raw',
            ],
            'alamat',
            'keterangan',
            //'created_by',
            //'created_at',
            //'updated_by',
            //'updated_at',

            [
                'class' => 'yii\grid\ActionColumn',
                'template' => '<div style="padding-bottom:5px;">{leadView}</div>',
                'buttons' => [
                    'leadView' => function ($url, $model) {
                        $url = Url::to(['surat-sehat/view', 'id' => $model->id]);
                        return Html::a(Icon::show('eye') . 'Lihat', $url, ['title' => 'view', 'class' => 'btn btn-primary', 'style' => 'width:100%']);
                    },
                    // 'leadUpdate' => function ($url, $model) {
                    //     $url = Url::to(['surat-sehat/update', 'id' => $model->id]);
                    //     return Html::a(Icon::show('pencil') . 'Ubah', $url, ['title' => 'update', 'class' => 'btn bg-orange', 'style' => 'width:100%']);
                    // },
                    // 'leadDelete' => function ($url, $model) {
                    //     $url = Url::to(['obat/delete', 'id' => $model->id]);
                    //     return Html::a(Icon::show('trash') . 'Hapus', $url, [
                    //         'title' => 'delete',
                    //         'data-confirm' => Yii::t('yii', 'Anda Yakin Ingin Menghapus Data Ini?'),
                    //         'data-method' => 'post',
                    //         'class' => 'btn btn-danger',
                    //         'style' => 'width:100%'
                    //     ]);
                    // },

                ]
            ],
        ],
    ]); ?>
            <?php Pjax::end(); ?>
            </div>
        </div>
    </div>
</div>
