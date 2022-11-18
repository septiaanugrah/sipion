<?php
/*
 * @Author: Dicky Ermawan S., S.T., MTA 
 * @Email: wanasaja@gmail.com 
 * @Linkedin: linkedin.com/in/dickyermawan 
 * @Date: 2018-11-19 09:27:26 
 * @Last Modified by: Dicky Ermawan S., S.T., MTA
 * @Last Modified time: 2018-11-19 11:17:03
 */


use yii\helpers\Html;
use yii\widgets\DetailView;
use app\models\User;
use kartik\icons\Icon;

/* @var $this yii\web\View */
/* @var $model app\models\Pengguna */

$this->title = $model->nama;
$this->params['breadcrumbs'][] = ['label' => 'Penggunas', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="pengguna-view">

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

        <!-- /.box-header -->
        <div class="box-body">
            <?= DetailView::widget([
                'model' => $model,
                'attributes' => [
                    'id',
                    'username',
                    'password',
                    'nama',
                    'no_hp',
                    'akses',
                    'authKey',
                    [
                        'attribute' => 'created_by',
                        'value' => $username_created_by,
                    ],
                    [
                        'attribute' => 'created_at',
                        'format' => ['date', 'php:d F Y H:i:s']
                    ],
                    [
                        'attribute' => 'updated_by',
                        'value' => $username_updated_by,
                    ],
                    [
                        'attribute' => 'updated_at',
                        'format' => ['date', 'php:d F Y H:i:s']
                    ],
                ],
            ]) ?>
        </div>
    </div>

</div>
