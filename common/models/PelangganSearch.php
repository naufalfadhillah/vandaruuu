<?php

namespace common\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\Pelanggan;

/**
 * PelangganSearch represents the model behind the search form of `common\models\Pelanggan`.
 */
class PelangganSearch extends Pelanggan
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['pelanggan_id'], 'integer'],
            [['pelanggan_nama', 'pelanggan_jk', 'pelanggan_alamat', 'pelanggan_tgl_lahir', 'pelanggan_no_hp'], 'safe'],
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
        $query = Pelanggan::find();

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
            'pelanggan_id' => $this->pelanggan_id,
            'pelanggan_tgl_lahir' => $this->pelanggan_tgl_lahir,
        ]);

        $query->andFilterWhere(['like', 'pelanggan_nama', $this->pelanggan_nama])
            ->andFilterWhere(['like', 'pelanggan_jk', $this->pelanggan_jk])
            ->andFilterWhere(['like', 'pelanggan_alamat', $this->pelanggan_alamat])
            ->andFilterWhere(['like', 'pelanggan_no_hp', $this->pelanggan_no_hp]);

        return $dataProvider;
    }
}
