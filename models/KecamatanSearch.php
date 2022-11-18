<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Kecamatan;

/**
 * DokterSearch represents the model behind the search form of `app\models\Dokter`.
 */
class KecamatanSearch extends Kecamatan
{
    
    public $namaKabupaten;
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'nama', 'namaKabupaten'], 'safe'],
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
        $query = Kecamatan::find()
            ->joinWith('kabupaten');

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $dataProvider->sort->attributes['namaKabupaten'] = [
            'asc'  => ['kabupaten.nama' => SORT_ASC],
            'desc' => ['kabupaten.nama' => SORT_DESC],
        ];
        
        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere(['like', 'id', $this->id])
            ->andFilterWhere(['like', 'kecamatan.nama', $this->nama])
            ->andFilterWhere(['like', 'kabupaten.nama', $this->namaKabupaten])
           ;

        return $dataProvider;
    }
}
