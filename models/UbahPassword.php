<?php
/*
 * @Author: Dicky Ermawan S., S.T., MTA 
 * @Email: wanasaja@gmail.com 
 * @Linkedin: linkedin.com/in/dickyermawan 
 * @Date: 2018-11-13 18:08:44 
 * @Last Modified by: Dicky Ermawan S., S.T., MTA
 * @Last Modified time: 2018-11-13 18:54:04
 */

namespace app\models;

use Yii;

class UbahPassword extends \yii\base\Model
{
    public $id;
    public $username;
    public $pass_lama;
    public $pass_baru;
    public $pass_baru2;

    public function rules()
    {
        return [
            [['id', 'username', 'pass_lama', 'pass_baru', 'pass_baru2'], 'required', 'message' => '{attribute} harus diisi.'],
            [['id'], 'integer'],
            [['username', 'pass_lama', 'pass_baru', 'pass_baru2'], 'string']
        ];
    }

    public function attributeLabels()
    {
        return [
            'username' => 'Username',
            'pass_lama' => 'Password Lama',
            'pass_baru' => 'Password Baru',
            'pass_baru2' => 'Ulang Password Baru'
        ];
    }

    public function validasiPassBaru()
    {
        if ($this->pass_baru != $this->pass_baru2){
            return true;
        }
        else{
            return false;
        }
    }
    
    public function validasiPassLama($passLama)
    {
        if (Yii::$app->security->validatePassword($this->pass_lama, $passLama)){
            return true;
        }
        else{
            return false;
        }
    }
}
