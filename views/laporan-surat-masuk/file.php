<?php
/*
 * @Author: Dicky Ermawan S., S.T., MTA 
 * @Email: wanasaja@gmail.com 
 * @Linkedin: linkedin.com/in/dickyermawan 
 * @Date: 2018-11-16 16:08:05 
 * @Last Modified by: Dicky Ermawan S., S.T., MTA
 * @Last Modified time: 2018-11-19 14:22:11
 */

/* @var $this yii\web\View */
/* @var $searchModel app\models\KunjunganSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */
use yii\helpers\Html;
use yii\helpers\Url;

use kartik\icons\Icon;


$this->title = 'Laporan File Sementara';
$this->params['secondTitle'] = isset($secondTitle) ? $secondTitle : null;

$this->params['breadcrumbs'][] = $this->title;
?>
<div class="laporan-index">

    <div class="box box-success">
        <div class="box-header with-border">
            <h3 class="box-title">
                File Sementara
            </h3>
            <?php
                if($files){
                    echo '<h3 class="box-title pull-right" style="padding-right:55px;">';
                    echo Html::a("Hapus Semua", [
                                "hapus-file-all",
                            ], [
                                "class"=>"btn btn-xs btn-danger"
                            ]);
                    echo'</h3>';
                }
            ?>

            <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                </button>
                <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
            </div>
        </div>
        <!-- /.box-header -->
        <div class="box-body">
            <div class="row">
                
                <div class="col-md-12">
                    
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th>No.</th>
                                <th>File</th>
                                <th>Tanggal</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                                if(!$files)
                                    echo '
                                        <tr>
                                            <td colspan="4" style="text-align:center"><i>Tidak Ada File Laporan Yang Tersisa</i></td>
                                        </tr>
                                    ';

                                foreach ($files as $key => $value) {
                                    echo '
                                        <tr>
                                            <td>'.($key+1).'</td>
                                            <td>
                                                <a href="'.Url::to(['laporan/download-lap', 'id'=> $value['nameFull']]).'">
                                                    '. $value['nameFull'] .'
                                                </a>
                                            </td>
                                            <td>'. $value['dateModifiedIndo'] .'</td>
                                            <td>'.
                                                Html::a('Hapus', ['hapus-file',
                                                    'id' => $value['path']
                                                ], [
                                                    'class' => 'btn btn-xs btn-danger'
                                                ])
                                            .'</td>
                                        </tr> 
                                    ';
                                }
                            ?>
                        </tbody>
                    </table>
                
                </div>
            </div>
            <!-- /.row -->
        </div>
        <!-- /.box-body -->
    </div>

</div>
