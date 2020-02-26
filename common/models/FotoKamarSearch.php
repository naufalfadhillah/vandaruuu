<?php

namespace common\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\FotoKamar;

/**
 * FotoKamarSearch represents the model behind the search form of `common\models\FotoKamar`.
 */
class FotoKamarSearch extends FotoKamar
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['foto_id_foto', 'foto_id_kamar'], 'integer'],
            [['foto_kamar', 'file', 'created_by', 'created_date', 'updated_by', 'updated_date', 'status'], 'safe'],
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
        $query = FotoKamar::find();

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere([
            'foto_id_foto' => $this->foto_id_foto,
            'foto_id_kamar' => $this->foto_id_kamar,
            'created_date' => $this->created_date,
            'updated_date' => $this->updated_date,
        ]);

        $query->andFilterWhere(['like', 'foto_kamar', $this->foto_kamar])
            ->andFilterWhere(['like', 'file', $this->file])
            ->andFilterWhere(['like', 'created_by', $this->created_by])
            ->andFilterWhere(['like', 'updated_by', $this->updated_by])
            ->andFilterWhere(['like', 'status', $this->status]);

        return $dataProvider;
    }
}
