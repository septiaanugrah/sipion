<?php

namespace app\models;

use Yii;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "kelurahan".
 *
 * @property string $id
 * @property string $kecamatan_id
 * @property string $nama
 *
 * @property Kelurahan $kecamatan
 */
class Kelurahan extends \yii\db\ActiveRecord
{
    
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'kelurahan';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'kecamatan_id', 'nama'], 'required'],
            [['id'], 'string', 'max' => 10],
            [['kecamatan_id'], 'string', 'max' => 7],
            [['nama'], 'string', 'max' => 255],
            [['id'], 'unique'],
            [['kecamatan_id'], 'exist', 'skipOnError' => true, 'targetClass' => Kecamatan::className(), 'targetAttribute' => ['kecamatan_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'kecamatan_id' => 'Kecamatan ID',
            'nama' => 'Nama',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getKecamatan()
    {
        return $this->hasOne(Kecamatan::className(), ['id' => 'kecamatan_id']);
    }

    public static function getKelurahan($id)
    {
        $dataKelurahan = self::find()->select(['id', 'nama'])->where(['kecamatan_id' => $id])->asArray()->all();
        return ArrayHelper::map($dataKelurahan, 'id', 'nama');
    }
}
