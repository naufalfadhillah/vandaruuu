<?php

namespace common\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\Kamar;

/**
 * KamarSearch represents the model behind the search form of `common\models\Kamar`.
 */
class KamarSearch extends Kamar
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['kamar_id', 'kamar_harga'], 'integer'],
            [['kamar_nama', 'kamar_foto', 'kamar_type', 'kamar_deskripsi', 'created_by', 'created_date', 'updated_by', 'updated_date', 'kamar_status'], 'safe'],
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
        $query = Kamar::find();

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
            'kamar_id' => $this->kamar_id,
            'kamar_harga' => $this->kamar_harga,
            'created_date' => $this->created_date,
            'updated_date' => $this->updated_date,
        ]);

        $query->andFilterWhere(['like', 'kamar_nama', $this->kamar_nama])
            ->andFilterWhere(['like', 'kamar_type', $this->kamar_type])
            ->andFilterWhere(['like', 'kamar_deskripsi', $this->kamar_deskripsi])
            ->andFilterWhere(['like', 'created_by', $this->created_by])
            ->andFilterWhere(['like', 'updated_by', $this->updated_by])
            ->andFilterWhere(['like', 'kamar_status', $this->kamar_status])
            ->andFilterWhere(['like', 'kamar_foto', $this->kamar_foto]);

        return $dataProvider;
    }
}
