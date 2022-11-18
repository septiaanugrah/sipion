<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
use kartik\icons\Icon;
use kartik\date\DatePicker;
use yii\helpers\Url;
use kartik\widgets\Select2;

/* @var $this yii\web\View */
/* @var $searchModel app\models\SuratMasukSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Indeks Buku';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="surat-masuk-index">

    <?php  
    
        // echo "<pre>";
        // print_r($dataProvider);
        // echo "</pre>";
        // exit;
    ?>

    <?php Pjax::begin([
        'id' => 'pjax-tb-surat-masuk',
        // 'timeout' => '50000'
    ]);
    ?>

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
                        if ($model->status==="Kembali") {
                            return ['class'=>'success'];
                        }
                        elseif ($model->status==="Tidak Kembali"){
                            return ['class'=>'danger'];
                        } 
                    },
                    'columns' => [
                        ['class' => 'yii\grid\SerialColumn'],
                        'kode_surat',
                        'perihal',
                        'alamat_pengirim',
                        // [
                        //     'attribute' => 'disposisi_1',
                        //     // 'header' => '<font color="#2fa4e">Poliklinik</font>',
                        //     'value' => function ($model) {
                        //         return $model->disposisi1;
                        //     },
                        //     'filter' => Select2::widget([
                        //         'model' => $searchModel,
                        //         'attribute' => 'disposisi_1',
                        //         'data' => $data_jabatan,
                        //         'options' => ['placeholder' => 'Pilih Disposisi 1'],
                        //         'pluginOptions' => [
                        //             'allowClear' => true
                        //         ],
                        //     ]),
                        //     'format' => 'raw',
                        // ],
                        // [
                        //     'attribute' => 'disposisi_1',
                        //     'value' => function ($model) {
                        //         return $model->disposisi1;
                        //     },
                        //     // 'value' => function ($model) {
                        //     //     return $model->relasiDisposisi1['jabatan'];
                        //     // },
                        //     'filter' => Select2::widget([
                        //         'model' => $searchModel,
                        //         'attribute' => 'disposisi_1',
                        //         'data' => $data_jabatan,
                        //         'options' => ['placeholder' => 'Pilih Disposisi 1'],
                        //         'pluginOptions' => [
                        //             'allowClear' => true
                        //         ],
                        //     ]),
                        //     'format' => 'raw',
                        // ],
                        // [
                        //     'attribute' => 'disposisi_2',
                        //     'value' => function ($model) {
                        //         return $model->disposisi2;
                        //     },
                        //     'filter' => Select2::widget([
                        //         'model' => $searchModel,
                        //         'attribute' => 'disposisi_2',
                        //         'data' => $data_jabatan,
                        //         'options' => ['placeholder' => 'Pilih Disposisi 2'],
                        //         'pluginOptions' => [
                        //             'allowClear' => true
                        //         ],
                        //     ]),
                        //     'format' => 'raw',
                        // ],
                        
                        // 'disposisi1',
                        // 'disposisi2',
                        // 'disposisi_lainnya',
                        // 'keterangan',
                        //'created_at',
                        //'updated_at',
                        //'created_by',
                        //'updated_by',

                        // [
                        //     'class' => 'dickyermawan\ActionColumn\BtnGroup',
                        //     'label' => ['Lihat', 'Ubah', 'Hapus']
                        // ],

                        [
                            'class' => 'yii\grid\ActionColumn',
                            'template' => '<div style="padding-bottom:5px;">{leadView}{leadDownload}</div>',
                            'buttons' => [
                                'leadView' => function ($url, $model) {
                                    $url = Url::to(['surat-masuk/view', 'id' => $model->id]);
                                    return Html::a(Icon::show('eye') . 'Lihat', $url, ['title' => 'view', 'class' => 'btn btn-info', 'style' => 'width:100%']);
                                },
                                'leadDownload' => function ($url, $model) {
                                    $url = Url::to(['surat-masuk/download', 'id' => $model->id]);
                                    return Html::a(Icon::show('download') . 'Unduh', $url, ['title' => 'download', 'class' => 'btn btn-success', 'style' => 'width:100%', 'data-pjax' => 0, 'target' => 'blank']);
                                },
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