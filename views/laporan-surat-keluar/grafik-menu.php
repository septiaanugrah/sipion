<?php
/*
 * @Author: Dicky Ermawan S., S.T., MTA 
 * @Email: wanasaja@gmail.com 
 * @Web: dickyermawan.github.io 
 * @Linkedin: linkedin.com/in/dickyermawan 
 * @Date: 2019-01-06 10:17:01 
 * @Last Modified by: Dicky Ermawan S., S.T., MTA
 * @Last Modified time: 2019-01-06 15:45:47
 */

use yii\helpers\Url;
use app\components\Helpers;


?>
<div class="grafik-menu" style="padding-bottom:10px;">

    <div class="btn-group btn-group-md" role="group" aria-label="...">
        <a class="btn btn-info <?= Helpers::active('grafik-harian') ?>" href="<?= Url::to(['grafik-harian']) ?>">Harian</a>
        <a class="btn btn-info <?= Helpers::active('grafik-bulanan') ?>" href="<?= Url::to(['grafik-bulanan']) ?>">Bulanan</a>
        <a class="btn btn-info <?= Helpers::active('grafik-tahunan') ?>" href="<?= Url::to(['grafik-tahunan']) ?>">Tahunan</a>
    </div>
</div>