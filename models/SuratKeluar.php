<?php

namespace app\models;

use Yii;
use yii\behaviors\BlameableBehavior;
use yii\behaviors\TimestampBehavior;
use yii\web\UploadedFile;

/**
 * This is the model class for table "surat_keluar".
 *
 * @property int $id
 * @property int $kode_surat
 * @property int $nomor_surat
 * @property string $tanggal
 * @property int $tahun
 * @property string $alamat_tujuan
 * @property string $perihal
 * @property int $updated_by
 * @property int $updated_at
 * @property int $created_at
 * @property int $created_by
 */
class SuratKeluar extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'surat_keluar';
    }

    public $file;

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [[], 'required'],
            [['kode_surat', 'tanggal', 'tahun', 'nomor_surat', 'updated_at', 'created_at', 'alamat_tujuan', 'perihal'], 'safe'],
            [['updated_by', 'created_by', 'ketersediaan', 'no_urut'], 'integer'],
            [['alamat_tujuan', 'kode_surat', 'nomor_surat'], 'string', 'max' => 300],
            [['perihal'], 'string', 'max' => 500],
            [['file'], 'file', 'extensions' => 'pdf'], 
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
            'kode_surat' => 'Kode Surat',
            'nomor_surat' => 'Nomor Surat',
            'tanggal' => 'Tanggal Surat',
            'tahun' => 'Tahun',
            'alamat_tujuan' => 'Tujuan',
            'perihal' => 'Perihal',
            'ketersediaan' => 'Ketersediaan',
            'updated_by' => 'Diubah oleh',
            'updated_at' => 'Diubah saat',
            'created_at' => 'Dibuat saat',
            'created_by' => 'Dibuat saat',
        ];
    }

    public function beforeSave($insert)
    {
        if($insert){ 
            $this->setNoUrut();
            // $this->tanggal = date('Y-m-d');
            $this->created_at = date('Y-m-d H:i:s');
            $this->created_by = isset(\Yii::$app->user->identity->id) ? \Yii::$app->user->identity->id : 0; 
            $this->updated_at = date('Y-m-d H:i:s');
            $this->updated_by = isset(\Yii::$app->user->identity->id) ? \Yii::$app->user->identity->id : 0;
            if ($this->tanggal== '1970-01-01') {   
                $this->tanggal = date('Y-m-d');
            }

            if($this->alamat_tujuan=="" && $this->perihal==""){
                $this->ketersediaan=1;
            }
            else{
                $this->ketersediaan=2;
            }
        }
        else{ 
            if($this->alamat_tujuan=="" && $this->perihal==""){
                $this->ketersediaan=1;
            }
            else{
                $this->ketersediaan=2;
            }
            $this->updated_at = date('Y-m-d H:i:s');
            $this->updated_by = isset(\Yii::$app->user->identity->id) ? \Yii::$app->user->identity->id : 0;

            $garing = strpos("$this->nomor_surat","/");
                if($garing == 0) {
                    $nomor = substr("$this->nomor_surat", 0);  
                }
                else if($garing == 3) {
                    $nomor = substr("$this->nomor_surat", 3);  
                }
                else if ($garing == 4) {
                    $nomor = substr("$this->nomor_surat", 4);  
                }
                else {
                    $nomor = substr("$this->nomor_surat", 5);  
                }

            $this->nomor_surat = $this->kode_surat . $nomor;
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

        if(date('Y')==2020)
            $jumlahUrut = $jumlahUrut + 600;
        $this->nomor_surat = $this->kode_surat . '/RSUD-PB/' . ($jumlahUrut + 1);
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

    // public function getRelasiSifat()
    // {
    //     return $this->hasOne(SifatSurat::className(), ['id' => 'jenis_surat']);
    // }
    // public function getsifat() 
    // {
    //     return $this->relasiSifat->sifat;
    // }


}
