<?php
/*
 * @Author: Dicky Ermawan S., S.T., MTA 
 * @Email: wanasaja@gmail.com 
 * @Linkedin: linkedin.com/in/dickyermawan 
 * @Date: 2018-11-19 11:36:35 
 * @Last Modified by:   Dicky Ermawan S., S.T., MTA 
 * @Last Modified time: 2018-11-19 11:36:35 
 */


use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Poliklinik */

$this->title = 'Tambah Poliklinik';
$this->params['breadcrumbs'][] = ['label' => 'Poliklinik', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="poliklinik-create">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
