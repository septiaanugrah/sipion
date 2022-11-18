<?php

use yii\helpers\Html;
use kartik\detail\DetailView;
use app\models\User;
use kartik\icons\Icon;
use kartik\datecontrol\DateControl;

/* @var $this yii\web\View */
/* @var $model app\models\SuratMasuk */

$this->title = 'Lihat Surat Masuk';
$this->params['breadcrumbs'][] = ['label' => 'Surat Masuk', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>

<div class="surat-masuk-view">

    </br>

    <div style="padding-bottom:2%">
        <?= Html::a(Icon::show('backward') . 'Kembali', ['index'], ['class' => 'btn btn-primary']) ?>
        <?= Html::a(Icon::show('download') . 'Unduh', ['download', 'id' => $model->id], ['class' => 'btn btn-success']) ?>

        <!-- <div class="form-group pull-right">
            <? //echo Html::a(Icon::show('upload') . 'Unggah Ulang', ['update', 'id' => $model->id], ['class' => 'btn btn-warning']) ?>
            <? //echo Html::a(Icon::show('trash') . 'Hapus', ['delete', 'id' => $model->id], [
                //     'class' => 'btn btn-danger',
                //     'data' => [
                //         'confirm' => 'Anda Yakin Ingin Menghapus Data Ini?',
                //         'method' => 'post',
                //     ],
                // ])
            ?>
        </div> -->

    </div>

    </br>


    <?php
    //  echo '<pre>';
    //  print_r($model->relasiDisposisi1->jabatan);
    
    // //  echo 'asdasdasdas';
    //  print_r($model->disposisiSatu);
    //  echo '</pre>';

    $username_created_by = $model->created_by;
    if ($user = User::findIdentity($model->created_by)) {
        $username_created_by = $user->nama;
    }

    $username_updated_by = $model->updated_by;
    if ($user = User::findIdentity($model->updated_by)) {
        $username_updated_by = $user->nama;
    }
    ?>

<?php
    
    $attributes = [
        [
            'group' => true,
            'label' => 'Identitas Surat',
            'rowOptions' => ['class' => 'bg-info'],
            'groupOptions' => ['class' => 'text-center'],
        ],
        [
            'columns' => [
                [
                    'attribute' => 'kode_surat',
                    'format' => 'html',
                    'value' => '<kbd>' . $model->kode_surat . '</kbd>',
                    'displayOnly' => false,
                ],
                [
                    'attribute'=>'tanggal', 
                    'format'=>['date', 'php:l, d F Y'],
                    'type'=>DetailView::INPUT_WIDGET, // enables you to use any widget
                    'widgetOptions'=>[
                        'class'=>DateControl::classname(),
                        'type'=>DateControl::FORMAT_DATE,
                        'pluginOptions' => [
                            'orientation' => 'bottom left',
                            'todayHighlight' => true,
                        ]
                    ],
                    'valueColOptions' => ['style' => 'width:30%'],
                ],
                // [
                //     'attribute' => 'tanggal',
                //     'format' => 'raw',
                //     'value' => \Yii::$app->formatter->asDate($model->tanggal, 'php:d F Y'),
                //     'type' => DetailView::INPUT_DATE,
                //     'widgetOptions' => [
                //         'pluginOptions' => [
                //             'format' => 'dd-mm-yyyy',
                //         ],
                //     ],
                //     'valueColOptions' => ['style' => 'width:30%'],
                // ],
            ]
        ],

        //Korespondensi
        [
            'group' => true,
            'label' => 'Rincian Surat',
            'rowOptions' => ['class' => 'bg-info'],
            'groupOptions' => ['class' => 'text-center'],
        ],
        [
            'columns' => [
                [
                    'attribute' => 'alamat_pengirim',
                    'format' => 'html',
                    'value' => $model->alamat_pengirim,
                    'displayOnly' => false,
                ],
                [
                    'attribute' => 'perihal',
                    'format' => 'html',
                    'value' => $model->perihal,
                    'displayOnly' => false,
                    'valueColOptions' => ['style' => 'width:40%'],
                ],
            ]  
        ],
        [
            'group' => true,
            'label' => 'Disposisi',
            'rowOptions' => ['class' => 'bg-info'],
            'groupOptions' => ['class' => 'text-center'],
        ],
        [
            'columns' => [
                [
                    'attribute' => 'disposisi_1',
                    'format' => 'html',
                    'type' => DetailView::INPUT_SELECT2,
                    'value' => $model->disposisi1,
                    // 'value' => function($model) {
                        // echo '<pre>';
                        // $model->relasiDisposisi1->jabatan;
                        // echo '</pre>';
                        // return $model->relasiDisposisi1['jabatan'];

                    // },
                    'widgetOptions' => [
                        'attribute' => 'disposisiSatu',
                        'data' => $data_jabatan,
                        'options' => ['placeholder' => 'Pilih Disposisi 1'],
                        'pluginOptions' => ['allowClear' => false],
                    ],
                    'valueColOptions' => ['style' => 'width:30%'],
                ],
                [
                    'attribute' => 'disposisi_2',
                    'format' => 'html',
                    'type' => DetailView::INPUT_SELECT2,
                    'value' => $model->disposisi2,
                    'widgetOptions' => [
                        'attribute' => 'disposisiDua',
                        'data' => $data_jabatan,
                        'options' => ['placeholder' => 'Pilih Disposisi 2'],
                        'pluginOptions' => ['allowClear' => false],
                    ],
                    'valueColOptions' => ['style' => 'width:30%'],
                ],
            ]  
        ],
        [
            'columns' => [
                [
                    'attribute' => 'catatan_disposisi1',
                    'format' => 'html',
                    'type' => DetailView::INPUT_TEXTAREA,
                    'value' => $model->catatan_disposisi1,
                    'valueColOptions' => ['style' => 'width:30%'],
                ],
                [
                    'attribute' => 'catatan_disposisi2',
                    'format' => 'html',
                    'type' => DetailView::INPUT_TEXTAREA,
                    'value' => $model->catatan_disposisi2,
                    'valueColOptions' => ['style' => 'width:30%'],
                ],
            ]  
        ],
        [
            'columns' => [
                [
                    'attribute' => 'disposisi_lainnya',
                    'format' => 'html',
                    'value' => $model->disposisi_lainnya,
                    'displayOnly' => false,
                    // 'valueColOptions' => ['style' => 'width:30%'],
                ],
            ]  
        ],

        [
            'columns' => [
                [
                    'attribute' => 'catatan_disposisi_lainnya',
                    'format' => 'html',
                    'type' => DetailView::INPUT_TEXTAREA,
                    'value' => $model->catatan_disposisi_lainnya,
                    'valueColOptions' => ['style' => 'width:30%'],
                ],
                [
                    'attribute' => 'diteruskan',
                    'format' => 'html',
                    'value' => $model->diteruskan,
                    'displayOnly' => false,
                    'valueColOptions' => ['style' => 'width:30%'],
                ],
            ]  
        ],
        [
            'columns' => [
                [
                    'attribute' => 'keterangan',
                    'format' => 'html',
                    'value' => $model->keterangan,
                    'displayOnly' => false,
                    'valueColOptions' => ['style' => 'width:40%'],
                ],
                [
                    'attribute' => 'status',
                    'format' => 'html',
                    'type' => DetailView::INPUT_SELECT2,
                    'value' => $model->status,
                    'widgetOptions' => [
                        'attribute' => 'status',
                        'data' => Yii::$app->params['dataStatus'],
                        'options' => ['placeholder' => 'Pilih Status'],
                        'pluginOptions' => ['allowClear' => false],
                    ],
                    'valueColOptions' => ['style' => 'width:30%'],
                ],
                // [
                //     'attribute' => 'status',
                //     'format' => 'html',
                //     'value' => '<kbd>' . $model->status . '</kbd>',
                //     'displayOnly' => false,
                // ],
            ]  
        ],



        [
            'group' => true,
            'label' => 'Penanggung Jawab',
            'rowOptions' => ['class' => 'bg-info'],
            'groupOptions' => ['class' => 'text-center'],
        ],
        [
            'columns' => [
                [
                    'attribute' => 'created_by',
                    'value' => $username_created_by,
                    'displayOnly' => true,
                ],
                [
                    'attribute' => 'created_at',
                    'format' => ['date', 'php:d F Y H:i:s'],
                    'displayOnly' => true,
                ],
            ]
        ],
        [
            'columns' => [
                [
                    'attribute' => 'updated_by',
                    'value' => $username_updated_by,
                    'displayOnly' => true,
                ],
                [
                    'attribute' => 'updated_at',
                    'format' => ['date', 'php:d F Y H:i:s'],
                    'displayOnly' => true,
                ],

            ]
        ],
    ];

    echo DetailView::widget([
        'model' => $model,
        'attributes' => $attributes,
        'model' => $model,
        'striped' => false,
        'hover' => false,
        'mode' => DetailView::MODE_VIEW,
        'vAlign' => DetailView::ALIGN_MIDDLE,
        'hAlign' => DetailView::ALIGN_CENTER,
        'panel' => [
            'heading' => Icon::show('envelope') . $this->title,
            'type' => DetailView::TYPE_PRIMARY,
            'footer' => '<div class="text-center text-muted">Sistem Informasi Perpusatakaan Online (SIPION)</div>',
        ],
        'buttons1' => '',
        'updateOptions' => [
            'label' => Icon::show('edit') . ' Ubah',
            ],
            'saveOptions' => [
                'label' => Icon::show('save') . ' Simpan',
            ],
            'resetOptions' => [
                'label' => Icon::show('ban') . ' Batal',
            ],
            'viewOptions' => [
                'label' => Icon::show('eye') . ' Lihat',
            ],
    ]);
    ?>

</div> 

