<?php

namespace app\controllers;

use Yii;
use app\models\SuratMasuk;
use app\models\SuratMasukSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use app\models\UploadForm;
use yii\web\UploadedFile;
use yii\helpers\FileHelper;

/**
 * SuratMasukController implements the CRUD actions for SuratMasuk model.
 */
class SuratMasukController extends Controller
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
     * Lists all SuratMasuk models.
     * @return mixed
     */
    public function actionIndex()
    {
        // $data_sifat = \app\models\SifatSurat::dataSifatNama();
        $data_jabatan = \app\models\Jabatan::dataJabatanNama();
        $searchModel = new SuratMasukSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
            'data_jabatan' => $data_jabatan
            // 'data_sifat' => $data_sifat
        ]);
    }

    /**
     * Displays a single SuratMasuk model.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
        $model= $this->findModel($id);
    if ($model->load(Yii::$app->request->post())) {
            $model->save(false);
            Yii::$app->session->setFlash( 'kv-detail-success', 'Berhasil Diubah');
            return $this->redirect( ['view', 'id' => $model->id]);
        }
        
        return $this->render('view', [
            'model' => $model,
        ]);
    }

    /**
     * Creates a new SuratMasuk model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new SuratMasuk();
        $data_jabatan = \app\models\Jabatan::dataJabatanId();
    

        if ($model->load(Yii::$app->request->post())) {
            $model->tanggal = date('Y-m-d', strtotime($model->tanggal));
            $model->file = UploadedFile::getInstance($model, 'file');
            $model->save();
                if ($model->file) {                
                    $model->file->saveAs('uploads/dokumen/' . 'dokumen' . '-' . $model->id . '.' . 'pdf');
                }
            Yii::$app->session->setFlash('success', 'Buku Berhasil Disimpan');
            return $this->redirect('index');
        }

        //kalau save bermasalah pakai ini
        // if ($model->load(Yii::$app->request->post())) {
        //     if ($model->save(false)) {
        //         Yii::$app->session->setFlash('success', "Berhasil Disimpan");
        //         return $this->redirect(['view', 'id' => $model->id]);
        //     } else {
        //         echo "<pre>";
        //         print_r($model->errors);
        //         echo "</pre>";
        //         exit;
        //     }
        //     return $this->redirect(['view', 'id' => $model->id]);
        // }

        return $this->render('create', [
            'model' => $model,
            'data_jabatan' => $data_jabatan,
        ]);
    }

    public function actionDownload($id) 
        { 
            // $noId = $model->id;
            // var_dump($noId);
            // exit();
            // $download = SuratMasuk::findOne($id); 
            // $model->file = UploadedFile::getInstance($model, 'file');
            $path = Yii::getAlias('@webroot').'/uploads/dokumen/' . 'dokumen' . '-' . $id . '.' . 'pdf';
            $fileName = 'dokumen' . '-' . $id . '.' . 'pdf';

            if (file_exists($path)) {
                // return Yii::$app->response->sendFile($path);
                return Yii::$app->response->sendFile($path, $fileName, ['inline'=>true]);
            }
            else
            {
                Yii::$app->session->setFlash('warning', 'File Belum diunggah. Silahkan Tekan Tombol Unggah Ulang');
                return $this->redirect(['view', 'id' => $id]);
            }
        }

    /**
     * Updates an existing SuratMasuk model.
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
                $model->file->saveAs('uploads/dokumen/' . 'dokumen' . '-' . $model->id . '.' . 'pdf');
            }
            Yii::$app->session->setFlash('success', 'Berhasil Diunggah Ulang');
            return $this->redirect(['view', 'id' => $model->id]);
        }
        return $this->render('update', [
            'model' => $model,
        ]);
       
    }

    /**
     * Deletes an existing SuratMasuk model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */


    public function actionDelete($id)
    {

        $model = $this->findModel($id);
        $files = FileHelper::findFiles('uploads/dokumen/', [
            'only' => [Yii::$app->controller->id . '-' . $model->id . '.' . 'pdf'],
        ]);
        
        if($files)
        {
        unlink('uploads/dokumen/' . 'dokumen' . '-' . $model->id . '.' . 'pdf');
        }

        $model->save(); 
        $this->findModel($id)->delete();

        Yii::$app->session->setFlash('success', 'Data Berhasil Dihapus');
        return $this->redirect(['index']);
    }

    /**
     * Finds the SuratMasuk model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return SuratMasuk the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = SuratMasuk::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }

    public function actionUpload()
    {
        $model = new UploadForm();

        if (Yii::$app->request->isPost) {
            $model->file = UploadedFile::getInstances($model, 'file');

            if ($model->file && $model->validate()) {
                foreach ($model->file as $file) {
                    $file->saveAs('uploads/' . $file->baseName . '.' . $file->extension);
                }
            }
        }

        return $this->render('upload', ['model' => $model]);
    }
}
