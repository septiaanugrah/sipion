<?php
/*
 * @Author: Dicky Ermawan S., S.T., MTA 
 * @Email: wanasaja@gmail.com 
 * @Web: dickyermawan.github.io 
 * @Linkedin: linkedin.com/in/dickyermawan 
 * @Date: 2019-01-04 16:59:17 
 * @Last Modified by: Dicky Ermawan S., S.T., MTA
 * @Last Modified time: 2019-01-06 06:32:48
 */

/* @var $this yii\web\View */
/* @var $searchModel app\models\KunjunganSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */
use yii\helpers\Html;

use kartik\icons\Icon;
use kartik\form\ActiveForm;
use kartik\widgets\Select2;
use kartik\widgets\DatePicker;


$this->title = 'Laporan';
$this->params['secondTitle'] = isset($secondTitle) ? $secondTitle : null;

$this->params['breadcrumbs'][] = $this->title;
?>
<div class="laporan-index">

    <div class="box box-success">
        <div class="box-header with-border">
            <h3 class="box-title">Download Laporan Sensus Bulanan</h3>

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
                    
                    <?php
                        $form = ActiveForm::begin([
                            'id' => 'lap_sensus',
                            'action' => ['laporan/download-sensus']
                        ]);
                        
                        echo $form->field($model, 'bulanTahun')->widget(DatePicker::classname(), [
                            'removeButton' => false,
                            'options' => [
                                'style' => 'width:30%',
                                'placeholder' => 'Pilih Bulan & Tahun...',
                                'autocomplete' => 'disabled'
                            ],
                            'pluginOptions' => [
                                'autoclose'=>true,
                                'viewMode' => 'months',
                                'minViewMode' => 'months',
                                'format' => 'mm-yyyy'
                            ]
                        ]);
                        
                    ?>

                    <div class="form-group" style="padding-top:2%;">
                        <?php 
                            echo Html::submitButton(Icon::show('download') . ' Download', [
                                'id' => 'btn-laporan',
                                'class' => 'btn btn-success',
                            ]);
                        ?>
                        <span id="loading" style="display: none; padding-left:11px; color: #0399bd;">
                            <img width="33px" style="margin-right:10px;" src="<?= \Yii::getAlias('@web') ?>/img/loading.gif" />
                            <i class="blink">Sedang Memproses...</i>
                        </span>
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
$baseUrl = Yii::$app->getUrlManager()->getBaseUrl();
$script = <<< JS
	$('body').on('submit', '#lap_sensus', function (e) {
        e.preventDefault();
        e.stopImmediatePropagation();

	    var form = $(this);
	    var formData = form.serialize();

	    $.ajax({
	        url: form.attr('action'),
            type: form.attr('method'),
	        data: formData,
	        beforeSend: function() {
                $('#btn-laporan').attr('disabled', 'disabled');
                $('#loading').show();
			},
	        success: function (data) {
                $('#btn-laporan').removeAttr('disabled');
                $('#loading').hide();
                window.open('$baseUrl/laporan/download-lap?id='+data, '_self');
                $("#jExcel").load(location.href + " #jExcel");
	        },
	        error: function () {
	            alert('Ada yang salah, segera hubungi Tim EDP.');
	        }
	    });
	    return false;
	});
JS;

$this->registerJs($script);