<?php
/*
 * @Author: Dicky Ermawan S., S.T., MTA 
 * @Email: wanasaja@gmail.com 
 * @Linkedin: linkedin.com/in/dickyermawan 
 * @Date: 2018-11-19 11:36:14 
 * @Last Modified by:   Dicky Ermawan S., S.T., MTA 
 * @Last Modified time: 2018-11-19 11:36:14 
 */


use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Poliklinik */

$this->title = 'Update Poliklinik: ' . $model->nama;
$this->params['breadcrumbs'][] = ['label' => 'Poliklinik', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="poliklinik-update">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
