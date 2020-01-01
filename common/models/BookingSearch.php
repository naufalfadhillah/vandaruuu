<?php

namespace common\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\Booking;

/**
 * BookingSearch represents the model behind the search form of `common\models\Booking`.
 */
class BookingSearch extends Booking
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['booking_id', 'booking_id_pelanggan', 'booking_id_kamar', 'booking_durasi'], 'integer'],
            [['booking_tgl_pesan', 'booking_status'], 'safe'],
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
        $query = Booking::find();

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
            'booking_id' => $this->booking_id,
            'booking_id_pelanggan' => $this->booking_id_pelanggan,
            'booking_id_kamar' => $this->booking_id_kamar,
            'booking_durasi' => $this->booking_durasi,
            'booking_tgl_pesan' => $this->booking_tgl_pesan,
        ]);

        $query->andFilterWhere(['like', 'booking_status', $this->booking_status]);

        return $dataProvider;
    }
}
