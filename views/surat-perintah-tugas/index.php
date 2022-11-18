<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
use kartik\icons\Icon;
use kartik\date\DatePicker;
use yii\helpers\Url;
use kartik\widgets\Select2;

/* @var $this yii\web\View */
/* @var $searchModel app\models\SuratPerintahTugasSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Surat Perintah Tugas';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="surat-perintah-tugas-index">
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?php Pjax::begin([
        'id' => 'pjax-tb-surat-keluar',
                // 'timeout' => '50000'
    ]);
    ?>

     <p>
        <?= Html::a(Icon::show('plus') . 'Tambah', ['create'], ['class' => 'btn bg-olive']) ?>
    </p>

    <div class="box box-danger">

        <div class="box-header">
            <strong>Keterangan Warna Baris</strong>
        </div>
        <div class="box-body">
            <p class="label label-success">Nomor Surat Kosong</p>
            <p class= "label label-default">Nomor Surat Berisi</p>
        </div>
    </div>

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
                    'tableOptions' =>['class' => 'table table-bordered'],
                    'rowOptions'=>function($model){
                        if ($model->ketersediaan===1) return ['class'=>'success'];
                    },
                    'columns' => [
                        ['class' => 'yii\grid\SerialColumn'],

                        'no_urut',
                        'nomor_surat',
                        [
                            'attribute' => 'tanggal',
                            'value' => function ($model) {
                                return Yii::$app->formatter->asDate($model->tanggal, 'php:l, d F Y');
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
                        'memerintahkan',
                        'perintah',
                        // [
                        //     'attribute' => 'jenis_surat',
                        //     'value' => function ($model) {
                        //         return $model->jenis_surat;
                        //     },
                        //     'filter' => Select2::widget([
                        //         'model' => $searchModel,
                        //         'attribute' => 'jenis_surat',
                        //         'data' => $data_sifat,
                        //         'options' => ['placeholder' => 'Pilih Sifat Surat'],
                        //         'pluginOptions' => [
                        //             'allowClear' => true
                        //         ],
                        //     ]),
                        //     'format' => 'raw',
                        // ],
                        //'updated_by',
                        //'updated_at',
                        //'created_at',
                        //'created_by',

                        [
                            'class' => 'yii\grid\ActionColumn',
                            'template' => '<div style="padding-bottom:5px;">{leadView}</div>',
                            'buttons' => [
                                'leadView' => function ($url, $model) {
                                    $url = Url::to(['surat-perintah-tugas/view', 'id' => $model->id]);
                                    return Html::a(Icon::show('eye') . 'Lihat', $url, ['title' => 'view', 'class' => 'btn btn-primary', 'style' => 'width:100%']);
                                },
                                // 'leadUpdate' => function ($url, $model) {
                                //     $url = Url::to(['surat-keluar/update', 'id' => $model->id]);
                                //     return Html::a(Icon::show('pencil') . 'Ubah', $url, ['title' => 'update', 'class' => 'btn bg-orange', 'style' => 'width:100%']);
                                // },
                                // 'leadDelete' => function ($url, $model) {
                                //     $url = Url::to(['obat/delete', 'id' => $model->id]);
                                //     return Html::a(Icon::show('trash') . 'Hapus', $url, [k
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
