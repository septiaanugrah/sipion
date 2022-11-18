<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Pengguna;

/**
 * PenggunaSearch represents the model behind the search form of `app\models\Pengguna`.
 */
class PenggunaSearch extends Pengguna
{
    public $changeByNama;
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'change_by'], 'integer'],
            [['username', 'password', 'nama', 'no_hp', 'akses', 'authKey', 'create_at', 'modified_at', 'changeByNama'], 'safe'],
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
        $query = Pengguna::find()
                ->joinWith(['relasiPengguna']);

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $dataProvider->sort->attributes['changeByNama'] = [
            'asc' => ['pgn.nama' => SORT_ASC],
            'desc' => ['pgn.nama' => SORT_DESC],
        ];


        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere([
            'id' => $this->id,
            'create_at' => $this->create_at,
            'modified_at' => $this->modified_at,
            // 'change_by' => $this->change_by,
        ]);

        $query->andFilterWhere(['like', 'pengguna.username', $this->username])
            ->andFilterWhere(['like', 'password', $this->password])
            ->andFilterWhere(['like', 'pengguna.nama', $this->nama])
            ->andFilterWhere(['like', 'pengguna.no_hp', $this->no_hp])
            ->andFilterWhere(['like', 'pengguna.akses', $this->akses])
            ->andFilterWhere(['like', 'pgn.nama', $this->changeByNama])
            ->andFilterWhere(['like', 'pengguna.authKey', $this->authKey]);

        return $dataProvider;
    }
}
