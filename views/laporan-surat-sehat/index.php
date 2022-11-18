<?php
/*
 * @Author: Dicky Ermawan S., S.T., MTA 
 * @Email: wanasaja@gmail.com 
 * @Linkedin: linkedin.com/in/dickyermawan 
 * @Date: 2018-11-16 16:08:05 
 * @Last Modified by: Dicky Ermawan S., S.T., MTA
 * @Last Modified time: 2018-11-19 14:47:30
 */

/* @var $this yii\web\View */
/* @var $searchModel app\models\KunjunganSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */
use yii\helpers\Html;

use kartik\icons\Icon;
use kartik\form\ActiveForm;
use kartik\widgets\Select2;
use kartik\widgets\DatePicker;


$this->title = 'Laporan Surat Sehat';

$this->params['breadcrumbs'][] = $this->title;
?>

<div class="laporan-index">

<div class="box box-danger">
    <div class="box-body">
        <div class="table-responsive">

                
                <div class="col-md-12">
                    
                    <?php
                        $form = ActiveForm::begin([
                            'id' => 'lap_form',
                            'action' => ['laporan-surat-sehat/download']
                        ]);

                        // $dataPoli = \app\models\Poliklinik::dataPoliId();                         
                        // array_unshift($dataPoli, '--Semua Poliklinik--');                        
                        // echo $form->field($model, 'poli')->widget(Select2::classname(), [
                        //     'data' => $dataPoli,
                        //     'options' => ['id' => 'pb-poli', 'placeholder' => 'Pilih Poliklinik...'],
                        //     'pluginOptions' => [
                        //         'allowClear' => false,
                        //     ],
                        //     'pluginEvents' => [
                        //         'change' => 'function(e) {

                        //         }',
                        //     ],
                        // ])->label($model->getAttributeLabel('poli') . Html::tag('span', ' *', ['style' => 'color:red']));


                        echo '<br>';
                        echo '<label class="control-label">Pilih Rentang Tanggal</label>';
                        echo '
                            <span class="pull-right" style="padding-top: 13px; padding-bottom: 0px; display: block;font-size: 90%;line-height: 1.42857143;color: #999999;">
                                *<em>Tanpa rentang tanggal akan memproses semua hari.</em>	
                            </span>
                        ';
                        echo DatePicker::widget([
                            'model' => $model,
                            'attribute' => 'dateAwal',
                            'attribute2' => 'dateAkhir',
                            'options' => ['placeholder' => 'Tanggal Awal', 'autocomplete' => 'off'],
                            'options2' => ['placeholder' => 'Tanggal Akhir', 'autocomplete' => 'off'],
                            'type' => DatePicker::TYPE_RANGE,
                            'form' => $form,
                            'separator' => '<i class="glyphicon glyphicon-resize-horizontal"></i>',
                            'layout' => '<span class="input-group-addon">Dari Tanggal</span>{input1}{separator}<span class="input-group-addon">Sampai Tanggal</span>{input2}',
                            'pluginOptions' => [
                                'format' => 'dd-mm-yyyy',
                                'autoclose' => true,
                                'todayHighlight' => true,
                            ],
                        ]);

                        // echo $form->field($model, 'formatLaporan', [
                        //     'template' => '<br><br>{beginLabel}{labelTitle}{endLabel}<br>{input}{error}{hint}',
                        // ])->radioButtonGroup(Yii::$app->params['dataFormatLaporan'], [
                        //     'id' => 'pb-formatLaporan',
                        //     'class' => 'btn-group-md',
                        //     'itemOptions' => ['labelOptions' => ['class' => 'btn btn-default']],
                        // ]);

                        
                    ?>

                    <div class="form-group" style="padding-top:2%;">
                        <?php 
                            echo Html::submitButton(Icon::show('download') . 'Unduh', [
                                'id' => 'btn-laporan',
                                'class' => 'btn btn-success',
                            ]);
                        ?>
                        <!-- <span id="loading" style="display: none; padding-left:11px; color: #0399bd;">
                            <img width="33px" style="margin-right:10px;" src="<?= \Yii::getAlias('@web') ?>/img/loading.gif" />
                            <i class="blink">Sedang Memproses...</i>
                        </span> -->
                    </div>

                    <?php 
                        ActiveForm::end();
                    ?>

                
                </div>
            </div>
            <!-- /.row -->
        </div>
        <!-- /.box-body -->
    </div>

</div>

<?php 
// $baseUrl = Yii::$app->getUrlManager()->getBaseUrl();
// $script = <<< JS
// 	$('body').on('submit', '#lap_form', function (e) {
//         e.preventDefault();
//         e.stopImmediatePropagation();

// 	    var form = $(this);
// 	    var formData = form.serialize();

// 	    $.ajax({
// 	        url: form.attr('action'),
//             type: form.attr('method'),
// 	        data: formData,
// 	        beforeSend: function() {
//                 $('#btn-laporan').attr('disabled', 'disabled');
//                 $('#loading').show();
// 			},
// 	        success: function (data) {
//                 $('#btn-laporan').removeAttr('disabled');
//                 $('#loading').hide();
//                 // if($('input[name="Laporan[formatLaporan]"]:checked').val() === 'xlsx') {
//                     window.open('$baseUrl/laporan/download-lap?id='+data, '_self');
//                     $("#jExcel").load(location.href + " #jExcel");
//                 // }
// 	        },
// 	        error: function () {
// 	            alert('Ada yang salah, segera hubungi Tim EDP.');
// 	        }
// 	    });
// 	    return false;
// 	});
// JS;

// $this->registerJs($script);