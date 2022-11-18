<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "kode_surat".
 *
 * @property int $id
 * @property string $kode
 * @property string $keperluan
 */
class KodeSurat extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'kode_surat';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['kode', 'keperluan'], 'required'],
            [['kode'], 'string', 'max' => 10],
            [['keperluan'], 'string', 'max' => 500],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'kode' => 'Kode',
            'keperluan' => 'Keperluan',
        ];
    }

    public static function dataKodeId()
    {
        $data_kode = self::find()->asArray()->all();
        return array_combine(
            array_map(
                function ($value) {
                    return $value['id'];
                },
                $data_kode
            ),
            array_map(
                function ($value) {
                    return $value['kode'];
                },
                $data_kode
            )
        );
    }

    public static function dataKodeNama()
    {
        $data_kode = self::find()->asArray()->all();
        return array_combine(
            array_map(
                function ($value) {
                    return $value['kode'];
                },
                $data_kode
            ),
            array_map(
                function ($value) {
                    return $value['kode'] .' ('. $value['keperluan'] .')';
                },
                $data_kode
            )
        );
    }
}
