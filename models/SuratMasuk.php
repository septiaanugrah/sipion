<?php

namespace app\models;

use Yii;
use yii\behaviors\BlameableBehavior;
use yii\behaviors\TimestampBehavior;
use yii\web\UploadedFile;

/**
 * This is the model class for table "surat_masuk".
 *
 * @property int $id
 * @property string $tanggal
 * @property string $alamat_pengirim
* @property string $perihal
 * @property string $kode_surat
 * @property string $disposisi
 * @property int $created_at
 * @property int $updated_at
 * @property int $created_by
 * @property int $updated_by
 */
class SuratMasuk extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'surat_masuk';
    }

    public $file;
    public $disposisiSatu;
    public $disposisiDua;

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['kode_surat', 'alamat_pengirim', 'perihal', 'file' ], 'required'],
            [['kode_surat', 'tanggal', 'updated_at', 'created_at', 'alamat_pengirim', 'perihal', 'disposisi_1', 'disposisi_2', 'disposisi_lainnya', 'catatan_disposisi1', 'catatan_disposisi2', 'diteruskan', 'catatan_disposisi_lainnya' ], 'safe'],
            [['created_by', 'updated_by', 'no_urut'], 'integer'],
            [['alamat_pengirim', 'keterangan'], 'string', 'max' => 300],
            [['perihal', 'diteruskan'], 'string', 'max' => 500],
            [['kode_surat'], 'string', 'max' => 1000],
            [['status'], 'string', 'max' => 30],
            [['disposisi_1', 'disposisi_2'], 'string', 'max' => 50],
            [['disposisi_lainnya'], 'string', 'max' => 500],
            [['catatan_disposisi1', 'catatan_disposisi2', 'catatan_disposisi_lainnya'], 'string', 'max' => 800],
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
            'tanggal' => 'Tanggal Surat',
            'alamat_pengirim' => 'Tahun',
            'perihal' => 'Pengarang',
            'kode_surat' => 'Nama Buku',
            'disposisi_1' => 'Disposisi 1',
            'disposisi_2' => 'Disposisi 2',
            'disposisi_lainnya' => 'Disposisi Lainnya',
            'catatan_disposisi1' => 'Catatan Disposisi 1',
            'catatan_disposisi2' => 'Catatan Disposisi 2',
            'catatan_disposisi_lainnya' => 'Catatan Disposisi Lainnya',
            'keterangan' => 'Keterangan',
            'diteruskan' => 'Diteruskan Ke',
            'status' => 'Status Surat',
            'created_at' => 'Dibuat saat',
            'updated_at' => 'Diubah saat',
            'created_by' => 'Dibuat oleh',
            'updated_by' => 'Diubah oleh',
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
                if($this->perihal==""){
                    $this->ketersediaan=1;
                }
                else{
                    $this->ketersediaan=2;
                }

                if($this->disposisi_1==NULL && $this->disposisi_2==NULL)
                {
                    $this->disposisi_1=0;
                    $this->disposisi_2=0;
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

                if($this->disposisi_1==NULL && $this->disposisi_2==NULL)
                {
                    $this->disposisi_1=0;
                    $this->disposisi_2=0;
                }
        }
        return true;
    }
    public function afterSave($insert, $changedAttributes)
    { }

    protected function setNoUrut()
    {
        $jumlahUrut = self::find()
            ->where(['year(created_at)' => date('Y')])
            ->count();
        if(date('Y') == 2019)
        $jumlahUrut = $jumlahUrut + 739;
        $this->no_urut = $jumlahUrut + 1;
        // $this->nomor_surat = $this->kode_surat . '/RSUD-PB/' . ($jumlahUrut + 1);
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

    // public function getDisposisiSatu()
    // {
    //     print_r($this->relasiDisposisi1());
    //     // return $this->getRelasiDisposisi1->jabatan;
    // }

    public function getDisposisi1() 
    {
        return $this->relasiDisposisi1->jabatan;
    }

    
    public function getRelasiDisposisi1()
    {
        return $this->hasOne(Jabatan::className(), ['id' => 'disposisi_1'])
                    ->from(Jabatan::tableName() . ' j1');
    }

    public function getDisposisi2() 
    {
        return $this->relasiDisposisi2->jabatan;
    }

    
    public function getRelasiDisposisi2()
    {
        return $this->hasOne(Jabatan::className(), ['id' => 'disposisi_2'])
                    ->from(Jabatan::tableName() . ' j2');
    }

    // public function getDisposisi2() 
    // {
    //     return $this->relasiDisposisi2->jabatan;
    // }

    
    // public function getRelasiDisposisi2()
    // {
    //     return $this->hasOne(Jabatan::className(), ['id' => 'disposisi_2'])
    //                 ->from(Jabatan::tableName() . ' j2');
    // }

    // public function getRelasiSifat()
    // {
    //     return $this->hasOne(SifatSurat::className(), ['id' => 'jenis_surat']);
    // }
    // public function getsifat()
    // {
    //     return $this->relasiSifat->sifat;
    // }

}
