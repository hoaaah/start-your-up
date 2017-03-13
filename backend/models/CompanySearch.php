<?php

namespace backend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\Company;

/**
 * CompanySearch represents the model behind the search form about `common\models\Company`.
 */
class CompanySearch extends Company
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'service_homepage', 'portofolio_homepage'], 'integer'],
            [['company_name', 'lead_message', 'intro_message', 'services_button', 'service_title', 'service_message', 'portofolio_title', 'portofolio_message', 'about_title', 'about_message', 'team_title', 'team_message_1', 'team_message_2', 'twitter_account', 'facebook_account', 'linkedin_account'], 'safe'],
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
        $query = Company::find();

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
            'service_homepage' => $this->service_homepage,
            'portofolio_homepage' => $this->portofolio_homepage,
        ]);

        $query->andFilterWhere(['like', 'company_name', $this->company_name])
            ->andFilterWhere(['like', 'lead_message', $this->lead_message])
            ->andFilterWhere(['like', 'intro_message', $this->intro_message])
            ->andFilterWhere(['like', 'services_button', $this->services_button])
            ->andFilterWhere(['like', 'service_title', $this->service_title])
            ->andFilterWhere(['like', 'service_message', $this->service_message])
            ->andFilterWhere(['like', 'portofolio_title', $this->portofolio_title])
            ->andFilterWhere(['like', 'portofolio_message', $this->portofolio_message])
            ->andFilterWhere(['like', 'about_title', $this->about_title])
            ->andFilterWhere(['like', 'about_message', $this->about_message])
            ->andFilterWhere(['like', 'team_title', $this->team_title])
            ->andFilterWhere(['like', 'team_message_1', $this->team_message_1])
            ->andFilterWhere(['like', 'team_message_2', $this->team_message_2])
            ->andFilterWhere(['like', 'twitter_account', $this->twitter_account])
            ->andFilterWhere(['like', 'facebook_account', $this->facebook_account])
            ->andFilterWhere(['like', 'linkedin_account', $this->linkedin_account]);

        return $dataProvider;
    }
}
