<?php

namespace app\models;

use Yii;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "poliklinik".
 *
 * @property int $id
 * @property string $nama
 */
class Poliklinik extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'poliklinik';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['nama'], 'required'],
            [['nama'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'nama' => 'Nama',
        ];
    }

    public static function dataPoliId()
    {
        $dataPoliId = self::find()->select(['id', 'nama'])->orderBy(['nama' => SORT_ASC])->asArray()->all();
        return ArrayHelper::map($dataPoliId, 'id', 'nama');
    }

    public static function dataPoliNama()
    {
        $dataPoliNama = self::find()->select(['id', 'nama'])->orderBy(['nama' => SORT_ASC])->asArray()->all();
        return ArrayHelper::map($dataPoliNama, 'nama', 'nama');
    }
}
