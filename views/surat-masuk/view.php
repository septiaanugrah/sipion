<?php

use yii\helpers\Html;
use kartik\detail\DetailView;
use app\models\User;
use kartik\icons\Icon;
use kartik\datecontrol\DateControl;

/* @var $this yii\web\View */
/* @var $model app\models\SuratMasuk */

$this->title = 'Lihat Rincian Buku';
$this->params['breadcrumbs'][] = ['label' => 'Surat Masuk', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>

<div class="surat-masuk-view">

    </br>

    <div style="padding-bottom:2%">
        <?= Html::a(Icon::show('backward') . 'Kembali', ['index'], ['class' => 'btn btn-primary']) ?>
        <?= Html::a(Icon::show('download') . 'Unduh', ['download', 'id' => $model->id], ['class' => 'btn btn-success', 'data-pjax' => 0, 'target' => 'blank']) ?>

        <div class="form-group pull-right">
            <?= Html::a(Icon::show('upload') . 'Unggah Ulang', ['update', 'id' => $model->id], ['class' => 'btn btn-warning']) ?>
            <?= Html::a(Icon::show('trash') . 'Hapus', ['delete', 'id' => $model->id], [
                    'class' => 'btn btn-danger',
                    'data' => [
                        'confirm' => 'Anda Yakin Ingin Menghapus Data Ini?',
                        'method' => 'post',
                    ],
                ])
            ?>
        </div>

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
            'label' => 'Identitas Buku',
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
                    'attribute' => 'alamat_pengirim',
                    'format' => 'html',
                    'value' => $model->alamat_pengirim,
                    'displayOnly' => false,
                ],
            ]
        ],
        [
            'columns' => [
              
                [
                    'attribute' => 'perihal',
                    'format' => 'html',
                    'type' => DetailView::INPUT_TEXTAREA,
                    'value' => $model->perihal,
                    'displayOnly' => false,
                    'valueColOptions' => ['style' => 'width:40%'],
                ],
                [
                    'attribute' => 'keterangan',
                    'format' => 'html',
                    'type' => DetailView::INPUT_TEXTAREA,
                    'value' => $model->keterangan,
                    'displayOnly' => false,
                    'valueColOptions' => ['style' => 'width:40%'],
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
                    'valueColOptions' => ['style' => 'width:30%'],
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
                    'valueColOptions' => ['style' => 'width:30%'],
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

