<?php
/*
 * @Author: Dicky Ermawan S., S.T., MTA 
 * @Email: wanasaja@gmail.com 
 * @Linkedin: linkedin.com/in/dickyermawan 
 * @Date: 2018-11-13 13:54:19 
 * @Last Modified by: Dicky Ermawan S., S.T., MTA
 * @Last Modified time: 2018-12-02 11:58:15
 */


use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\GridView;
use yii\bootstrap\Modal;
use yii\widgets\Pjax;

use kartik\icons\Icon;
use kartik\widgets\Select2;
use app\models\User;
use kartik\widgets\DatePicker;

\app\assets\ModalAsset::register($this);

/* @var $this yii\web\View */
/* @var $searchModel app\models\KunjunganSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = "Dashboard";
$this->params['secondTitle'] = isset($secondTitle) ? $secondTitle : null;

$this->params['breadcrumbs'][] = $this->title;
?>
<div class="kunjungan-index">

    <!-- <h1><?= Html::encode($this->title) ?></h1> -->
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?php
        if(in_array(Yii::$app->requestedRoute, ['kunjungan/index', '', 'kunjungan/riwayat-hari-ini']))
        {
            echo $this->render('menu-hari-ini');
        }
        // if(in_array(Yii::$app->requestedRoute, ['kunjungan/riwayat-hari-ini']))
        // {
        //     echo $this->render('menu-riwayat');
        // }
    ?>

    <?php
        Modal::begin([
            'size' => Modal::SIZE_LARGE,
            'id' => 'modal',
            'options' => [
                'tabindex' => false,
            ],
            'header' => '<h4 id="modal-header"></h4>',
        ]);
        echo '<div id="modalContent"></div>';
        Modal::end();
    ?>

    <div id="printarea">
    </div>



</div>

