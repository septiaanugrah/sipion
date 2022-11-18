<?php
/*
 * @Author: Dicky Ermawan S., S.T., MTA 
 * @Email: wanasaja@gmail.com 
 * @Linkedin: linkedin.com/in/dickyermawan 
 * @Date: 2018-11-13 13:54:02 
 * @Last Modified by: Dicky Ermawan S., S.T., MTA
 * @Last Modified time: 2018-12-05 11:43:07
 */


use yii\helpers\Html;
// use yii\widgets\DetailView;

use kartik\icons\Icon;
use kartik\detail\DetailView;
use kartik\dialog\Dialog;

/* @var $this yii\web\View */
/* @var $model app\models\Kunjungan */

$this->title = $model->nama_pasien;
$this->params['breadcrumbs'][] = ['label' => 'Kunjungan', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="kunjungan-view">

    <div class="row" style="padding-bottom:5px;">
        <div class="col-md-12">
            <?= Html::a(Icon::show('arrow-left') . ' Input Lagi', ['kunjungan/create-biasa'], ['class' => 'btn bg-maroon']) ?>

            <?= Html::a(Icon::show('trash-alt') . ' Hapus', ['delete', 'id' => $model->id], [
                'class' => 'btn btn-md btn-danger pull-right',
                'data' => [
                    'header' => 'asd',
                    'confirm' => 'Anda yakin ingin menghapus data ini? (' . $model->nama_pasien . ')',
                    'method' => 'post',
                ],
            ]) ?>
            
        </div>
    </div>

    <?php
        echo DetailView::widget([
            'model' => $model,
            'condensed' => false,
            'hover' => true,
            'striped' => false,
            'mode' => DetailView::MODE_VIEW,
            'buttons1' => null,
            'panel' => [
                'heading' => 'Pasien # ' . $model->nama_pasien,
                'type' => DetailView::TYPE_PRIMARY,
            ],
            'attributes' => [
                [
                    'group' => true,
                    'label' => 'BAGIAN 1: Kunjungan Pasien',
                    'rowOptions' => ['class' => 'bg-info'],
                    'groupOptions' => ['class' => 'text-center'],
                ],
                [
                    'columns' => [
                        'poliNama',
                        [
                            'attribute' => 'no_antrian',
                            'label' => 'No. Antrian',
                            'valueColOptions' => ['style' => 'width:30%; font-weight: bold; font-size: 25px;'],
                            'format' => 'html',
                        ],
                    ]
                ],
                [
                    'attribute' => 'no_mr',
                    'format' => 'html',
                    'value' => '<kbd>' . $model->no_mr . '</kbd>',
                    'displayOnly' => false,
                    'valueColOptions' => ['style' => 'width:100%'],
                ],
                'nama_pasien',
                'jenis_pembayaran',
                'jenis_pasien',
                'faskes_rujukan',
                [
                    'group' => true,
                    'label' => 'BAGIAN 2: Penanggung Jawab',
                    'rowOptions' => ['class' => 'bg-info'],
                    'groupOptions' => ['class' => 'text-center'],
                ],
                'penggunaNama',
                [
                    'attribute' => 'create_date',
                    'value' => \Yii::$app->formatter->asDate($model->create_date, 'php:l, d F Y')
                ]
            ],
        ]);

    ?>

</div>
<?php 

Dialog::widget(['overrideYiiConfirm' => true]);
Dialog::widget([
    'options' => [
        'closable' => true
    ],
    'dialogDefaults' => [
        Dialog::DIALOG_CONFIRM => [
            'type' => Dialog::TYPE_WARNING,
            'title' => Yii::t('kvdialog', 'Konfirmasi'),
            'btnOKClass' => 'btn-warning',
            'btnCancelLabel' => '<span class="glyphicon glyphicon-ban-circle"></span> ' . Yii::t('kvdialog', 'Batal'),
        ],
    ],
]);
