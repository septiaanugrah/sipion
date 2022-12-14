<?php
/*
 * @Author: Dicky Ermawan S., S.T., MTA 
 * @Email: wanasaja@gmail.com 
 * @Linkedin: linkedin.com/in/dickyermawan 
 * @Date: 2018-11-18 13:31:15 
 * @Last Modified by: Dicky Ermawan S., S.T., MTA
 * @Last Modified time: 2019-01-06 18:06:46
 */


namespace app\controllers;

use Yii;

use yii\helpers\ArrayHelper;
use yii\helpers\FileHelper;
use app\models\Kunjungan;
use app\models\SuratMasuk;
use app\models\LaporanSuratMasuk;
use app\models\SensusBulan;
use app\models\User;
use yii\db\Query;
use yii\helpers\Url;
use kartik\mpdf\Pdf;

use PhpOffice\PhpSpreadsheet\IOFactory;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use app\components\AccessRule;
use yii\filters\AccessControl;
use yii\filters\VerbFilter;
use app\models\Poliklinik;
use app\models\Grafik;




class LaporanSuratMasukController extends \yii\web\Controller
{
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                // We will override the default rule config with the new AccessRule class
                'ruleConfig' => [
                    'class' => AccessRule::className(),
                ],
                'only' => [
                    // super_admin, admin
                    'index',
                    'download',
                    'download-lap',
                    // super_admin
                    'file',
                    'hapus-excel',
                    'hapus-excel-all',
                ],
                'rules' => [
                    [
                        'actions' => ['index', 'download', 'download-lap'],
                        'allow' => true,
                        'roles' => [
                            User::ROLE_ADMIN,
                            User::ROLE_SUPERADMIN,
                        ],
                    ],
                    [
                        'actions' => [
                            'file',
                            'hapus-file',
                            'hapus-file-all',
                        ],
                        'allow' => true,
                        'roles' => [
                            User::ROLE_SUPERADMIN,
                        ],
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'download' => ['POST'],
                ],
            ],
        ];
    }

    public function actionIndex()
    {

        //inisialisasi utk develop saja
        $model = new LaporanSuratMasuk;
        // $model->poli = 0;
        // $model->formatLaporan = 'pdf';
        // $model->dateAwal = '11-11-2018';
        // $model->dateAkhir = '11-20-2018';
        //inisialisasi utk develop saja

        return $this->render('index', [
            'model' => $model
        ]);
    }

    public function actionDownload()
    {
        $model = new LaporanSuratMasuk;
        if($model->load(Yii::$app->request->post()))
        {
            $data = $model->getDataLaporan();
           

                $fileName = 'Laporan Surat Masuk SIRARA (' . $data['judulDokumen'] . ')';

                // // Create new Spreadsheet object
                $spreadsheet = new Spreadsheet();

                // Set document properties
                $spreadsheet->getProperties()->setCreator('SIRARA - RSUD Petala Bumi')
                    ->setLastModifiedBy('SIRARA - RSUD Petala Bumi')
                    ->setTitle('Laporan Excel SIRARA')
                    ->setSubject('Laporan Excel SIRARA')
                    ->setDescription('Laporan dicetak dari SIRARA RSUD Petala Bumi')
                    ->setKeywords('office 2007 openxml php')
                    ->setCategory('EDP RSUD Petala Bumi');

                $styleJudul = [
                    'font' => [
                        'size' => 13,
                        'bold' => true,
                    ],
                    'alignment' => [
                        'horizontal' => \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER,
                    ],
                ];

                $spreadsheet->getActiveSheet()->mergeCells('A1:J1')
                    ->setCellValue('A1', 'LAPORAN SURAT MASUK')
                    ->getStyle('A1')
                    ->applyFromArray($styleJudul);

                $spreadsheet->getActiveSheet()->mergeCells('A2:J2')
                    ->setCellValue('A2', $data['judulDokumen'] )
                    ->getStyle('A2')
                    ->applyFromArray($styleJudul);


                // Add some data
                $baseHeader = 4;
                $spreadsheet->setActiveSheetIndex(0)
                    ->setCellValue('A'. $baseHeader, 'No.')
                    ->setCellValue('B'. $baseHeader, 'Tanggal Surat')
                    ->setCellValue('C'. $baseHeader, 'Nomor Surat')
                    ->setCellValue('D'. $baseHeader, 'Alamat Pengirim')
                    ->setCellValue('E'. $baseHeader, 'Perihal')
                    ->setCellValue('F'. $baseHeader, 'Disposisi 1')
                    ->setCellValue('G'. $baseHeader, 'Disposisi 2')
                    ->setCellValue('H'. $baseHeader, 'Disposisi Lainnya')
                    ->setCellValue('I'. $baseHeader, 'Keterangan')
                    ->setCellValue('J'. $baseHeader, 'Status')

                ;

                $styleArray = [
                    'font' => [
                        // 'bold' => true,
                    ],
                    'borders' => [
                        'allBorders' => [
                            'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN,
                            'color' => ['argb' => '000000'],
                        ],
                    ],
                    'fill' => [
                        // 'fillType' => \PhpOffice\PhpSpreadsheet\Style\Fill::FILL_GRADIENT_LINEAR,
                        // 'rotation' => 90,
                        // 'startColor' => [
                        //     'argb' => 'FFA0A0A0',
                        // ],
                        // 'endColor' => [
                        //     'argb' => 'FFFFFFFF',
                        // ],
                    ],
                ];
                
                $no = 1;
                $baseRow = $baseHeader + 1;
                foreach ($data['data'] as $d) {

                    $spreadsheet->setActiveSheetIndex(0)
                        ->setCellValue('A' . $baseRow, $no)
                        ->setCellValue('B' . $baseRow, Yii::$app->formatter->asDate($d->tanggal, 'php:l, d F Y'))
                        ->setCellValue('C' . $baseRow, $d->kode_surat)
                        ->setCellValue('D' . $baseRow, $d->alamat_pengirim)
                        ->setCellValue('E' . $baseRow, $d->perihal)
                        ->setCellValue('F' . $baseRow, $d->disposisi1)
                        ->setCellValue('G' . $baseRow, $d->disposisi2)
                        ->setCellValue('H' . $baseRow, $d->disposisi_lainnya)
                        ->setCellValue('I' . $baseRow, $d->keterangan)
                        ->setCellValue('J' . $baseRow, $d->status);
                    $no++;
                    $baseRow++;
                }

                //style untuk judul tabel
                $spreadsheet->getActiveSheet()->getStyle('A4:J4')
                    ->applyFromArray($styleArray)
                    ->getFont()
                    ->setSize(12)
                    ->setBold(true);

                //style untuk isi tabel
                $spreadsheet->getActiveSheet()->getStyle('A5:J'. ($baseRow-1))
                    ->applyFromArray($styleArray);

                //setting lebar kolom
                $spreadsheet->getActiveSheet()->getColumnDimension('B')->setWidth(24);
                $spreadsheet->getActiveSheet()->getColumnDimension('C')->setWidth(24);
                $spreadsheet->getActiveSheet()->getColumnDimension('D')->setWidth(30)->setAutoSize(true);
                $spreadsheet->getActiveSheet()->getColumnDimension('E')->setWidth(30)->setAutoSize(true);
                $spreadsheet->getActiveSheet()->getColumnDimension('F')->setWidth(30)->setAutoSize(true);
                $spreadsheet->getActiveSheet()->getColumnDimension('G')->setWidth(30)->setAutoSize(true);
                $spreadsheet->getActiveSheet()->getColumnDimension('H')->setWidth(30)->setAutoSize(true);
                $spreadsheet->getActiveSheet()->getColumnDimension('I')->setWidth(30)->setAutoSize(true);
                $spreadsheet->getActiveSheet()->getColumnDimension('J')->setWidth(30)->setAutoSize(true);

                // Rename worksheet
                $spreadsheet->getActiveSheet()->setTitle('SIRARA');

                // Set active sheet index to the first sheet, so Excel opens this as the first sheet
                $spreadsheet->setActiveSheetIndex(0);

                // Redirect output to a client???s web browser (Xlsx)
                header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
                header('Content-Disposition: attachment;filename="'. $fileName .'.xlsx"');
                header('Cache-Control: max-age=0');

                $writer = IOFactory::createWriter($spreadsheet, 'Xlsx');
                $writer->save(Yii::$app->basePath .'/web/report/'.$fileName.'.xlsx');

                
                $writer = IOFactory::createWriter($spreadsheet, 'Xlsx');
                // $writer->save(Yii::$app->basePath . '/web/report/' . $namaFile . '.xls');

                $writer->save('php://output');
                exit(); // -> agar file tidak corrupt
            }
        }

    public function actionDownloadLap($id)
    {
        $file = Yii::$app->basePath . '/web/report/' . $id;
        Yii::$app->response->sendFile($file);
    }
    

}