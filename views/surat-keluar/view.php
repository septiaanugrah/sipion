<?php

use yii\helpers\Html;
use kartik\detail\DetailView;
use app\models\User;
use kartik\icons\Icon;
use kartik\datecontrol\DateControl;

// $garing = strpos("$model->nomor_surat","/");
// echo "<pre>";
// print_r($garing);
// echo "</pre>";
// exit;

// $data_kode = \app\models\KodeSurat::dataKodeNama();

/* @var $this yii\web\View */
/* @var $model app\models\SuratKeluar */

$this->title = 'Surat Keluar Nomor: ' . $model->nomor_surat;
$this->params['breadcrumbs'][] = ['label' => 'Surat Keluar', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="surat-keluar-view">

    </br>

    <div style="padding-bottom:2%">

        <?= Html::a(Icon::show('backward') . 'Kembali', ['index'], ['class' => 'btn btn-info']) ?>
        <?= Html::a(Icon::show('download') . 'Unduh', ['download', 'id' => $model->id], ['class' => 'btn btn-success', 'data-pjax' => 0, 'target' => 'blank']) ?>

        <div class="pull-right">
        <?= Html::a(Icon::show('upload') . 'Unggah Ulang', ['update', 'id' => $model->id], ['class' => 'btn btn-warning']) ?>
            <?= Html::a(Icon::show('eraser') . 'Kosongkan', ['delete', 'id' => $model->id], [
                'class' => 'btn btn-danger',
                'data' => [
                    'confirm' => 'Apakah anda yakin ingin mengosongkan data ini?',
                    'method' => 'post',
                ],
                ]) ?>
        </div>
    </div>
    </br>


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
                    'attribute' => 'kode_surat',
                    'format' => 'html',
                    'type' => DetailView::INPUT_SELECT2,
                    'value' => $model->kode_surat,
                    'widgetOptions' => [
                        'attribute' => 'kode_surat',
                        'data' => $data_kode,
                        'options' => ['placeholder' => 'Pilih Kode Surat'],
                        'pluginOptions' => ['allowClear' => false],
                    ],
                    'valueColOptions' => ['style' => 'width:30%'],
                ],
                // [
                //     'attribute' => 'kode_surat',
                //     'format' => 'html',
                //     'value' => '<kbd>' . $model->kode_surat . '</kbd>',
                //     'displayOnly' => false,
                //     'valueColOptions' => ['style' => 'width:30%'],
                // ],
                [
                    'attribute' => 'nomor_surat',
                    'format' => 'html',
                    'value' => '<kbd>' . $model->nomor_surat . '</kbd>',
                    'displayOnly' => false,
                    'options' => ['readonly' => true],
                    'valueColOptions' => ['style' => 'width:30%'],
                ],
            ]
        ],

        [
            'columns' => [
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
                    'attribute' => 'alamat_tujuan',
                    'format' => 'html',
                    'type' => DetailView::INPUT_TEXTAREA,
                    'value' => $model->alamat_tujuan,
                    'valueColOptions' => ['style' => 'width:30%'],
                ],
                [
                    'attribute' => 'perihal',
                    'format' => 'html',
                    'type' => DetailView::INPUT_TEXTAREA,
                    'value' => $model->perihal,
                    'valueColOptions' => ['style' => 'width:30%'],
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
        'mode' => DetailView::MODE_EDIT,
        'vAlign' => DetailView::ALIGN_MIDDLE,
        'hAlign' => DetailView::ALIGN_CENTER,
        'panel' => [
            'heading' => Icon::show('envelope') . $this->title,
            'type' => DetailView::TYPE_PRIMARY,
            'footer' => '<div class="text-center text-muted">Sistem Informasi Perpusatakaan Online (SIPION)</div>',
        ],
        'buttons1' => '{update}',
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
