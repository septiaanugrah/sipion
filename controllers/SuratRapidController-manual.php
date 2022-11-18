<?php

namespace app\controllers;

use Yii;
use app\models\SuratRapid;
use app\models\SuratRapidSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use kartik\mpdf\Pdf;
use yii\helpers\Json;

/**
 * SuratBebasNarkobaController implements the CRUD actions for SuratBebasNarkoba model.
 */
class SuratRapidController extends Controller
{
    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
    }

    /**
     * Lists all SuratRapid models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new SuratRapidSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single SuratBebasNarkoba model.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
            $model= $this->findModel($id);
        if ($model->load(Yii::$app->request->post())) {
            $model->save();
            Yii::$app->session->setFlash('kv-detail-success', 'Berhasil Diubah');
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('view', [
            'model' => $model,
        ]);
    }
    /**
     * Creates a new SuratBebasNarkoba model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new SuratRapid();
        // $dataProvinsi = \app\models\Provinsi::getProvinsi();

        if ($model->load(Yii::$app->request->post())) {
            $model->tanggal = date('Y-m-d');
            $model->tahun = date('Y');
            $model->save();
            Yii::$app->session->setFlash('success', 'Berhasil Disimpan </br></br> Nomor Surat: <h3>' . $model->nomor_surat . '</h3>');
            return $this->redirect(['index']);
        }

        return $this->render('create', [
            'model' => $model,
            // 'dataProvinsi' => $dataProvinsi
        ]);
    }

    /**
     * Updates an existing SuratBebasNarkoba model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);
        // $dataProvinsi = \app\models\Provinsi::getProvinsi();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('update', [
            'model' => $model,
            // 'dataProvinsi' => $dataProvinsi
        ]);
    }

    /**
     * Deletes an existing SuratBebasNarkoba model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    public function actionCetakHasil($id)
    {
        $model = SuratRapid::findOne($id);

        // if(!$model)
        // {
        //     return $this->redirect(['beranda/error']);
        // }

        $content = $this->renderPartial('cetak-hasil', ['model' => $model]);
        $tanggal = Yii::$app->formatter->asDate(date('Y-m-d'), 'php:l, d F Y');
        $jam = date('H:i:s');

        $pdf = new Pdf([
            'mode' => Pdf::MODE_UTF8,
            'format' => Pdf::FORMAT_A4,
            'marginTop' => 8,
            'marginFooter' => 45,
            'orientation' => Pdf::ORIENT_PORTRAIT, 
            'destination' => Pdf::DEST_BROWSER, 
            // 'destination' => Pdf::DEST_DOWNLOAD,
            'content' => $content,
            'filename' => 'Surat Hasil Pemeriksaan Rapid ' . $model->nomor_surat . ' - ' . $tanggal . ' - ' . $jam . ' .pdf',
            // 'cssInline' => '.table > thead > tr > th,.table > tbody > tr > th,.table > tfoot > tr > th,.table > thead > tr > td,.table > tbody > tr > td,.table > tfoot > tr > td { padding: 3px; line-height: 1.42857143; vertical-align: top; border-top: 1px solid #dddddd;}',
            'methods' => [
                // 'SetHeader' => ['Dicetak Otomatis Sistem Informasi Surat Menyurat Pada ' . $tanggal . ', ' . $jam ] , 
            ]
           // . '|| Pada ' . $tanggal . ', ' . $jam]

        ]);
        return $pdf->render(); 
    }

    public function actionGetKabupaten()
    {
        $out = [];
        if (isset($_POST['depdrop_parents'])) {
            $parents = $_POST['depdrop_parents'];
            if ($parents != null) {
                $cat_id = $parents[0];
                $out = \app\models\Kabupaten::find()->select(['id', 'nama as name'])->where(['provinsi_id' => $cat_id])->asArray()->all();; 
                echo Json::encode(['output'=>$out, 'selected'=>'']);
                return;
            }
        }

        echo Json::encode(['output'=>'', 'selected'=>'']);
    }

    public function actionGetKecamatan()
    {
        $out = [];
        if (isset($_POST['depdrop_parents'])) {
            $parents = $_POST['depdrop_parents'];
            if ($parents != null) {
                $cat_id = $parents[0];
                $out = \app\models\Kecamatan::find()->select(['id', 'nama as name'])->where(['kabupaten_id' => $cat_id])->asArray()->all();; 
                echo Json::encode(['output'=>$out, 'selected'=>'']);
                return;
            }
        }
        echo Json::encode(['output'=>'', 'selected'=>'']);
    }

    public function actionGetKelurahan()
    {
        $out = [];
        if (isset($_POST['depdrop_parents'])) {
            $parents = $_POST['depdrop_parents'];
            if ($parents != null) {
                $cat_id = $parents[0];
                $out = \app\models\Kelurahan::find()->select(['id', 'nama as name'])->where(['kecamatan_id' => $cat_id])->asArray()->all();; 
                echo Json::encode(['output'=>$out, 'selected'=>'']);
                return;
            }
        }
        echo Json::encode(['output'=>'', 'selected'=>'']);
    }

    /**
     * Finds the SuratBebasNarkoba model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return SuratBebasNarkoba the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = SuratRapid::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
