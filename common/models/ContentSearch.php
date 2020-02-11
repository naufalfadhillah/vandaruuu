<?php

namespace common\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\Content;

/**
 * ContentSearch represents the model behind the search form of `common\models\Content`.
 */
class ContentSearch extends Content
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['content_id'], 'integer'],
            [['content_judul', 'content_isi', 'created_by', 'created_date', 'updated_by', 'updated_date', 'status', 'file'], 'safe'],
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
        $query = Content::find();

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
            'content_id' => $this->content_id,
            'created_date' => $this->created_date,
            'updated_date' => $this->updated_date,
        ]);

        $query->andFilterWhere(['like', 'content_judul', $this->content_judul])
            ->andFilterWhere(['like', 'content_isi', $this->content_isi])
            ->andFilterWhere(['like', 'created_by', $this->created_by])
            ->andFilterWhere(['like', 'updated_by', $this->updated_by])
            ->andFilterWhere(['like', 'status', $this->status])
            ->andFilterWhere(['like', 'file', $this->file]);

        return $dataProvider;
    }
}
