<?php

namespace app\controllers;

use Yii;
use app\models\NotaKesepahaman;
use app\models\NotaKesepahamanSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use app\models\UploadForm;
use yii\web\UploadedFile;
use yii\helpers\FileHelper;

/**
 * SuratKeputusanController implements the CRUD actions for SuratKeputusan model.
 */
class NotaKesepahamanController extends Controller
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
     * Lists all SuratKeputusan models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new NotaKesepahamanSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single SuratKeputusan model.
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
     * Creates a new SuratKeputusan model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new NotaKesepahaman();

        if ($model->load(Yii::$app->request->post())) {
            $model->tanggal = date('Y-m-d', strtotime($model->tanggal));
            $model->tahun = date('Y');
            $model->file = UploadedFile::getInstance($model, 'file');
            $model->save();
                if ($model->file && $model->validate()) {                
                    $model->file->saveAs('uploads/nota-kesepahaman/' . Yii::$app->controller->id . '-' . $model->id . '.' . 'pdf');
                }
            Yii::$app->session->setFlash('success', 'Berhasil Disimpan </br></br> Nomor Surat: <h3>' . $model->nomor_surat . '</h3>');
            return $this->redirect(['index']);
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing SuratKeputusan model.
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
                $model->file->saveAs('uploads/nota-kesepahaman/' . Yii::$app->controller->id . '-' . $model->id . '.' . 'pdf');
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
        $path = Yii::getAlias('@webroot').'/uploads/nota-kesepahaman/'. Yii::$app->controller->id . '-' . $id . '.' . 'pdf';

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
     * Deletes an existing SuratKeputusan model.
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
        $files = FileHelper::findFiles('uploads/nota-kesepahaman/', [
            'only' => [Yii::$app->controller->id . '-' . $model->id . '.' . 'pdf'],
        ]);
        
        if($files)
        {
        unlink('uploads/nota-kesepahaman/' . Yii::$app->controller->id . '-' . $model->id . '.' . 'pdf');
        }
        $model->save(); 

        Yii::$app->session->setFlash('info', 'Data Berhasil Dikosongkan');
        return $this->redirect(['view', 'id' => $model->id]);
    }

    /**
     * Finds the SuratKeputusan model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return SuratKeputusan the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = NotaKesepahaman::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
