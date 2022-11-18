<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "jabatan".
 *
 * @property int $id
 * @property string $jabatan
 */
class Jabatan extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'jabatan';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['jabatan'], 'required'],
            [['jabatan'], 'string', 'max' => 500],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'jabatan' => 'Jabatan',
        ];
    }

    public static function dataJabatanId()
    {
        $data_jabatan = self::find()->asArray()->all();
        return array_combine(
            array_map(
                function ($value) {
                    return $value['id'];
                },
                $data_jabatan
            ),
            array_map(
                function ($value) {
                    return $value['jabatan'];
                },
                $data_jabatan
            )
        );
    }

    public static function dataJabatanNama()
    {
        $data_jabatan = self::find()->asArray()->all();
        return array_combine(
            array_map(
                function ($value) {
                    return $value['jabatan'];
                },
                $data_jabatan
            ),
            array_map(
                function ($value) {
                    return $value['jabatan'];
                },
                $data_jabatan
            )
        );
    }
}
