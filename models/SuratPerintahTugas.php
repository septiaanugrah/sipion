<?php

namespace app\models;

use Yii;
use yii\behaviors\BlameableBehavior;
use yii\behaviors\TimestampBehavior;
use yii\web\UploadedFile;

/**
 * This is the model class for table "surat_perintah_tugas".
 *
 * @property int $id
 * @property string $kode_surat
 * @property string $nomor_surat
 * @property string $tanggal
 * @property string $tahun
 * @property string $memerintahkan
 * @property string $perintah
 * @property int $updated_by
 * @property string $updated_at
 * @property string $created_at
 * @property int $created_by
 */
class SuratPerintahTugas extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'surat_perintah_tugas';
    }

    public $file;

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [[], 'required'],
            [['tanggal', 'tahun', 'updated_at', 'created_at'], 'safe'],
            [['updated_by', 'created_by', 'no_urut'], 'integer'],
            [['kode_surat', 'nomor_surat'], 'string', 'max' => 300],
            [['memerintahkan'], 'string', 'max' => 500],
            [['perintah'], 'string', 'max' => 1200],
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
            'tanggal' => 'Tanggal',
            'tahun' => 'Tahun',
            'memerintahkan' => 'Memerintahkan',
            'perintah' => 'Perintah',
            'updated_by' => 'Updated By',
            'updated_at' => 'Updated At',
            'created_at' => 'Created At',
            'created_by' => 'Created By',
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
            
            if ($this->tanggal== '1970-01-01') {   
                $this->tanggal = date('Y-m-d');
            }

                if($this->perintah==""){
                    $this->ketersediaan=1;
                }
                else{
                    $this->ketersediaan=2;
                }
        } else{ 
            $this->updated_at = date('Y-m-d H:i:s');
            $this->updated_by = isset(\Yii::$app->user->identity->id) ? \Yii::$app->user->identity->id : 0;
                if($this->perintah==""){
                    $this->ketersediaan=1;
                }
                else{
                    $this->ketersediaan=2;
                }

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
    { }

    protected function setNoUrut()
    {
        $jumlahUrut = self::find()
            ->where(['year(tahun)' => date('Y')])
            ->count();
        if(date('Y')==2020)
            $jumlahUrut = $jumlahUrut + 82;
        $this->nomor_surat = $this->kode_surat . '/RSUD-PB/' . ($jumlahUrut + 1);
        $this->no_urut = $jumlahUrut + 1;
    }

}
