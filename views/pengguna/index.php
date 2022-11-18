<?php

use yii\helpers\Html;
use yii\grid\GridView;
use kartik\icons\Icon;

/* @var $this yii\web\View */
/* @var $searchModel app\models\PenggunaSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Pengguna';
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="pengguna-index">

        <p>
            <?= Html::a(Icon::show('plus') . 'Tambah', ['create'], ['class' => 'btn bg-olive']) ?>
        </p>
    
            <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                </button>
                <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
            </div>
        </div>
        <!-- /.box-header -->
        <div class="box box-danger">
            <div class="box-body">
                <div class="table-responsive">
                <?= GridView::widget([
                    'dataProvider' => $dataProvider,
                    'filterModel' => $searchModel,
                    'columns' => [
                        ['class' => 'yii\grid\SerialColumn'],

                // 'id',
                        'username',
                // 'password',
                        'nama',
                        'no_hp',
                // 'akses',
                        [
                            'attribute' => 'akses',
                            'value' => function ($model) {
                                return \app\components\Helpers::label($model->akses);
                            },
                            'format' => 'html'
                        ],
                // 'authKey',
                        // 'create_at',
                        // 'modified_at',
                        // [
                        //     'attribute' => 'create_at',
                        //     'value' => function ($model) {
                        //         return \Yii::$app->formatter->asDate($model->create_at, 'php:d-m-Y H:i:s');

                        //     }
                        // ],
                        // [
                        //     'attribute' => 'modified_at',
                        //     'value' => function ($model) {
                        //         return \Yii::$app->formatter->asDate($model->modified_at, 'php:d-m-Y H:i:s');

                        //     }
                        // ],
                // 'change_by',
                        // 'changeByNama',

                        [
                            'class' => 'dickyermawan\ActionColumn\BtnGroup',
                            'label' => ['Lihat', 'Ubah', 'Hapus']                                                            
                        ],
                    ],
                ]); ?>
            </div>
</div>
