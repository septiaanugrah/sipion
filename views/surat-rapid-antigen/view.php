<?php

use yii\helpers\Html;
use kartik\detail\DetailView;
use app\models\User;
use kartik\icons\Icon;
use kartik\datecontrol\DateControl;

/* @var $this yii\web\View */
/* @var $model app\models\SuratBebasNarkoba */

$this->title = 'Lihat Surat Hasil Pemeriksaan Rapid Antigen';
$this->params['breadcrumbs'][] = ['label' => 'Surat Hasil Pemeriksaan Rapid Antigen', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="surat-bebas-narkoba-view">

    </br>

    <div style="padding-bottom:2%">

        <?= Html::a(Icon::show('backward') . 'Kembali', ['index'], ['class' => 'btn btn-primary']) ?>
        <?= Html::a(Icon::show('pencil') . 'Ubah', ['update', 'id' => $model->id], ['class' => 'btn btn-danger']) ?>
        <?= Html::a('<i class="fa fa-print"></i> Cetak', ['cetak-hasil', 'id' => $model->id], ['class' => 'btn btn-warning', 'target' => 'blank']) ?>

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
                    'attribute' => 'nomor_surat',
                    'format' => 'html',
                    'value' => '<kbd>' . $model->nomor_surat . '</kbd>',
                    'displayOnly' => false,
                ],
                [
                    'attribute'=>'tanggal', 
                    'format'=>['date', 'php:l, d F Y'],
                    'type'=>DetailView::INPUT_WIDGET, // enables you to use any widget
                    'widgetOptions'=>[
                        'class'=>DateControl::classname(),
                        'type'=>DateControl::FORMAT_DATE
                    ],
                    'valueColOptions' => ['style' => 'width:30%'],
                ],
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
                    'attribute' => 'nama',
                    'format' => 'html',
                    'value' => $model->nama,
                    'displayOnly' => false,
                ],
                [
                    'attribute'=>'tanggal_lahir', 
                    'format'=>['date', 'php:d F Y'],
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
            ]
        ],
        [
            'columns' => [
                [
                    'attribute' => 'no_mr',
                    'format' => 'html',
                    'value' => $model->no_mr,
                    'displayOnly' => false,
                ],
                [
                    'attribute' => 'nik',
                    'format' => 'html',
                    'value' => $model->nik,
                    'displayOnly' => false,
                    'valueColOptions' => ['style' => 'width:30%'],
                ],
               
            ]
        ],
        [
            'columns' => [
                [
                    'attribute' => 'alamat',
                    'format' => 'html',
                    'value' => $model->alamat,
                    'displayOnly' => false,
                ],
                [
                    'attribute' => 'hasil',
                    'format' => 'html',
                    'type' => DetailView::INPUT_SELECT2,
                    'value' => '<kbd>' . $model->hasil . '</kbd>',
                    'widgetOptions' => [
                        'attribute' => 'hasil',
                        'data' => Yii::$app->params['dataHasilPemeriksaan'],
                        'options' => ['placeholder' => 'Pilih Hasil'],
                        'pluginOptions' => ['allowClear' => false],
                    ],
                    'valueColOptions' => ['style' => 'width:30%'],
                ],
            ]
        ],

        [
            'columns' => [
                [
                    'attribute' => 'provinsi',
                    'format' => 'html',
                    'value' => $model->relasiProvinsi->nama,
                    'displayOnly' => false,
                ],
            ]
        ],
        [
            'columns' => [
                [
                    'attribute' => 'kabupaten',
                    'format' => 'html',
                    'value' => $model->relasiKabupaten->nama,
                    'displayOnly' => false,
                ],
    
            ]
        ],
        [
            'columns' => [
                [
                    'attribute' => 'kecamatan',
                    'format' => 'html',
                    'value' => $model->relasiKecamatan->nama,
                    'displayOnly' => false,
                ],
            ]
        ],
        [
            'columns' => [
                [
                    'attribute' => 'kelurahan',
                    'format' => 'html',
                    'value' => $model->relasiKelurahan->nama,
                    'displayOnly' => false,
                ],
    
            ]
        ],
        [
            'columns' => [
                [
                    'attribute' => 'id_dokter',
                    'format' => 'html',
                    'value' => $model->relasiDokter->nama_dokter,
                    'displayOnly' => false,
                ],
    
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
                    'valueColOptions' => ['style' => 'width:30%'],
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
                    'valueColOptions' => ['style' => 'width:30%'],
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