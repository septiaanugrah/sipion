<?php
/*
 * @Author: Dicky Ermawan S., S.T., MTA 
 * @Email: wanasaja@gmail.com 
 * @Linkedin: linkedin.com/in/dickyermawan 
 * @Date: 2018-11-19 11:34:27 
 * @Last Modified by: Dicky Ermawan S., S.T., MTA
 * @Last Modified time: 2018-11-19 11:35:10
 */


use yii\helpers\Html;
use yii\widgets\DetailView;
use kartik\icons\Icon;



/* @var $this yii\web\View */
/* @var $model app\models\Poliklinik */

$this->title = $model->nama;
$this->params['breadcrumbs'][] = ['label' => 'Poliklinik', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="poliklinik-view">

    <div class="box box-success">
        <div class="box-header with-border">
            <h3 class="box-title">
                <?= Html::a(Icon::show('arrow-left') . ' Kembali', ['index'], ['class' => 'btn btn-default']) ?>
                <?= Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
                <?= Html::a('Hapus', ['delete', 'id' => $model->id], [
                    'class' => 'btn btn-danger',
                    'data' => [
                        'confirm' => 'Are you sure you want to delete this item?',
                        'method' => 'post',
                    ],
                ]) ?>
            </h3>

            <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                </button>
                <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
            </div>
        </div>
        <!-- /.box-header -->
        <div class="box-body">

        <?= DetailView::widget([
            'model' => $model,
            'attributes' => [
                'id',
                'nama',
            ],
        ]) ?>

        </div>
    </div>

</div>
