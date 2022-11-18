<?php 

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use yii\helpers\FileHelper;


class LaporanSuratKeputusan extends Model
{
    public $dateAwal;
    public $dateAkhir;
    public $formatLaporan;

    /**
     * @return array the validation rules.
     */
    public function rules()
    {
        return [
            [['dateAwal', 'dateAkhir'], 'safe'],
            // [['formatLaporan'], 'required', 'message' => '{attribute} harus dipilih.'],
        ];
    }

    public function attributeLabels()
    {
        return [
            'dateAwal' => 'Tanggal Awal',
            'dateAkhir' => 'Tanggal Akhir',
            // 'formatLaporan' => 'Format Laporan'
        ];
    }

    public function getDataLaporan()
    {
        $judulDokumen = 'Semua Data';
        // $poliklinik = null;

        $query = SuratKeputusan::find();
                // ->where(['processed' => 1]);

        //jika rentang tanggal dipilih
        if($this->dateAwal && $this->dateAkhir) {
            $awal = date('Y-m-d', strtotime($this->dateAwal));
            $akhir = date('Y-m-d', strtotime($this->dateAkhir));
            $query->andWhere([
                'between', 'date(tanggal)', $awal, $akhir
            ]);
            $judulDokumen = \Yii::$app->formatter->asDate($awal, 'php:d F Y') .' - '. \Yii::$app->formatter->asDate($akhir, 'php:d F Y');
        }
        
        // //jika poli dipilih spesifik
        // if($this->poli != 0) {
        //     $query->andWhere([
        //         'id_poliklinik' => $this->poli
        //     ]);
        //     $poliklinik = Poliklinik::findOne($this->poli)->nama;
        // }

        // $query->joinWith(['relasiPoliklinik', 'relasiPengguna']);
        
        $data = $query->all();

        return [
            'data' => $data,
            'judulDokumen' => $judulDokumen,
            // 'poliklinik' => $poliklinik
        ];
    }

    public static function getJumlahFileExcel()
    {
        $jExcel = count(FileHelper::findFiles(\Yii::$app->basePath . '\web\report'));

        if($jExcel!=0)
            return '<span class="pull-right-container"><small class="label pull-right label-info">' . $jExcel . '</small></span>';
        else 
            return '';
    }
}
