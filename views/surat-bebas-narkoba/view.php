<?php

use yii\helpers\Html;
use kartik\detail\DetailView;
use app\models\User;
use kartik\icons\Icon;
use kartik\datecontrol\DateControl;

/* @var $this yii\web\View */
/* @var $model app\models\SuratBebasNarkoba */

$this->title = 'Lihat Surat Bebas Narkoba';
$this->params['breadcrumbs'][] = ['label' => 'Surat Bebas Narkoba', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="surat-bebas-narkoba-view">

    </br>

    <div style="padding-bottom:2%">
    <?= Html::a(Icon::show('backward') . 'Kembali', ['index'], ['class' => 'btn btn-primary']) ?>
        <?php if(Yii::$app->user->identity->akses == User::ROLE_ADMIN_LABORATORIUM ) { ?>
            <?= Html::a(Icon::show('pencil') . 'Ubah', ['update', 'id' => $model->id], ['class' => 'btn btn-danger']) ?>
            <?= Html::a('<i class="fa fa-print"></i> Cetak', ['cetak-hasil', 'id' => $model->id], ['class' => 'btn btn-warning', 'target' => 'blank']) ?>
        <?php } ?>

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
                    'attribute' => 'jenis_kelamin',
                    'format' => 'html',
                    'type' => DetailView::INPUT_SELECT2,
                    'value' => $model->jenis_kelamin,
                    'widgetOptions' => [
                        'attribute' => 'jenis_kelamin',
                        'data' => Yii::$app->params['dataJenisKelamin'],
                        'options' => ['placeholder' => 'Pilih Jenis Kelamin'],
                        'pluginOptions' => ['allowClear' => false],
                    ],
                    'valueColOptions' => ['style' => 'width:30%'],
                ],

            ]
        ],
        [
            'columns' => [
                [
                    'attribute' => 'tempat_lahir',
                    'format' => 'html',
                    'value' => $model->tempat_lahir,
                    'displayOnly' => false,
                ],
                [
                    'attribute'=>'tanggal_lahir', 
                    'format'=>['date', 'php:d F Y'],
                    'type'=>DetailView::INPUT_WIDGET, // enables you to use any widget
                    'widgetOptions'=>[
                        'class'=>DateControl::classname(),
                        'type'=>DateControl::FORMAT_DATE
                    ],
                    'valueColOptions' => ['style' => 'width:30%'],
                ],
            ], 
        ],
        [
            'columns' => [
                [
                    'attribute' => 'pekerjaan',
                    'format' => 'html',
                    'value' => $model->pekerjaan,
                    'displayOnly' => false,
                ],

            ], 
        ],

        [
            'columns' => [
                [
                    'attribute' => 'alamat',
                    'format' => 'html',
                    'value' => $model->alamat,
                    'displayOnly' => false,
                    'valueColOptions' => ['style' => 'width:30%'],
                ],
                [
                    'attribute' => 'rt',
                    'format' => 'html',
                    'value' => $model->rt,
                    'displayOnly' => false,
                    'valueColOptions' => ['style' => 'width:5%'],
                ],
                [
                    'attribute' => 'rw',
                    'format' => 'html',
                    'value' => $model->rw,
                    'displayOnly' => false,
                    'valueColOptions' => ['style' => 'width:5%'],
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
            'group' => true,
            'label' => 'Hasil Pemeriksaan',
            'rowOptions' => ['class' => 'bg-info'],
            'groupOptions' => ['class' => 'text-center'],
        ],

        [
            'columns' => [
                [
                    'attribute' => 'amphetamin',
                    'format' => 'html',
                    'value' => $model->amphetamin,
                    'displayOnly' => false,
                ],
            ]
        ],
        [
            'columns' => [
                [
                    'attribute' => 'opiate',
                    'format' => 'html',
                    'value' => $model->opiate,
                    'displayOnly' => false,
                ],
    
            ]
        ],
        [
            'columns' => [
                [
                    'attribute' => 'canabinoid',
                    'format' => 'html',
                    'value' => $model->canabinoid,
                    'displayOnly' => false,
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