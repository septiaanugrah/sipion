<?php

namespace app\controllers;

use Yii;
use app\models\UndanganKeluar;
use app\models\UndanganKeluarSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use app\models\UploadForm;
use yii\web\UploadedFile;
use yii\helpers\FileHelper;


/**
 * UndanganKeluarController implements the CRUD actions for UndanganKeluar model.
 */
class UndanganKeluarController extends Controller
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
     * Lists all UndanganKeluar models.
     * @return mixed
     */
    public function actionIndex()
    {
        $data_kode = \app\models\KodeSurat::dataKodeNama();
        $searchModel = new UndanganKeluarSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
            'data_kode' => $data_kode
        ]);
    }

    /**
     * Displays a single UndanganKeluar model.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
        $data_kode = \app\models\KodeSurat::dataKodeNama();
            $model= $this->findModel($id);
        if ($model->load(Yii::$app->request->post())) {
            $model->save();
            Yii::$app->session->setFlash('kv-detail-success', 'Berhasil Diubah');
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('view', [
            'model' => $model,
            'data_kode' => $data_kode
        ]);
    }

    /**
     * Creates a new UndanganKeluar model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        
        $model = new UndanganKeluar();

        if ($model->load(Yii::$app->request->post())) {
            $model->tanggal = date('Y-m-d', strtotime($model->tanggal));
            $model->tahun = date('Y');
            $model->file = UploadedFile::getInstance($model, 'file');
            $model->save();
                if ($model->file && $model->validate()) {                
                    $model->file->saveAs('uploads/undangan-keluar/' . Yii::$app->controller->id . '-' . $model->id . '.' . 'pdf');
                }
            Yii::$app->session->setFlash('success', 'Berhasil Disimpan </br></br> Nomor Surat: <h3>' . $model->nomor_surat . '</h3>');
            return $this->redirect(['index']);
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing UndanganKeluar model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post())){
            $model->file = UploadedFile::getInstance($model, 'file');
            $model->save(); 
            if ($model->file && $model->validate()) {                
                $model->file->saveAs('uploads/undangan-keluar/' . Yii::$app->controller->id . '-' . $model->id . '.' . 'pdf');
            }
            Yii::$app->session->setFlash('success', 'Berhasil Diunggah Ulang');
            return $this->redirect(['view', 'id' => $model->id]);
        }
        return $this->render('update', [
            'model' => $model,
        ]);
    }

    public function actionDownload($id) 
    { 
        // $download = SuratMasuk::findOne($id); 
        // $model->file = UploadedFile::getInstance($model, 'file');
        $path = Yii::getAlias('@webroot').'/uploads/undangan-keluar/'. Yii::$app->controller->id . '-' . $id . '.' . 'pdf';

        if (file_exists($path)) {
            return Yii::$app->response->sendFile($path);
        }
        else
        {
            Yii::$app->session->setFlash('warning', 'File Belum diunggah. Silahkan Tekan Tombol Unggah Ulang');
            return $this->redirect(['view', 'id' => $id]);
        }
    }

    /**
     * Deletes an existing UndanganKeluar model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */

    public function actionDelete($id)
    {
        $model = $this->findModel($id);
        $model->tempat="";
        $model->pukul="";
        $model->acara="";
        $model->keterangan="";
        $model->tanggal=date('Y-m-d');
        $model->ketersediaan=1;
        $files = FileHelper::findFiles('uploads/undangan-keluar/', [
            'only' => [Yii::$app->controller->id . '-' . $model->id . '.' . 'pdf'],
        ]);
        
        if($files)
        {
        unlink('uploads/undangan-keluar/' . Yii::$app->controller->id . '-' . $model->id . '.' . 'pdf');
        }
        $model->save(); 

        Yii::$app->session->setFlash('info', 'Data Berhasil Dikosongkan');
        return $this->redirect(['view', 'id' => $model->id]);
    }

    // public function actionDelete($id)
    // {
    //     $model = $this->findModel($id);
    //     $model->tempat="";
    //     $model->pukul="";
    //     $model->acara="";
    //     $model->tanggal=date('Y-m-d');
    //     $model->ketersediaan=1;
    //     $model = $this->findModel($id);
    //     $files = FileHelper::findFiles('uploads/undangan-keluar/', [
    //         'only' => [Yii::$app->controller->id . '-' . $model->id . '.' . 'pdf'],
    //     ]);
        
    //     if($files)
    //     {
    //     unlink('uploads/undangan-keluar/' . Yii::$app->controller->id . '-' . $model->id . '.' . 'pdf');
    //     }
    //     $model->save(); 

    //     Yii::$app->session->setFlash('info', 'Data Berhasil Dikosongkan');
    //     return $this->redirect(['view', 'id' => $model->id]);
    // }

    /**
     * Finds the UndanganKeluar model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return UndanganKeluar the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = UndanganKeluar::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }

    public function actionTes(){
        echo "<pre>";
        print_r(\app\models\KodeSurat::dataKodeNama());
        echo "</pre>";

    }
}
