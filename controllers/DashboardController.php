<?php


namespace app\controllers;

use Yii;
use app\models\User;
use app\models\SuratMasuk;
use app\models\SuratKeluar;
use app\models\UndanganKeluar;
use app\models\NotaDinas;
use app\models\SuratKeputusan;
use app\models\NotaKesepahaman;
use app\models\SuratPerjalananDinas;
use app\models\SuratSehat;
use app\models\SuratBebasNarkoba;
use app\models\SuratRapid;
use app\models\Pengguna;
use app\models\Jabatan;
use app\models\SifatSurat;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\helpers\ArrayHelper;

// use ElephantIO\Client as Socket;
// use ElephantIO\Engine\SocketIO\Version1X;


use yii\filters\AccessControl;
use app\components\AccessRule;

/**
 * KunjunganController implements the CRUD actions for Kunjungan model.
 */
class DashboardController extends Controller
{

    protected $socket;

    // public function init()
    // {
    //     $this->socket = new Socket(new Version1X('127.0.0.1:8088'));
    // }

    /**
     * {@inheritdoc}
     */
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
                    'riwayat-hari-ini',
                    'riwayat-semua',
                    'view',
                    'validasi',
                    'create',
                    'update',
                    'print',
                    //super_admin
                    'delete',
                ],
                'rules' => [
                    [
                        'actions' => ['index', 'riwayat-hari-ini', 'riwayat-semua', 'view', 'validasi', 'create', 'update', 'print'],
                        'allow' => true,
                        'roles' => [
                            User::ROLE_SUPERADMIN,
                            User::ROLE_ADMIN,
                            User::ROLE_SUPERVISOR,
                            User::ROLE_LABORATORIUM,
                            User::ROLE_ADMIN_LABORATORIUM
                        ],
                    ],
                    [
                        'actions' => ['delete'],
                        'allow' => true,
                        'roles' => [
                            User::ROLE_SUPERADMIN,
                            User::ROLE_ADMIN,
                            User::ROLE_SUPERVISOR,
                            User::ROLE_LABORATORIUM,
                            User::ROLE_ADMIN_LABORATORIUM
                        ],
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                    'validasi' => ['POST'],
                    // 'print' => ['POST'],
                ],
            ],
        ];
    }

    /**
     * Lists all Kunjungan models.
     * @return mixed
     */
    public function actionIndex()
    {
        $jml_surat_masuk = SuratMasuk::find()->where(['ketersediaan' => 2])->count();
        $jml_surat_keluar = SuratKeluar::find()->where(['ketersediaan' => 2])->count();
        $jml_undangan_keluar = UndanganKeluar::find()->where(['ketersediaan' => 2])->count();
        $jml_nota_dinas = NotaDinas::find()->where(['ketersediaan' => 2])->count();
        $jml_surat_keputusan = SuratKeputusan::find()->where(['ketersediaan' => 2])->count();
        $jml_nota_kesepahaman = NotaKesepahaman::find()->where(['ketersediaan' => 2])->count();
        $jml_surat_perjalanan_dinas = SuratPerjalananDinas::find()->where(['ketersediaan' => 2])->count();
        $jml_surat_sehat = SuratSehat::find()->count();
        $jml_surat_narkoba = SuratBebasNarkoba::find()->count();
        $jml_surat_rapid = SuratRapid::find()->count();
        $jml_pengguna = Pengguna::find()->count();
        $jml_jabatan = Jabatan::find()->count();
        $jml_sifat_surat = SifatSurat::find()->count();
        // $dataProvider = $searchModel->search(Yii::$app->request->queryParams, date('Y-m-d'), 0);
        // $dataProvider->pagination->pageSize = 10;

        // $jumlah = Dashboard::getJmlSuratMasuk();

        return $this->render('index', [
            // 'searchModel' => $searchModel,
            // 'dataProvider' => $dataProvider,
            'title' => 'Dashboard',
            'secondTitle' => \Yii::$app->formatter->asDate(date('d-m-Y'), 'php:l, d F Y'),
            'jml_surat_masuk' => $jml_surat_masuk,
            'jml_surat_keluar' => $jml_surat_keluar,
            'jml_undangan_keluar' => $jml_undangan_keluar,
            'jml_nota_dinas' => $jml_nota_dinas,
            'jml_surat_keputusan' => $jml_surat_keputusan,
            'jml_nota_kesepahaman' => $jml_nota_kesepahaman,
            'jml_surat_perjalanan_dinas' => $jml_surat_perjalanan_dinas,
            'jml_surat_sehat' => $jml_surat_sehat,
            'jml_surat_narkoba' => $jml_surat_narkoba,
            'jml_surat_rapid' => $jml_surat_rapid,
            'jml_pengguna' => $jml_pengguna,
            'jml_jabatan' => $jml_jabatan,
            'jml_sifat_surat' => $jml_sifat_surat,
            
        ]);
    }
}
