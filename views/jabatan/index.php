<?php

use yii\helpers\Html;
use yii\grid\GridView;
use kartik\icons\Icon;
use yii\widgets\Pjax;

/* @var $this yii\web\View */
/* @var $searchModel app\models\JabatanSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Jabatan';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="jabatan-index">

    <?php  ?>

    <?php Pjax::begin([
        'id' => 'pjax-tb-jabatan',
        // 'timeout' => '50000'
    ]);
    ?>

    <p>
        <?= Html::a(Icon::show('plus') . 'Tambah', ['create'], ['class' => 'btn bg-olive']) ?>
    </p>

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

                        // 'id',
                        'jabatan',

                        [
                            'class' => 'dickyermawan\ActionColumn\BtnGroup',
                            'label' => ['Lihat', 'Ubah', 'Hapus']
                        ],
                    ],
                ]); ?>
                <?php Pjax::end(); ?>
            </div>
        </div>
    </div>
</div> 