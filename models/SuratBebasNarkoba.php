<?php

namespace app\models;

use Yii;
use yii\behaviors\BlameableBehavior;
use yii\behaviors\TimestampBehavior;
use Romans\Filter\IntToRoman;

/**
 * This is the model class for table "surat_bebas_narkoba".
 *
 * @property int $id
 * @property string $nomor_surat
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
class SuratBebasNarkoba extends \yii\db\ActiveRecord
{
    public $pilihSemua;
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'surat_bebas_narkoba';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['nama', 'jenis_kelamin', 'tempat_lahir', 'tanggal_lahir', 'pekerjaan', 'alamat', 'rt', 'rw', 'kabupaten', 'amphetamin', 'opiate', 'canabinoid', 'keterangan', 'id_dokter'], 'required'],
            [['tanggal', 'tahun', 'created_at', 'updated_at', 'keterangan', 'nama', 'jenis_kelamin', 'alamat', 'rt', 'rw',], 'safe'],
            [['created_by', 'updated_by', 'no_urut', 'kelurahan', 'kecamatan', 'id_dokter'], 'integer'],
            [['nomor_surat', 'tempat_lahir', 'pekerjaan', 'amphetamin', 'opiate', 'canabinoid'], 'string', 'max' => 300],
            [['nama'], 'string', 'max' => 100],
            [['jenis_kelamin'], 'string', 'max' => 10],
            [['alamat'], 'string', 'max' => 300],
            [['keterangan'], 'string', 'max' => 500],
            [['nama', 'tempat_lahir', 'pekerjaan', 'alamat', 'keterangan'], 'filter', 'filter' => 'strtoupper'],
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
            'tempat_lahir' => 'Tempat Lahir',
            'tanggal_lahir' => 'Tanggal Lahir',
            'pekerjaan' => 'Pekerjaan',
            'alamat' => 'Alamat',
            'rt' => 'RT',
            'rw' => 'RW',
            'kelurahan' => 'Kelurahan',
            'kecamatan' => 'Kecamatan',
            'kabupaten' => 'Kabupaten/Kota',
            'amphetamin' => 'Amphethamin',
            'opiate' => 'Opiate/Mor',
            'canabinoid' => 'Canabinoid/THC',
            'keterangan' => 'Dipergunakan untuk',
            'id_dokter' => 'Dokter Penanggung Jawab',
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
        $month = date('m');
        $filter = new IntToRoman();
        $bulanRomawi = $filter->filter($month); // MCMXCIX
        $jumlahUrut = self::find()
            ->where(['year(tahun)' => date('Y')])
            ->count();
        if(date('Y')==2019)
            $jumlahUrut = $jumlahUrut + 789;
        $this->nomor_surat = '445/SK-PEM.URINE/RSUD/'  . $bulanRomawi .  '/' . $this->tahun . '/' .  ($jumlahUrut + 1);
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

    public function getRelasiKabupaten()
    {
        return $this->hasOne(Kabupaten::className(), ['id' => 'kabupaten']);
    }

    public function getRelasiKecamatan()
    {
        return $this->hasOne(Kecamatan::className(), ['id' => 'kecamatan']);
    }
    
    public function getRelasiKelurahan()
    {
        return $this->hasOne(Kelurahan::className(), ['id' => 'kelurahan']);
    }

    public function getRelasiDokter()
    {
        return $this->hasOne(Dokter::className(), ['id' => 'id_dokter']);
    }

}
