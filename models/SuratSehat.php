<?php

namespace app\models;

use Yii;
use yii\behaviors\BlameableBehavior;
use yii\behaviors\TimestampBehavior;

/**
 * This is the model class for table "surat_sehat".
 *
 * @property int $id
 * @property int $nomor_surat
 * @property string $tanggal
 * @property string $tahun
 * @property string $nama
 * @property string $jenis_kelamin
 * @property string $alamat
 * @property string $keterangan
 * @property int $created_by
 * @property int $created_at
 * @property int $updated_by
 * @property int $updated_at
 */
class SuratSehat extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'surat_sehat';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['nama', 'jenis_kelamin', 'alamat'], 'required'],
            [['tanggal', 'tahun', 'created_at', 'updated_at', 'keterangan', 'nama', 'jenis_kelamin', 'alamat'], 'safe'],
            [['created_by', 'updated_by', 'no_urut'], 'integer'],
            [['nomor_surat'], 'string', 'max' => 300],
            [['nama'], 'string', 'max' => 100],
            [['jenis_kelamin'], 'string', 'max' => 30],
            [['alamat'], 'string', 'max' => 300],
            [['keterangan'], 'string', 'max' => 500],
        ];
    }

    public function behaviors()
    {
        return [
            TimestampBehavior::className(),
            BlameableBehavior::className(),
        ];
    }
    
    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'Id',
            'no_urut' => 'Nomor Urut',
            'nomor_surat' => 'Nomor Surat',
            'tanggal' => 'Tanggal Surat',
            'tahun' => 'Tahun',
            'nama' => 'Nama Pemohon',
            'jenis_kelamin' => 'Jenis Kelamin',
            'alamat' => 'Alamat',
            'keterangan' => 'Keterangan',
            'created_by' => 'Dibuat oleh',
            'created_at' => 'Dibuat saat',
            'updated_by' => 'Diubah oleh',
            'updated_at' => 'Diubah saat',
        ];
    }

    public function beforeSave($insert)
    {
        if($insert){ 
            $this->setNoUrut();
            $this->created_at = date('Y-m-d H:i:s');
            $this->created_by = isset(\Yii::$app->user->identity->id) ? \Yii::$app->user->identity->id : 0; 
            $this->updated_at = date('Y-m-d H:i:s');
            $this->updated_by = isset(\Yii::$app->user->identity->id) ? \Yii::$app->user->identity->id : 0;
        }
        else{ 
            $this->updated_at = date('Y-m-d H:i:s');
            $this->updated_by = isset(\Yii::$app->user->identity->id) ? \Yii::$app->user->identity->id : 0;
        }   
        return true;
    }
    public function afterSave($insert, $changedAttributes)
    {
        
    }

    protected function setNoUrut()
    {
        $jumlahUrut = self::find()
            ->where(['year(tahun)' => date('Y')])
            ->count();
        if(date('Y')==2019)
            $jumlahUrut = $jumlahUrut + 1453;
        $this->nomor_surat = '445.1/RSPB/' . ($jumlahUrut + 1);
        $this->no_urut = $jumlahUrut + 1;
    }

    public function getRelasiPengguna()
    {
        return $this->hasOne(Pengguna::className(), ['id' => 'created_by'])->from(['pgn' => 'pengguna']);
    }

    public function getCreatedByNama()
    {
        return $this->relasiPengguna->nama;
    }

    public function getUpdatedByNama()
    {
        return $this->relasiPengguna->nama;
    }

}
