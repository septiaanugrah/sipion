<?php
/*
 * @Author: Dicky Ermawan S., S.T., MTA 
 * @Email: wanasaja@gmail.com 
 * @Linkedin: linkedin.com/in/dickyermawan 
 * @Date: 2018-11-19 11:36:29 
 * @Last Modified by: Dicky Ermawan S., S.T., MTA
 * @Last Modified time: 2018-11-19 11:37:05
 */


use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\PoliklinikSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Poliklinik';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="poliklinik-index">

    <div class="box box-success">
        <div class="box-header with-border">
            <h3 class="box-title">
            <?= Html::a('Tambah Poliklinik', ['create'], ['class' => 'btn btn-success']) ?>
            </h3>

            <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                </button>
                <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
            </div>
        </div>
        <!-- /.box-header -->
        <div class="box-body">
            <?= GridView::widget([
                'dataProvider' => $dataProvider,
                'filterModel' => $searchModel,
                'columns' => [
                    ['class' => 'yii\grid\SerialColumn'],

                    // 'id',
                    'nama',

                    [
                        'class' => 'dickyermawan\ActionColumn\BtnGroup',
                        'label' => ['Lihat', 'Ubah', 'Hapus']  
                    ],
                ],
            ]); ?>
        </div>
    </div>
</div>
