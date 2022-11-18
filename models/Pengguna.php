<?php
/*
 * @Author: Dicky Ermawan S., S.T., MTA 
 * @Email: wanasaja@gmail.com 
 * @Linkedin: linkedin.com/in/dickyermawan 
 * @Date: 2018-11-13 19:58:16 
 * @Last Modified by: Dicky Ermawan S., S.T., MTA
 * @Last Modified time: 2018-11-19 11:14:44
 */


namespace app\models;

use Yii;
use yii\behaviors\BlameableBehavior;
use yii\behaviors\TimestampBehavior;

/**
 * This is the model class for table "pengguna".
 *
 * @property int $id
 * @property string $username
 * @property string $password
 * @property string $nama
 * @property string $no_hp
 * @property string $akses
 * @property string $authKey
 * @property string $create_at
 * @property string $modified_at
 * @property int $change_by
 */
class Pengguna extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'pengguna';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['username', 'password', 'nama', 'no_hp', 'akses'], 'required'],
            [['create_at', 'modified_at'], 'safe'],
            [['change_by', 'created_by', 'created_at', 'updated_by', 'updated_at'], 'integer'],
            [['username', 'password', 'nama'], 'string', 'max' => 100],
            [['no_hp', 'akses'], 'string', 'max' => 15],
            [['authKey'], 'string', 'max' => 255],
            [['username'], 'unique'],
            [['username'], 'match', 'pattern' => '/^[A-Za-z0-9_]+$/u', 'message' => 'Username hanya berisi Huruf dan Angka.'],
        ];
    }

    public function behaviors()
    {
        return [
            TimestampBehavior::className(),
            BlameableBehavior::className(),
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'username' => 'Username',
            'password' => 'Password',
            'nama' => 'Nama',
            'no_hp' => 'No. Hp',
            'akses' => 'Akses',
            'authKey' => 'Auth Key',
            'create_at' => 'Create At',
            'modified_at' => 'Modified At',
            'change_by' => 'Change By',
            'changeByNama' => 'Change By',
            'created_by' => 'Dibuat oleh',
            'created_at' => "Dibuat saat",
            'updated_by' => "Diubah oleh",
            'updated_at' => "Diubah saat",
        ];
    }

    protected $oldAttributes;

    public function afterFind(){
        $this->oldAttributes = $this->attributes;
        return parent::afterFind();
    }

    public function beforeSave($insert)
    {
        if($insert){ 
            //ini untuk insert
            $this->setPassword($this->password);
            $this->generateAuthKey();
            $this->create_at = date('Y-m-d H:i:s');
            $this->modified_at = date('Y-m-d H:i:s');
            $this->change_by = isset(\Yii::$app->user->identity->id) ? \Yii::$app->user->identity->id : 0;
        }else{ 
            //ini untuk update
            $this->modified_at = date('Y-m-d H:i:s');
            $this->change_by = isset(\Yii::$app->user->identity->id) ? \Yii::$app->user->identity->id : 0;
        }            
        return true;
    }

    public function generateAuthKey()
    {
        $this->authKey = \Yii::$app->security->generateRandomString();
    }

    public function setPassword($password)
    {
        $this->password = \Yii::$app->security->generatePasswordHash($password);
    }

    public static function dataNama()
    {
        $array = self::find()->select(['nama'])->orderBy(['nama' => SORT_ASC])->asArray()->all();
        return \yii\helpers\ArrayHelper::map($array, 'nama', 'nama');
    }

    public function getRelasiPengguna()
    {
        return $this->hasOne(Pengguna::className(), ['id' => 'change_by'])->from(['pgn' => 'pengguna']);
    }

    public function getChangeByNama()
    {
        return $this->relasiPengguna->nama;
    }
}
