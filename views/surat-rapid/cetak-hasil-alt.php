<?php
use app\components\Helper;
use yii\helpers\Json;

?>

<div class="panel">
    <div class="panel-body">
        <div class="container ">
            <table style="width:100%;">
                <tbody>
                    <tr>
                        <td>
                            <img src="<?= \yii\helpers\Url::to('@web/img/riau.png', true) ?>" width="55" alt="logo" />
                        </td>
                        <td style="text-align:center;" width="100%">
                            <h3>
                                <strong>
                                    PEMERINTAH PROVINSI RIAU
                                </strong>
                            </h3>
                            <h3>
                                <strong>
                                    RUMAH SAKIT UMUM DAERAH PETALA BUMI
                                </strong>
                            </h3>
                            <h5>
                                <strong>
                                    Jl. Dr. Soetomo No. 65 Telp.(0761) 23024. Pekanbaru
                                </strong>
                            </h5>
                        </td>
                    </tr>
                </tbody>
            </table>
            <hr style="margin-top:0px">
            <table style="width:100%; margin-bottom: 10px;">
                <tr>
                    <td style="text-align:center; font-size:16px"><strong><u>SURAT KETERANGAN PEMERIKSAAN LABORATORIUM</u></strong></td>
                </tr>
                <tr>
                    <td style="text-align:center;">No. : <?= $model->nomor_surat ?></td>
                </tr>
            </table>

            <table style="width:100%; margin-bottom: 10px; margin-top: 30px">
                <tr>
                    <td style="width:30%">Nama </td>
                    <td style="width:2%">:</td>
                    <td> <?= $model->nama ?></td>
                </tr>
              
            </table>
    

            <!-- <hr> -->
            <!-- <table style="width: 100%; padding-top: 15px;">
                <tr>
                    <td colspan="2" style="width: 60%;"></td>
                    <td style="width: 40%; padding-left: 7%; padding-bottom: 5%;">
                        Pekanbaru, <? echo //  Yii::$app->formatter->asDate(time(), 'php:d F Y') ?>
                    </td>
                </tr>
                <tr>

                    <td style="width: 33.33%; text-align: center;">
                        Disetujui Oleh,<br>
                        Kepala Ruangan <? echo // $model->jenisUnit . Yii::$app->user->identity->pengguna->poliNama ?>
                        <br>
                        <br>
                        <br>
                        <br>
                        <? echo // Yii::$app->user->identity->pengguna->relasiPoliklinik->kepalaTeks->nama ?><br>
                        <? echo // (Yii::$app->user->identity->pengguna->relasiPoliklinik->kepalaTeks->nip) ? 'NIP. '. Yii::$app->user->identity->pengguna->relasiPoliklinik->kepalaTeks->nip : '' ?>
                    </td>
                    <td style="width: 33.33%; text-align: center;">
                    </td>
                    <td style="width: 33.33%; text-align: center;">
                        Yang Meminta,<br>
                        <br>
                        <br>
                        <br>
                        <br>
                        <? echo // $model->user->pengguna->nama ?><br>
                        <? echo // ($model->user->pengguna->nip) ? 'NIP. '. $model->user->pengguna->nip : '' ?>
                    </td>

                </tr>
            </table> -->
    
        </div>

    </div>
</div> 