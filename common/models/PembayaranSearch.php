<?php

namespace common\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\Pembayaran;

/**
 * PembayaranSearch represents the model behind the search form of `common\models\pembayaran`.
 */
class PembayaranSearch extends Pembayaran
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['pembayaran_id', 'pembayaran_id_booking', 'pembayaran_jumlah'], 'integer'],
            [['pembayaran_tgl_bayar', 'pembayaran_resi', 'status'], 'safe'],
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
        $query = Pembayaran::find();

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
            'pembayaran_id' => $this->pembayaran_id,
            'pembayaran_id_booking' => $this->pembayaran_id_booking,
            'pembayaran_jumlah' => $this->pembayaran_jumlah,
            'pembayaran_tgl_bayar' => $this->pembayaran_tgl_bayar,
        ]);

        $query->andFilterWhere(['like', 'pembayaran_resi', $this->pembayaran_resi])
            ->andFilterWhere(['like', 'status', $this->status]);

        return $dataProvider;
    }
}
