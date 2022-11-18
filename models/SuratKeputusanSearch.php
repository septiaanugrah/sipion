<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\SuratKeputusan;

/**
 * SuratKeputusanSearch represents the model behind the search form of `app\models\SuratKeputusan`.
 */
class SuratKeputusanSearch extends SuratKeputusan
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'created_by', 'updated_by', 'ketersediaan', 'no_urut'], 'integer'],
            [['tanggal', 'perihal', 'penanggung_jawab', 'created_at', 'updated_at', 'nomor_surat'], 'safe'],
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
        $query = SuratKeputusan::find();

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
            'sort'=> ['defaultOrder' => ['id' => SORT_DESC]]
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere([
            'id' => $this->id,
            'no_urut' => $this->no_urut,
            'tanggal' => $this->tanggal,
            'tahun' => $this->tahun,
            'created_by' => $this->created_by,
            'created_at' => $this->created_at,
            'updated_by' => $this->updated_by,
            'updated_at' => $this->updated_at,
            'ketersediaan' => $this->ketersediaan
        ]);

        $query->andFilterWhere(['like', 'perihal', $this->perihal])
            ->andFilterWhere(['like', 'penanggung_jawab', $this->penanggung_jawab])
            ->andFilterWhere(['like', 'kode_surat', $this->kode_surat])
            ->andFilterWhere(['like', 'nomor_surat', $this->nomor_surat]);

        return $dataProvider;
    }
}
