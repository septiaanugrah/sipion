<?php

namespace app\models;

use Yii;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "kecamatan".
 *
 * @property string $id
 * @property string $kabupaten_id
 * @property string $nama
 *
 * @property Kabupaten $kabupaten
 * @property Kelurahan[] $kelurahans
 */
class Kecamatan extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'kecamatan';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'kabupaten_id', 'nama'], 'required'],
            [['id'], 'string', 'max' => 7],
            [['kabupaten_id'], 'string', 'max' => 4],
            [['nama'], 'string', 'max' => 255],
            [['id'], 'unique'],
            [['kabupaten_id'], 'exist', 'skipOnError' => true, 'targetClass' => Kabupaten::className(), 'targetAttribute' => ['kabupaten_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'kabupaten_id' => 'Kabupaten ID',
            'nama' => 'Nama',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getKabupaten()
    {
        return $this->hasOne(Kabupaten::className(), ['id' => 'kabupaten_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getKelurahan()
    {
        return $this->hasMany(Kelurahan::className(), ['kecamatan_id' => 'id']);
    }

    public static function getKecamatan($id)
    {
        $dataKecamatan = self::find()->select(['id', 'nama'])->where(['kabupaten_id' => $id])->asArray()->all();
        return ArrayHelper::map($dataKecamatan, 'id', 'nama');
    }

    public static function getKecamatanOnly()
    {
        $dataKecamatan = self::find()->select(['id', 'nama'])->asArray()->all();
        return ArrayHelper::map($dataKecamatan, 'id', 'nama');
    }
}
