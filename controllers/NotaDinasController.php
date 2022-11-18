<?php

namespace app\controllers;

use Yii;
use app\models\NotaDinas;
use app\models\NotaDinasSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use app\models\UploadForm;
use yii\web\UploadedFile;
use yii\helpers\FileHelper;

/**
 * NotaDinasController implements the CRUD actions for NotaDinas model.
 */
class NotaDinasController extends Controller
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
     * Lists all NotaDinas models.
     * @return mixed
     */
    public function actionIndex()
    {
        $data_kode = \app\models\KodeSurat::dataKodeNama();
        $searchModel = new NotaDinasSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
            'data_kode' => $data_kode
        ]);
    }

    /**
     * Displays a single NotaDinas model.
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
            Yii::$app->session->setFlash( 'kv-detail-success', 'Berhasil Diubah');
            return $this->redirect( ['view', 'id' => $model->id]);
        }
        
        return $this->render('view', [
            'model' => $model,
            'data_kode' => $data_kode
        ]);
    }

    /**
     * Creates a new NotaDinas model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new NotaDinas();

        if ($model->load(Yii::$app->request->post())) {
            $model->tanggal = date('Y-m-d', strtotime($model->tanggal));
            $model->tahun = date('Y');
            $model->file = UploadedFile::getInstance($model, 'file');
            $model->save();
                if ($model->file && $model->validate()) {                
                    $model->file->saveAs('uploads/nota-dinas/' . Yii::$app->controller->id . '-' . $model->id . '.' . 'pdf');
                }
            Yii::$app->session->setFlash('success', 'Berhasil Disimpan </br></br> Nomor Surat: <h3>' . $model->nomor_surat . '</h3>');
            return $this->redirect(['index']);
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    public function actionDownload($id) 
    { 
        // $download = SuratMasuk::findOne($id); 
        // $model->file = UploadedFile::getInstance($model, 'file');
        $path = Yii::getAlias('@webroot').'/uploads/nota-dinas/'. Yii::$app->controller->id . '-' . $id . '.' . 'pdf';

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
     * Updates an existing NotaDinas model.
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
                $model->file->saveAs('uploads/nota-dinas/' . Yii::$app->controller->id . '-' . $model->id . '.' . 'pdf');
            }
            Yii::$app->session->setFlash('success', 'Berhasil Diunggah Ulang');
            return $this->redirect(['view', 'id' => $model->id]);
        }
        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing NotaDinas model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */

    public function actionDelete($id)
    {
        $model = $this->findModel($id);
        $model->perihal="";
        $model->tanggal=date('Y-m-d');
        $model->ketersediaan=1;
        $files = FileHelper::findFiles('uploads/nota-dinas/', [
            'only' => [Yii::$app->controller->id . '-' . $model->id . '.' . 'pdf'],
        ]);
        
        if($files)
        {
        unlink('uploads/nota-dinas/' . Yii::$app->controller->id . '-' . $model->id . '.' . 'pdf');
        }
        $model->save(); 

        Yii::$app->session->setFlash('info', 'Data Berhasil Dikosongkan');
        return $this->redirect(['view', 'id' => $model->id]);
    }

    // public function actionDelete($id)
    // {
    //     $model = $this->findModel($id);
    //     $model->perihal="";
    //     $model->tanggal=date('Y-m-d');
    //     $model->ketersediaan=1;
    //     $model = $this->findModel($id);
    //     $files = FileHelper::findFiles('uploads/nota-dinas/', [
    //         'only' => [Yii::$app->controller->id . '-' . $model->id . '.' . 'pdf'],
    //     ]);
        
    //     if($files)
    //     {
    //     unlink('uploads/nota-dinas/' . Yii::$app->controller->id . '-' . $model->id . '.' . 'pdf');
    //     }
    //     $model->save(); 

    //     Yii::$app->session->setFlash('info', 'Data Berhasil Dikosongkan');
    //     return $this->redirect(['view', 'id' => $model->id]);
    // }

    /**
     * Finds the NotaDinas model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return NotaDinas the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = NotaDinas::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
