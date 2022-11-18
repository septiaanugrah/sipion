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

$this->params['breadcrumbs'][] = $this->title;
?>
<div class="kunjungan-index">

    <!-- <h1><?= Html::encode($this->title) ?></h1> -->
    <?php  ?>

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

    <?php Pjax::begin([
        'id' => 'pjax-tb-surat-keluar',
                // 'timeout' => '50000'
    ]);
    ?>

    <div class="box box-danger">
        <div class="box-header with-border">
            <h3 class="box-title">
                <i class="fa fa-envelope"></i>
                Surat Menyurat
            </h3>
        </div>
        <!-- /.box-header -->
        <div class="box-body" style="padding-bottom:5%">
            <?php
            Pjax::begin([
                'id' => 'grid-info-antrin',
            ]);
            ?>
            <div class="row">

                <div class="col-md-3 col-sm-6 col-xs-12">
                    <div class="info-box bg-aqua">
                        <span class="info-box-icon"><i class="fa fa-mail-reply"></i></span>

                        <div class="info-box-content">
                            <span class="info-box-text">Surat Masuk</span>
                            <span class="info-box-number"><?= $jml_surat_masuk?> Surat</span>
                        </div>
                        <!-- /.info-box-content -->
                    </div>
                    <!-- /.info-box -->
                </div>

                <div class="col-md-3 col-sm-6 col-xs-12">
                    <div class="info-box bg-green">
                        <span class="info-box-icon"><i class="fa fa-mail-forward"></i></span>

                        <div class="info-box-content">
                            <span class="info-box-text">Surat Keluar</span>
                            <span class="info-box-number"><?= $jml_surat_keluar?> Surat</span>
                        </div>
                        <!-- /.info-box-content -->
                    </div>
                    <!-- /.info-box -->
                </div>

                <div class="col-md-3 col-sm-6 col-xs-12">
                    <div class="info-box bg-yellow">
                        <span class="info-box-icon"><i class="fa fa-envelope"></i></span>

                        <div class="info-box-content">
                            <span class="info-box-text">Undangan Keluar</span>
                            <span class="info-box-number"><?= $jml_undangan_keluar?> Undangan</span>
                        </div>
                        <!-- /.info-box-content -->
                    </div>
                    <!-- /.info-box -->
                </div>

                <div class="col-md-3 col-sm-6 col-xs-12">
                    <div class="info-box bg-red">
                        <span class="info-box-icon"><i class="fa fa-file-text"></i></span>

                        <div class="info-box-content">
                            <span class="info-box-text">Nota Dinas</span>
                            <span class="info-box-number"><?= $jml_nota_dinas?> Nota</span>
                        </div>
                        <!-- /.info-box-content -->
                    </div>
                    <!-- /.info-box -->
                </div>

                <div class="col-md-3 col-sm-6 col-xs-12">
                    <div class="info-box bg-aqua">
                        <span class="info-box-icon"><i class="fa fa-file"></i></span>

                        <div class="info-box-content">
                            <span class="info-box-text">Surat Keputusan</span>
                            <span class="info-box-number"><?= $jml_surat_keputusan?> Surat</span>
                        </div>
                        <!-- /.info-box-content -->
                    </div>
                    <!-- /.info-box -->
                </div>

                <div class="col-md-3 col-sm-6 col-xs-12">
                    <div class="info-box bg-green">
                        <span class="info-box-icon"><i class="fa fa-file"></i></span>

                        <div class="info-box-content">
                            <span class="info-box-text">Nota Kesepahaman</span>
                            <span class="info-box-number"><?= $jml_nota_kesepahaman?> Nota</span>
                        </div>
                        <!-- /.info-box-content -->
                    </div>
                    <!-- /.info-box -->
                </div>

                <div class="col-md-3 col-sm-6 col-xs-12">
                    <div class="info-box bg-yellow">
                        <span class="info-box-icon"><i class="fa fa-file-text"></i></span>

                        <div class="info-box-content">
                            <span class="info-box-text">Surat Perjalanan Dinas</span>
                            <span class="info-box-number"><?= $jml_surat_perjalanan_dinas?> Surat</span>
                        </div>
                        <!-- /.info-box-content -->
                    </div>
                    <!-- /.info-box -->
                </div>

                <div class="col-md-3 col-sm-6 col-xs-12">
                    <div class="info-box bg-red">
                        <span class="info-box-icon"><i class="fa fa-file-archive-o"></i></span>

                        <div class="info-box-content">
                            <span class="info-box-text">Surat Perintah Tugas</span>
                            <span class="info-box-number"><?= $jml_surat_sehat?> Surat</span>
                        </div>
                        <!-- /.info-box-content -->
                    </div>
                    <!-- /.info-box -->
                </div>

                <div class="col-md-3 col-sm-6 col-xs-12">
                    <div class="info-box bg-aqua">
                        <span class="info-box-icon"><i class="fa fa-stethoscope"></i></span>

                        <div class="info-box-content">
                            <span class="info-box-text">Surat Sehat</span>
                            <span class="info-box-number"><?= $jml_surat_sehat?> Surat</span>
                        </div>
                        <!-- /.info-box-content -->
                    </div>
                    <!-- /.info-box -->
                </div>

                <div class="col-md-3 col-sm-6 col-xs-12">
                    <div class="info-box bg-green">
                        <span class="info-box-icon"><i class="fa fa-medkit"></i></span>

                        <div class="info-box-content">
                            <span class="info-box-text">Surat Bebas Narkoba</span>
                            <span class="info-box-number"><?= $jml_surat_narkoba?> Surat</span>
                        </div>
                        <!-- /.info-box-content -->
                    </div>
                    <!-- /.info-box -->
                </div>

                <div class="col-md-3 col-sm-6 col-xs-12">
                    <div class="info-box bg-yellow">
                        <span class="info-box-icon"><i class="fa fa-eyedropper"></i></span>

                        <div class="info-box-content">
                            <span class="info-box-text">Surat Pemeriksaan Rapid</span>
                            <span class="info-box-number"><?= $jml_surat_rapid?> Surat</span>
                        </div>
                        <!-- /.info-box-content -->
                    </div>
                    <!-- /.info-box -->
                </div>

            </div>
        </div>
    </div>
</div>

<div class="box box-danger">
    <div class="box-header with-border">
        <h3 class="box-title">
            <i class="fa fa-users"></i>
            Manajemen
        </h3>
    </div>
    <div class="box-body" style="padding-bottom:5%">

        <div class="row">

            <div class="col-md-3 col-sm-6 col-xs-12">
                <div class="info-box bg-aqua">
                    <span class="info-box-icon"><i class="fa fa-users"></i></span>

                    <div class="info-box-content">
                        <span class="info-box-text">Pengguna</span>
                        <span class="info-box-number"><?= $jml_pengguna?> Pengguna</span>
                    </div>
                    <!-- /.info-box-content -->
                </div>
                <!-- /.info-box -->
            </div>

            <div class="col-md-3 col-sm-6 col-xs-12">
                <div class="info-box bg-green">
                    <span class="info-box-icon"><i class="fa fa-user"></i></span>

                    <div class="info-box-content">
                        <span class="info-box-text">Jabatan</span>
                        <span class="info-box-number"><?= $jml_jabatan?> Jabatan</span>
                    </div>
                    <!-- /.info-box-content -->
                </div>
                <!-- /.info-box -->
            </div>

        <?php Pjax::end(); ?> 