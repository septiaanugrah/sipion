<?php

namespace app\models;

use Yii;
use yii\behaviors\BlameableBehavior;
use yii\behaviors\TimestampBehavior;
use yii\web\UploadedFile;
use Romans\Filter\IntToRoman;


/**
 * This is the model class for table "surat_keputusan".
 *
 * @property int $id
 * @property string $tanggal
 * @property int $kode_surat
 * @property int $nomor_surat
 * @property string $tanggal
 * @property int $tahun
 * @property string $perihal
 * @property int $created_by
 * @property int $created_at
 * @property int $updated_by
 * @property int $updated_at
 */
class NotaKesepahaman extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'nota_kesepahaman';
    }

    public $file;

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [[], 'required'],
            [['kode_surat', 'nomor_surat', 'tanggal', 'tahun', 'created_at', 'updated_at', 'perihal'], 'safe'],
            [['created_by', 'updated_by', 'ketersediaan', 'no_urut'], 'integer'],
            [['perihal'], 'string', 'max' => 500],
            [['kode_surat', 'nomor_surat'], 'string', 'max' => 300],
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
            'perihal' => 'Perihal',
            'ketersediaan' => 'Ketersediaan',
            'kode_surat' => 'Kode Surat',
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
        
            if ($this->tanggal== '1970-01-01') {   
                $this->tanggal = date('Y-m-d');
            }
                if($this->perihal==""){
                    $this->ketersediaan=1;
                }
                else{
                    $this->ketersediaan=2;
                }
        } else{
            $this->updated_at = date('Y-m-d H:i:s');
            $this->updated_by = isset(\Yii::$app->user->identity->id) ? \Yii::$app->user->identity->id : 0;
                if($this->perihal==""){
                    $this->ketersediaan=1;
                }
                else{
                    $this->ketersediaan=2;
                }

            

            // $month = date('m', strtotime($this->tanggal));
            // $year = date('Y', strtotime($this->tanggal));

            // $filter = new IntToRoman();
            // $bulanRomawi = $filter->filter($month); 

            // $this->nomor_surat = $this->nomor_surat . $bulanRomawi . '/' .$year;
            
            // $garing = strpos("$this->nomor_surat","/");
            // if($garing == 3) {
            //     $nomor = substr("$this->nomor_surat", 3);  
            // }
            // else if ($garing == 4) {
            //     $nomor = substr("$this->nomor_surat", 4);  
            // }
            // else {
            //     $nomor = substr("$this->nomor_surat", 5);  
            // }

            // $this->nomor_surat = $this->kode_surat . $nomor;
        }
        return true;
    }
    public function afterSave($insert, $changedAttributes)
    { }

    protected function setNoUrut()
    {
        if($this->tanggal=="1970-01-01")
        {
            $month = date('m');
            $year = date('Y');
        }
        else{
            $month = date('m', strtotime($this->tanggal));
            $year = date('Y', strtotime($this->tanggal));
        }
        
        // $month = date_parse_from_format('m' , $this->tanggal);
        $filter = new IntToRoman();
        $bulanRomawi = $filter->filter($month); // MCMXCIX
        $jumlahUrut = self::find()
            ->where(['year(tahun)' => date('Y')])
            ->count();

        if(date('Y')==2020)
            $jumlahUrut = $jumlahUrut + 5;
        $this->nomor_surat = '445/RSUD-PB/MOU/' .$bulanRomawi . '/' .$year. ' / ' .($jumlahUrut + 1);
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
