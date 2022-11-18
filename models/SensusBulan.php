<?php 
/*
 * @Author: Dicky Ermawan S., S.T., MTA 
 * @Email: wanasaja@gmail.com 
 * @Linkedin: linkedin.com/in/dickyermawan 
 * @Date: 2018-11-16 23:15:02 
 * @Last Modified by: Dicky Ermawan S., S.T., MTA
 * @Last Modified time: 2019-01-05 13:04:53
 */

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use yii\helpers\FileHelper;


class SensusBulan extends Model
{
    public $bulanTahun;

    /**
     * @return array the validation rules.
     */
    public function rules()
    {
        return [
            [['bulanTahun'], 'required', 'message' => '{attribute} harus dipilih.'],
        ];
    }

    public function attributeLabels()
    {
        return [
            'bulanTahun' => 'Bulan & Tahun'
        ];
    }

    public function getDataSensus($bulan, $tahun)
    {
        $dataSensus = Yii::$app->getDb()->createCommand("
            SELECT
                DAY(create_date) as Tanggal,
                ifnull(sum(case when jenis_pembayaran = 'UMUM' AND jenis_pasien = 'Baru' then 1 else 0 end), 0) AS UMUM_B,
                ifnull(sum(case when jenis_pembayaran like 'JKD%' AND jenis_pasien = 'Baru' then 1 else 0 end), 0) AS JKD_B,
                ifnull(sum(case when jenis_pembayaran like 'BPJS%' AND jenis_pasien = 'Baru' then 1 else 0 end), 0) AS BPJS_B,
                
                ifnull(sum(case when id_poliklinik = 12 AND jenis_pasien = 'Baru' then 1 else 0 end), 0) AS Fisioterapi_B,
                ifnull(sum(case when id_poliklinik = 12 AND jenis_pasien = 'Lama' then 1 else 0 end), 0) AS Fisioterapi_L,
                
                ifnull(sum(case when id_poliklinik = 4 AND jenis_pasien = 'Baru' then 1 else 0 end), 0) AS Gigi_B,
                ifnull(sum(case when id_poliklinik = 4 AND jenis_pasien = 'Lama' then 1 else 0 end), 0) AS Gigi_L,
                
                ifnull(sum(case when id_poliklinik = 1 AND jenis_pasien = 'Baru' then 1 else 0 end), 0) AS Anak1_B,
                ifnull(sum(case when id_poliklinik = 1 AND jenis_pasien = 'Lama' then 1 else 0 end), 0) AS Anak1_L,
                
                ifnull(sum(case when id_poliklinik = 16 AND jenis_pasien = 'Baru' then 1 else 0 end), 0) AS Anak2_B,
                ifnull(sum(case when id_poliklinik = 16 AND jenis_pasien = 'Lama' then 1 else 0 end), 0) AS Anak2_L,
                
                ifnull(sum(case when id_poliklinik = 8 AND jenis_pasien = 'Baru' then 1 else 0 end), 0) AS PD_B,
                ifnull(sum(case when id_poliklinik = 8 AND jenis_pasien = 'Lama' then 1 else 0 end), 0) AS PD_L,
                        
                ifnull(sum(case when id_poliklinik = 5 AND jenis_pasien = 'Baru' then 1 else 0 end), 0) AS KB_B,
                ifnull(sum(case when id_poliklinik = 5 AND jenis_pasien = 'Lama' then 1 else 0 end), 0) AS KB_L,
                        
                ifnull(sum(case when id_poliklinik = 2 AND jenis_pasien = 'Baru' then 1 else 0 end), 0) AS Bedah_B,
                ifnull(sum(case when id_poliklinik = 2 AND jenis_pasien = 'Lama' then 1 else 0 end), 0) AS Bedah_L,
                        
                ifnull(sum(case when id_poliklinik = 11 AND jenis_pasien = 'Baru' then 1 else 0 end), 0) AS DOTS_B,
                ifnull(sum(case when id_poliklinik = 11 AND jenis_pasien = 'Lama' then 1 else 0 end), 0) AS DOTS_L,
                        
                ifnull(sum(case when id_poliklinik = 6 AND jenis_pasien = 'Baru' then 1 else 0 end), 0) AS Mata_B,
                ifnull(sum(case when id_poliklinik = 6 AND jenis_pasien = 'Lama' then 1 else 0 end), 0) AS Mata_L,
                        
                ifnull(sum(case when id_poliklinik = 10 AND jenis_pasien = 'Baru' then 1 else 0 end), 0) AS THT_B,
                ifnull(sum(case when id_poliklinik = 10 AND jenis_pasien = 'Lama' then 1 else 0 end), 0) AS THT_L,
                        
                ifnull(sum(case when id_poliklinik = 7 AND jenis_pasien = 'Baru' then 1 else 0 end), 0) AS Paru_B,
                ifnull(sum(case when id_poliklinik = 7 AND jenis_pasien = 'Lama' then 1 else 0 end), 0) AS Paru_L,
                        
                ifnull(sum(case when id_poliklinik = 9 AND jenis_pasien = 'Baru' then 1 else 0 end), 0) AS Saraf1_B,
                ifnull(sum(case when id_poliklinik = 9 AND jenis_pasien = 'Lama' then 1 else 0 end), 0) AS Saraf1_L,

                ifnull(sum(case when id_poliklinik = 17 AND jenis_pasien = 'Baru' then 1 else 0 end), 0) AS Saraf2_B,
                ifnull(sum(case when id_poliklinik = 17 AND jenis_pasien = 'Lama' then 1 else 0 end), 0) AS Saraf2_L,
                        
                ifnull(sum(case when id_poliklinik = 15 AND jenis_pasien = 'Baru' then 1 else 0 end), 0) AS Psikolog_B,
                ifnull(sum(case when id_poliklinik = 15 AND jenis_pasien = 'Lama' then 1 else 0 end), 0) AS Psikolog_L,
                        
                ifnull(sum(case when id_poliklinik = 3 AND jenis_pasien = 'Baru' then 1 else 0 end), 0) AS Kulit_Kelamin_B,
                ifnull(sum(case when id_poliklinik = 3 AND jenis_pasien = 'Lama' then 1 else 0 end), 0) AS Kulit_Kelamin_L,
               
                ifnull(sum(case when id_poliklinik = 18 AND jenis_pasien = 'Baru' then 1 else 0 end), 0) AS Gizi_B,
                ifnull(sum(case when id_poliklinik = 18 AND jenis_pasien = 'Lama' then 1 else 0 end), 0) AS Gizi_L
                    
            FROM `kunjungan`
            WHERE
                year(create_date) = :tahun AND month(create_date) = :bulan
            GROUP BY date(create_date) WITH ROLLUP;
            ")
        ->bindValues([
            ':tahun' => $tahun,
            ':bulan' => $bulan,
        ])
        ->queryAll();
        
        return $dataSensus;        
    }

}
