<?php

namespace common\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\Tipe;

/**
 * TipeSearch represents the model behind the search form of `common\models\Tipe`.
 */
class TipeSearch extends Tipe
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['tipe_id', 'tipe_harga'], 'integer'],
            [['tipe_nama', 'tipe_deskripsi', 'tipe_fasilitas', 'tipe_gambar'], 'safe'],
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
        $query = Tipe::find();

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
            'tipe_id' => $this->tipe_id,
            'tipe_harga' => $this->tipe_harga,
        ]);

        $query->andFilterWhere(['like', 'tipe_nama', $this->tipe_nama])
            ->andFilterWhere(['like', 'tipe_deskripsi', $this->tipe_deskripsi])
            ->andFilterWhere(['like', 'tipe_fasilitas', $this->tipe_fasilitas])
            ->andFilterWhere(['like', 'tipe_gambar', $this->tipe_gambar]);

        return $dataProvider;
    }
}
