<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
use kartik\icons\Icon;
use kartik\date\DatePicker;
use yii\helpers\Url;
use kartik\widgets\Select2;
use app\models\User;

/* @var $this yii\web\View */
/* @var $searchModel app\models\SuratRapidSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Surat Hasil Pemeriksaan Rapid';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="surat-rapid-index">

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?php Pjax::begin([
        'id' => 'pjax-tb-surat-rapid',
                // 'timeout' => '50000'
    ]);
    ?>

    <?php 
        // if(Yii::$app->user->identity->akses == User::ROLE_LABORATORIUM || Yii::$app->user->identity->akses == User::ROLE_ADMIN_LABORATORIUM ) {
        if (in_array(Yii::$app->user->identity->akses, [  User::ROLE_LABORATORIUM, User::ROLE_ADMIN_LABORATORIUM ])) {
    ?>
    <p>
        <?= Html::a(Icon::show('plus') . 'Tambah', ['create'], ['class' => 'btn bg-olive']) ?>
    </p>
    <?php 
        }
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
                    'no_mr',
                    // 'jenis',
                    [
                        'attribute' => 'jenis',
                        'value' => function ($model) {
                            return $model->jenis;
                        },
                        'filter' => Select2::widget([
                            'model' => $searchModel,
                            'attribute' => 'jenis',
                            'data' => Yii::$app->params['dataJenisPemeriksaan'],
                            'options' => ['placeholder' => 'Pilih Jenis Pemeriksaan'],
                            'pluginOptions' => [
                                'allowClear' => true
                            ],
                        ]),
                        'format' => 'html',
                    ],
                    // 'alamat',
                    //'created_by',
                    //'created_at',
                    //'updated_by',
                    //'updated_at',

                    [
                        'class' => 'yii\grid\ActionColumn',
                        'template' => '<div style="padding-bottom:5px;">{leadPrint}{leadView}</div>',
                        'visibleButtons' => [
                            'leadPrint' => function ($model) {
                                return in_array(Yii::$app->user->identity->akses, [
                                    User::ROLE_SUPERADMIN,
                                    User::ROLE_LABORATORIUM,
                                    User::ROLE_ADMIN_LABORATORIUM
                                    // User::ROLE_ADMIN
                                ]);
                            },
                        ],
                        'buttons' => [
                            'leadView' => function ($url, $model) {
                                $url = Url::to(['surat-rapid/view', 'id' => $model->id]);
                                return Html::a(Icon::show('eye') . 'Lihat', $url, ['title' => 'view', 'class' => 'btn btn-primary', 'style' => 'width:100%']);
                            },
                            'leadPrint' => function ($url, $model) {
                                $url = Url::to(['surat-rapid/cetak-hasil', 'id' => $model->id]);
                                return Html::a(Icon::show('print') . 'Cetak', $url, ['title' => 'update', 'target' => 'blank', 'class' => 'btn bg-orange', 'style' => 'width:100%', 'data-pjax' => 0]);
                            },
                            
                        ]
                    ],
                ],
            ]); ?>
                <?php Pjax::end(); ?>
            </div>
        </div>
    </div>
</div>

