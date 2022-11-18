<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Kabupaten;

/**
 * DokterSearch represents the model behind the search form of `app\models\Dokter`.
 */
class KabupatenSearch extends Kabupaten
{

    public $namaProvinsi;
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'nama', 'namaProvinsi'], 'safe'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function scenarios()
    {
        // bypass scenarios() implementation in the parent class
        return Model::scenarios();
    }

    /**
     * Creates data provider instance with search query applied
     *
     * @param array $params
     *
     * @return ActiveDataProvider
     */
    public function search($params)
    {
        $query = Kabupaten::find()
                ->joinWith('provinsi');

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $dataProvider->sort->attributes['namaProvinsi'] = [
            'asc'  => ['provinsi.nama' => SORT_ASC],
            'desc' => ['provinsi.nama' => SORT_DESC],
        ];

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere(['like', 'id', $this->id])
            ->andFilterWhere(['like', 'kabupaten.nama', $this->nama])
            ->andFilterWhere(['like', 'provinsi.nama', $this->namaProvinsi])
           ;

        return $dataProvider;
    }
}
