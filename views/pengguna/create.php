<?php
/*
 * @Author: Dicky Ermawan S., S.T., MTA 
 * @Email: wanasaja@gmail.com 
 * @Linkedin: linkedin.com/in/dickyermawan 
 * @Date: 2018-11-19 09:14:50 
 * @Last Modified by:   Dicky Ermawan S., S.T., MTA 
 * @Last Modified time: 2018-11-19 09:14:50 
 */


use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Pengguna */

$this->title = 'Tambah Pengguna';
$this->params['breadcrumbs'][] = ['label' => 'Pengguna', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="pengguna-create">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
