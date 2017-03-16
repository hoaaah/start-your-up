<?php

namespace backend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\Partner;

/**
 * PartnerSearch represents the model behind the search form about `common\models\Partner`.
 */
class PartnerSearch extends Partner
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'homepage', 'created_at', 'updated_at', 'created_by', 'updated_by'], 'integer'],
            [['name', 'job', 'content', 'twitter_account', 'facebook_account', 'linkedin_account', 'logo'], 'safe'],
        ];
    }

    /**
     * @inheritdoc
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
        $query = Partner::find();

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
            'id' => $this->id,
            'homepage' => $this->homepage,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
            'created_by' => $this->created_by,
            'updated_by' => $this->updated_by,
        ]);

        $query->andFilterWhere(['like', 'name', $this->name])
            ->andFilterWhere(['like', 'job', $this->job])
            ->andFilterWhere(['like', 'content', $this->content])
            ->andFilterWhere(['like', 'twitter_account', $this->twitter_account])
            ->andFilterWhere(['like', 'facebook_account', $this->facebook_account])
            ->andFilterWhere(['like', 'linkedin_account', $this->linkedin_account])
            ->andFilterWhere(['like', 'logo', $this->logo]);

        return $dataProvider;
    }
}
