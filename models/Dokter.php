<?php

namespace app\models;

use Yii;
use yii\helpers\ArrayHelper;
use yii\behaviors\BlameableBehavior;
use yii\behaviors\TimestampBehavior;

/**
 * This is the model class for table "dokter".
 *
 * @property int $id
 * @property string $nama_dokter
 * @property string $kompetensi
 * @property string $NIP
 * @property int $status
 * @property int $created_by
 * @property int $created_at
 * @property int $updated_by
 * @property int $updated_at
 */
class Dokter extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'dokter';
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
    public function rules()
    {
        return [
            [['nama_dokter'], 'required'],
            [['status', 'created_by', 'created_at', 'updated_by', 'updated_at'], 'integer'],
            [['nama_dokter', 'kompetensi'], 'string', 'max' => 250],
            [['nip'], 'string', 'max' => 30],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'nama_dokter' => 'Nama Dokter',
            'kompetensi' => 'Kompetensi',
            'nip' => 'NIP ',
            'status' => 'Status',
            'created_by' => 'Created By',
            'created_at' => 'Created At',
            'updated_by' => 'Updated By',
            'updated_at' => 'Updated At',
        ];
    }

    // public static function getDokter()
    // {
    //     $dataDokter = self::find()->asArray()->all();
    //     return array_combine(
    //         array_map(
    //             function ($value) {
    //                 return $value['id'];
    //             },
    //             $dataDokter
    //         ),
    //         array_map(
    //             function ($value) {
    //                 return $value['nama_dokter'];
    //             },
    //             $dataDokter
    //         )
    //     );
    // }

    public static function getDokter()
    {
        $dataDokter = self::find()->select(['id', 'nama_dokter'])->where(['=', 'status', 1])->asArray()->all();
        return ArrayHelper::map($dataDokter, 'id', 'nama_dokter');
    }
}
