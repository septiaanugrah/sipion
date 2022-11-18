<?php
/*
 * @Author: Dicky Ermawan S., S.T., MTA 
 * @Email: wanasaja@gmail.com 
 * @Linkedin: linkedin.com/in/dickyermawan 
 * @Date: 2018-11-05 10:56:38 
 * @Last Modified by: Dicky Ermawan S., S.T., MTA
 * @Last Modified time: 2018-11-19 14:49:15
 */


use yii\helpers\Html;
use yii\helpers\Url;

use kartik\form\ActiveForm;
use kartik\widgets\Select2;
use kartik\icons\Icon;

/* @var $this yii\web\View */
/* @var $model app\models\Kunjungan */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="kunjungan-form">

    <?php $form = ActiveForm::begin([
        'id' => $model->formName(),
        'enableAjaxValidation' => true,
        'validationUrl' => Url::to(['kunjungan/validasi']),
        'type' => ActiveForm::TYPE_VERTICAL
    ]); ?>

    <div class="row">
        <div class="col-md-6">
            <?php
                echo $form->field($model, 'id_poliklinik')->widget(Select2::classname(), [
                    'data' => \app\models\Poliklinik::dataPoliId(),
                    'options' => ['id' => 'pb-id_poliklinik', 'placeholder' => 'Pilih Poliklinik...',],
                    'pluginOptions' => [
                        'allowClear' => false,
                    ],
                    'pluginEvents' => [
                        'change' => 'function(e) { 
                            
                        }',
                    ],
                ])->label($model->getAttributeLabel('id_poliklinik') . Html::tag('span', ' *',['style'=>'color:red']));
            ?>

            <?= $form->field($model, 'no_mr')->textInput(['type' => 'number'])->label($model->getAttributeLabel('no_mr') . Html::tag('span', ' *',['style'=>'color:red'])); ?>

            <?= $form->field($model, 'nama_pasien')->textInput(['style'=>'text-transform: uppercase;', 'maxlength' => true])->label($model->getAttributeLabel('nama_pasien') . Html::tag('span', ' *',['style'=>'color:red'])); ?>

        </div>
        <div class="col-md-6">
            <?php
                echo $form->field($model, 'jenis_pembayaran')->widget(Select2::classname(), [
                    'data' => Yii::$app->params['dataJenisPembayaran'],
                    'options' => ['id' => 'pb-jenis_pembayaran', 'placeholder' => 'Pilih Jenis Pembayaran...',],
                    'pluginOptions' => [
                        'allowClear' => false,
                    ],
                    'pluginEvents' => [
                        'change' => 'function(e) { 
                            
                        }',
                    ],
                ])->label($model->getAttributeLabel('jenis_pembayaran') . Html::tag('span', ' *',['style'=>'color:red']));
            ?>

            <?php
                echo $form->field($model, 'jenis_pasien', [
                    'template' => '{beginLabel}{labelTitle}{endLabel}<br>{input}{error}{hint}'
                ])->radioButtonGroup(Yii::$app->params['dataJenisPasien'], [
                    'id' => 'pb-jenis_pasien',
                    'class' => 'btn-group-md',
                    'itemOptions' => ['labelOptions' => ['class' => 'btn btn-default']]
                ])->label($model->getAttributeLabel('jenis_pasien') . Html::tag('span', ' *',['style'=>'color:red']));
            ?>

            <?= $form->field($model, 'faskes_rujukan')->textInput(['maxlength' => true])->label($model->getAttributeLabel('faskes_rujukan') . Html::tag('span', ' *',['style'=>'color:red'])); ?>

        </div>
    </div>    
    
    <div class="form-group" style="div-simpan">
        <?= Html::submitButton(Icon::show('bookmark') . ' Simpan', ['class' => 'btn btn-success', 'id' => 'btn-simpan']) ?>
        <span id="loading" style="display: none; padding-left:10px;">
            <img width="33px" style="margin-right:10px;" src="<?=\Yii::getAlias('@web')?>/img/loading.gif"/><i>Menyimpan...</i>
        </span>
        <span id="sukses" style="display: none; padding-left:10px; color: #00a65a">
            <i><li class="fa fa-check-square"></li> Data Berhasil disimpan...</i>
        </span>
    </div>

    <?php ActiveForm::end(); ?>

</div>

<?php 

$script = <<< JS
    $('body').on('submit', '#{$model->formName()}', function (e) {
        e.preventDefault();
        e.stopImmediatePropagation();
        let form = $(this);
        let formData = form.serialize();
        
        $.ajax({
            url: form.attr('action'),
            type: form.attr('method'),
            data: formData,
            beforeSend: function() {
                $('#btn-simpan').attr('disabled', 'disabled');
                $('#sukses').hide();
                $('#loading').show();
            },
            success: function (result) {
                if(result == 1)
                {
                    resetFormKunjungan();
                    $('#loading').hide();
                    $('#sukses').show();
                    $('#btn-simpan').removeAttr('disabled');
                    $.pjax.reload({container: '#grid-index'});

                    // $('#modal').modal('hide');
                }else{
                    // console.log(result);
                    
                    // $('.'+"{$model->formName()}".toLowerCase()+'-'+$('#modal').attr('data-id')).html(result);
                }
            },
            error: function (e) {
                alert(e);
            }
        });
        return false;
    });

    resetFormKunjungan = () => {
        $("#Kunjungan")[0].reset();
        $("#pb-id_poliklinik").trigger("change");
        $('.field-pb-jenis_pasien').removeClass('has-success');
        $('#pb-jenis_pasien').children().removeClass('active');
    }
    
JS;
$this->registerJs($script);