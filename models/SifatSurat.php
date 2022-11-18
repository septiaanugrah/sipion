<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "sifat_surat".
 *
 * @property int $id
 * @property string $sifat
 */
class SifatSurat extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'sifat_surat';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['sifat'], 'required'],
            [['sifat'], 'string', 'max' => 50],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'sifat' => 'Sifat',
        ];
    }

    public static function dataSifatId()
    {
        $data_sifat = self::find()->orderBy(['sifat' => SORT_ASC])->asArray()->all();
        return array_combine(
            array_map(
                function ($value) {
                    return $value['id'];
                },
                $data_sifat
            ),
            array_map(
                function ($value) {
                    return $value['sifat'];
                },
                $data_sifat
            )
        );
    }

    public static function dataSifatNama()
    {
        $data_sifat = self::find()->orderBy(['sifat' => SORT_ASC])->asArray()->all();
        return array_combine(
            array_map(
                function ($value) {
                    return $value['sifat'];
                },
                $data_sifat
            ),
            array_map(
                function ($value) {
                    return $value['sifat'];
                },
                $data_sifat
            )
        );
    }
}
