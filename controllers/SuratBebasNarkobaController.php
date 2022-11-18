<?php

namespace app\controllers;

use Yii;
use app\models\SuratBebasNarkoba;
use app\models\SuratBebasNarkobaSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use app\models\Kabupaten;
use yii\helpers\Json;
use kartik\mpdf\Pdf;

/**
 * SuratBebasNarkobaController implements the CRUD actions for SuratBebasNarkoba model.
 */
class SuratBebasNarkobaController extends Controller
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
     * Lists all SuratBebasNarkoba models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new SuratBebasNarkobaSearch();
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
        $model = new SuratBebasNarkoba();
        $dataKecamatan = \app\models\Kecamatan::getKecamatanOnly();
        $dataDokter = \app\models\Dokter::getDokter();

        if ($model->load(Yii::$app->request->post())) {
            $model->tanggal = date('Y-m-d');
            $model->tahun = date('Y');
            $model->amphetamin = 'NEGATIF';
            $model->opiate = 'NEGATIF';
            $model->canabinoid = 'NEGATIF';
            $model->save();
            Yii::$app->session->setFlash('success', 'Berhasil Disimpan </br></br> Nomor Surat: <h3>' . $model->nomor_surat . '</h3>');
            return $this->redirect(['index']);
        }

        return $this->render('create', [
            'model' => $model,
            'dataKecamatan' => $dataKecamatan,
            'dataDokter' => $dataDokter
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
        $dataKecamatan = \app\models\Kecamatan::getKecamatanOnly();
        $dataDokter = \app\models\Dokter::getDokter();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('update', [
            'model' => $model,
            'dataKecamatan' => $dataKecamatan,
            'dataDokter' => $dataDokter
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

    public function actionGetKabupaten()
    {
        $q  = Yii::$app->request->get('q');
        $model = Kabupaten::find()
            ->where([
                'or',
                ['like', 'nama', $q]
            ])
            ->asArray()
            ->all();

        return Json::encode([
            'total'=> count($model), 
            'items'=> $model
        ]);
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

    public function actionCetakHasil($id)
    {
        $model = SuratBebasNarkoba::findOne($id);

        // if(!$model)
        // {
        //     return $this->redirect(['beranda/error']);
        // }

        $content = $this->renderPartial('cetak-hasil', ['model' => $model]);
        $tanggal = Yii::$app->formatter->asDate(date('Y-m-d'), 'php:l, d F Y');
        $jam = date('H:i:s');

        $pdf = new Pdf([
            'mode' => Pdf::MODE_UTF8,
            'format' => Pdf::FORMAT_LEGAL,
            'marginTop' => 10,
            'marginFooter' => 45,
            'orientation' => Pdf::ORIENT_PORTRAIT, 
            'destination' => Pdf::DEST_BROWSER, 
            // 'destination' => Pdf::DEST_DOWNLOAD,
            'content' => $content,
            'filename' => 'Surat Hasil Pemeriksaan Urine' . $model->nomor_surat . ' - ' . $tanggal . ' - ' . $jam . ' .pdf',
            // 'cssInline' => '.table > thead > tr > th,.table > tbody > tr > th,.table > tfoot > tr > th,.table > thead > tr > td,.table > tbody > tr > td,.table > tfoot > tr > td { padding: 3px; line-height: 1.42857143; vertical-align: top; border-top: 1px solid #dddddd;}',
            'methods' => [
                'SetFooter' => ['Dibuat melalui SIRARA oleh ' . $model->updatedByNama . ' / ' . ' Dicetak Pada' . ' ' . $tanggal . ', ' . $jam ] , 
            ]
           // . '|| Pada ' . $tanggal . ', ' . $jam]

        ]);
        return $pdf->render(); 
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
        if (($model = SuratBebasNarkoba::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
