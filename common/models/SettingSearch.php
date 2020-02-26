<?php

namespace common\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\Setting;

/**
 * SettingSearch represents the model behind the search form of `common\models\Setting`.
 */
class SettingSearch extends Setting
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_setting'], 'integer'],
            [['setting_nama', 'setting_alamat', 'setting_email', 'setting_phone', 'setting_fax', 'setting_facebook', 'setting_instagram', 'setting_whatsapp', 'latitudeP', 'longitudeP'], 'safe'],
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
        $query = Setting::find();

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
            'id_setting' => $this->id_setting,
        ]);

        $query->andFilterWhere(['like', 'setting_nama', $this->setting_nama])
            ->andFilterWhere(['like', 'setting_alamat', $this->setting_alamat])
            ->andFilterWhere(['like', 'setting_email', $this->setting_email])
            ->andFilterWhere(['like', 'setting_phone', $this->setting_phone])
            ->andFilterWhere(['like', 'setting_fax', $this->setting_fax])
            ->andFilterWhere(['like', 'setting_facebook', $this->setting_facebook])
            ->andFilterWhere(['like', 'setting_instagram', $this->setting_instagram])
            ->andFilterWhere(['like', 'setting_whatsapp', $this->setting_whatsapp])
            ->andFilterWhere(['like', 'latitudeP', $this->latitudeP])
            ->andFilterWhere(['like', 'longitudeP', $this->longitudeP]);

        return $dataProvider;
    }
}
