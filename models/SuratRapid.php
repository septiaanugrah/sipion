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
class SuratRapid extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'surat_rapid';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['nama', 'no_mr', 'tanggal_lahir', 'alamat', 'provinsi', 'kabupaten', 'kecamatan', 'kelurahan', 'id_dokter', 'jenis'], 'required'],
            [['tanggal', 'tahun', 'created_at', 'updated_at', 'nama', 'no_mr', 'tanggal_lahir', 'nik', 'alamat', 'hasil', 'provinsi', 'kabupaten', 'kecamatan', 'kelurahan', 'jenis'], 'safe'],
            [['created_by', 'updated_by', 'no_urut', 'id_dokter'], 'integer'],
            [['nomor_surat'], 'string', 'max' => 300],
            [['nama'], 'string', 'max' => 100],
            [['no_mr'], 'string', 'max' => 6],
            [['alamat'], 'string', 'max' => 300],
            [['nama', 'alamat'], 'filter', 'filter' => 'strtoupper'],
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
            'no_mr' => 'No Rekam Medis',
            'tanggal_lahir' => 'Tanggal Lahir',
            'nik' => 'NIK',
            'hasil' => 'Hasil',
            'jenis' => 'Jenis Pemeriksaan',
            'id_dokter' => 'Dokter Penanggung Jawab',
            'provinsi' => 'Provinsi',
            'kabupaten' => 'Kabupaten/Kota',
            'kecamatan' => 'Kecamatan',
            'kelurahan' => 'Kelurahan',
            'alamat' => 'Alamat',
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
        if(date('Y')==2020)
            $jumlahUrut = $jumlahUrut + 4851;
        $this->nomor_surat = '445/SK-PEM.RAPID/RSUD/'  . $bulanRomawi .  '/' . $this->tahun . '/' .  ($jumlahUrut + 1);
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

    public function getRelasiProvinsi()
    {
        return $this->hasOne(Provinsi::className(), ['id' => 'provinsi']);
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
