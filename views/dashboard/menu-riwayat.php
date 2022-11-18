<?php 
/*
 * @Author: Dicky Ermawan S., S.T., MTA 
 * @Email: wanasaja@gmail.com 
 * @Linkedin: linkedin.com/in/dickyermawan 
 * @Date: 2018-11-14 16:03:00 
 * @Last Modified by: Dicky Ermawan S., S.T., MTA
 * @Last Modified time: 2018-11-14 16:03:28
 */

use yii\helpers\Html;
use yii\helpers\Url;
use kartik\icons\Icon;

use app\models\User;

use kartik\select2\Select2;

?>

<div class="row" style="padding-bottom:15px;">
    <div class="col-md-12">

        <table style="width:100%;">
            <tbody>
                <tr>
                    <td style="width:50%;">
                    </td>
                    <?php
                        if(in_array(Yii::$app->user->identity->akses, [User::ROLE_SUPERADMIN, User::ROLE_OPERATOR])){
                            ?>
                                <td style="width:30%;">
                                    <?php
                                        echo Select2::widget([
                                            'name' => 'print-per-poli',
                                            'data' => \app\models\Poliklinik::dataPoliNama(),
                                            'options' => [
                                                'id' => 'print-per-poli',
                                                'placeholder' => 'Pilih Poliklinik...',
                                            ],
                                            'pluginOptions' => [
                                                'allowClear' => false,
                                                'width' => '350px'
                                            ],
                                        ]);
                                    ?>
                                </td>
                                <td style="width:5%;">
                                    <?php echo Html::a(Icon::show('print') . ' Print per Poli', '#', ['class' => 'btn btn-primary pull-right', 'id' => 'btn-print']) ?>
                                </td>
                            <?php
                        }
                    ?>
                    
                </tr>
            </tbody>
        </table>

    </div>
</div>