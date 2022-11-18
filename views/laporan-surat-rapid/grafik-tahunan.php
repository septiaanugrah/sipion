<?php
/*
 * @Author: Dicky Ermawan S., S.T., MTA 
 * @Email: wanasaja@gmail.com 
 * @Web: dickyermawan.github.io 
 * @Linkedin: linkedin.com/in/dickyermawan 
 * @Date: 2019-01-06 06:39:28 
 * @Last Modified by: Dicky Ermawan S., S.T., MTA
 * @Last Modified time: 2019-01-06 17:54:02
 */

/* @var $this yii\web\View */
/* @var $searchModel app\models\KunjunganSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */
use yii\helpers\Html;

use kartik\icons\Icon;
use kartik\form\ActiveForm;
use kartik\widgets\Select2;
use kartik\widgets\DatePicker;
use miloschuman\highcharts\Highcharts;
use yii\web\JsExpression;


$this->title = 'Grafik Kunjungan';
$this->params['secondTitle'] = isset($secondTitle) ? $secondTitle : null;

$this->params['breadcrumbs'][] = $this->title;
?>
<div class="laporan-index">

    <?= $this->render('grafik-menu') ?>

    <div class="box box-success">
        <div class="box-header with-border">
            <h3 class="box-title"></h3>

            <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                </button>
                <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
            </div>
        </div>
        <div class="box-body">
        <?php
            echo Highcharts::widget([
                'scripts' => [
                    'modules/exporting',
                    'themes/sand-signika',
                ],
                'options' => [
                    'credits' => ['enabled' => false],
                    'title' => [
                        'text' => 'Kunjungan Tahun Ini',
                    ],
                    'chart' => [
                        'type' => 'column',
                        'height' => 620
                    ],
                    'xAxis' => [
                        'categories' => $namaPoli,
                        'min' => 0,
                        'max' => 17
                    ],
                    'yAxis' => [
                        'title' => [
                            'text' => 'Jumlah Kunjungan'
                        ]
                    ],
                    'tooltip' => [
                        'headerFormat' => '<span style="font-size:10px;">{point.key}</span><table>',
                        'pointFormat' => '<tr><td style="color:{series.color};padding:0">{series.name}: </td><td style="padding:0;"><b>{point.y} Pasien</b></td></tr>',
                        'footerFormat' => '</table>',
                        'shared' => true,
                        'useHTML' => true,
                    ],
                    'plotOptions' => [
                        'column' => [
                            'pointPadding' => 0.2,
                            'borderWidth' => 0
                        ]
                    ],
                    'series' => [
                        [
                            'name' => 'Pasien',
                            'data' => $dataTahunIni,
                        ],
                    ],
                ]
            ]);
        ?>
        </div>
    </div>
    
</div>
