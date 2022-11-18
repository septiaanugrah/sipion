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

$this->title = 'Surat Masuk';
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

    <!-- <p>
        <? //echo Html::a(Icon::show('plus') . 'Tambah', ['create'], ['class' => 'btn bg-olive']) 
        ?>
    </p> -->

    <div class="box box-danger">

            <div class="box-header">
                <strong>Keterangan Warna Baris</strong>
            </div>
            <div class="box-body">
                <p class="label label-success">Surat Kembali</p>
                <p class="label label-danger">Surat Tidak Kembali</p>
                <p class= "label label-default">Belum Ada Status</p>
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
                        if ($model->status==="Kembali") {
                            return ['class'=>'success'];
                        }
                        elseif ($model->status==="Tidak Kembali"){
                            return ['class'=>'danger'];
                        } 
                    },
                    'columns' => [
                        ['class' => 'yii\grid\SerialColumn'],

                        'no_urut',
                        'kode_surat',
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
                        'alamat_pengirim',
                        'perihal',
                        [
                            'attribute' => 'disposisi_1',
                            // 'header' => '<font color="#2fa4e">Poliklinik</font>',
                            'value' => function ($model) {
                                return $model->disposisi1;
                            },
                            'filter' => Select2::widget([
                                'model' => $searchModel,
                                'attribute' => 'disposisi_1',
                                'data' => $data_jabatan,
                                'options' => ['placeholder' => 'Pilih Disposisi 1'],
                                'pluginOptions' => [
                                    'allowClear' => true
                                ],
                            ]),
                            'format' => 'raw',
                        ],
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
                        [
                            'attribute' => 'disposisi_2',
                            'value' => function ($model) {
                                return $model->disposisi2;
                            },
                            'filter' => Select2::widget([
                                'model' => $searchModel,
                                'attribute' => 'disposisi_2',
                                'data' => $data_jabatan,
                                'options' => ['placeholder' => 'Pilih Disposisi 2'],
                                'pluginOptions' => [
                                    'allowClear' => true
                                ],
                            ]),
                            'format' => 'raw',
                        ],
                        
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
                            'template' => '<div style="padding-bottom:5px;">{leadView}</div>',
                            'buttons' => [
                                'leadView' => function ($url, $model) {
                                    $url = Url::to(['surat-masuk-spv/view', 'id' => $model->id]);
                                    return Html::a(Icon::show('eye') . 'Lihat', $url, ['title' => 'view', 'class' => 'btn btn-primary', 'style' => 'width:100%']);
                                },
                                // 'leadUpdate' => function ($url, $model) {
                                //     $url = Url::to(['surat-masuk/update', 'id' => $model->id]);
                                //     return Html::a(Icon::show('pencil') . 'Ubah', $url, ['title' => 'update', 'class' => 'btn btn-primary', 'style' => 'width:100%']);
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