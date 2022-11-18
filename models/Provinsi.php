<?php

namespace app\models;

use Yii;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "provinsi".
 *
 * @property string $id
 * @property string $nama
 *
 * @property Kabupaten[] $kabupatens
 */
class Provinsi extends \yii\db\ActiveRecord
{

    public $pulau;
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'provinsi';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['nama'], 'required'],
            [['id'], 'string', 'max' => 2],
            [['nama'], 'string', 'max' => 255],
            ['nama', 'filter', 'filter'=>'strtoupper'],
            [['pulau'], 'integer'],
            [['id'], 'unique'],
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

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getKabupatens()
    {
        return $this->hasMany(Kabupaten::className(), ['provinsi_id' => 'id']);
    }

    public static function getProvinsi()
    {
        $dataProvinsi = self::find()->select(['id', 'nama'])->asArray()->all();
        return ArrayHelper::map($dataProvinsi, 'id', 'nama');
    }

    
    public function beforeSave($insert)
    {
        if($insert){ 
            $this->setId();
        }
        return true;
    }

    protected function setId()
    {
        $jumlahUrut = self::find()
            ->where(['LEFT(id, 1)' => $this->pulau])
            ->count();
        $this->id = $this->pulau . $jumlahUrut + 1;
    }

}
