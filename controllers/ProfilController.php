<?php
/*
 * @Author: Dicky Ermawan S., S.T., MTA 
 * @Email: wanasaja@gmail.com 
 * @Linkedin: linkedin.com/in/dickyermawan 
 * @Date: 2018-11-13 18:07:16 
 * @Last Modified by: Dicky Ermawan S., S.T., MTA
 * @Last Modified time: 2018-11-23 17:27:35
 */

namespace app\controllers;

use Yii;
use app\models\Pengguna;
use app\models\UbahPassword;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

use yii\filters\AccessControl;
use app\components\AccessRule;
use app\models\User;
use yii\web\Response;
use yii\widgets\ActiveForm;

class ProfilController extends Controller
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
                    'edit',
                    'ubah-profil',
                    'ubah-password',
                ],
                'rules' => [
                    [
                        'actions' => [
                            'edit',
                            'ubah-profil',
                            'ubah-password',
                        ],
                        'allow' => true,
                        'roles' => [
                            User::ROLE_SUPERADMIN,
                            User::ROLE_ADMIN,
                            User::ROLE_LABORATORIUM,
                            User::ROLE_ADMIN_LABORATORIUM,
                        ],
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'ubah-profil' => ['POST'],
                    'ubah-password' => ['POST'],
                ],
            ],
        ];
    }

	public function actionEdit()
	{
		$model = Pengguna::findOne(Yii::$app->user->identity->id);

		$passmodel = new UbahPassword();
		$passmodel->id = $model->id;
		$passmodel->username = $model->username;

		return $this->render('edit',[
			'model' => $model,
			'passmodel' => $passmodel
		]);
	}

	public function actionUbahProfil($id)
	{
        $model = Pengguna::findOne($id);
        if (Yii::$app->request->isAjax && $model->load(Yii::$app->request->post())) {
            Yii::$app->response->format = Response::FORMAT_JSON;
            return ActiveForm::validate($model);
        }

		if ($model->load(Yii::$app->request->post()) && $model->save()) {
            Yii::$app->getSession()->setFlash('success', 'Profil Berhasil diubah.');
            return $this->redirect(Yii::$app->request->referrer);
        }
	}

	public function actionUbahPassword()
	{
		$passModel = new UbahPassword();
		$passModel->load(Yii::$app->request->post());

		if($passModel->validasiPassBaru()){
			Yii::$app->getSession()->setFlash('error', 'Password baru anda tidak sama, harap lebih teliti.');
			return $this->redirect(Yii::$app->request->referrer);
		}else{
			$model = Pengguna::findOne($passModel->id);
			if(!$passModel->validasiPassLama($model->password)){
				Yii::$app->getSession()->setFlash('error', 'Password lama yang anda masukkan tidak sesuai dengan Password anda saat ini.');
				return $this->redirect(Yii::$app->request->referrer);
			}else{
				$model->setPassword($passModel->pass_baru);
				$model->save();
				Yii::$app->getSession()->setFlash('success', 'Password anda berhasil diubah.');
				return $this->redirect(Yii::$app->request->referrer);
			}
		}
	}
}