<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "company".
 *
 * @property integer $id
 * @property string $company_name
 * @property string $lead_message
 * @property string $intro_message
 * @property string $services_button
 * @property string $service_title
 * @property string $service_message
 * @property integer $service_homepage
 * @property string $portofolio_title
 * @property string $portofolio_message
 * @property integer $portofolio_homepage
 * @property string $about_title
 * @property string $about_message
 * @property string $team_title
 * @property string $team_message_1
 * @property string $team_message_2
 * @property string $twitter_account
 * @property string $facebook_account
 * @property string $linkedin_account
 */
class Company extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'company';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['service_homepage', 'portofolio_homepage', 'enable_forum', 'enable_quote_request', 'enable_articles', 'enable_portofolio', 'enable_team', 'enable_contact'], 'integer'],
            [['team_message_2'], 'string'],
            [['company_name', 'lead_message'], 'string', 'max' => 30],
            [['intro_message', 'service_title', 'portofolio_title', 'about_title', 'team_title'], 'string', 'max' => 50],
            [['services_button'], 'string', 'max' => 20],
            [['service_message', 'portofolio_message', 'about_message', 'team_message_1', 'twitter_account', 'facebook_account', 'linkedin_account'], 'string', 'max' => 100],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'company_name' => Yii::t('app', 'Company Name'),
            'lead_message' => Yii::t('app', 'Lead Message'),
            'intro_message' => Yii::t('app', 'Intro Message'),
            'services_button' => Yii::t('app', 'Services Button'),
            'service_title' => Yii::t('app', 'Service Title'),
            'service_message' => Yii::t('app', 'Service Message'),
            'service_homepage' => Yii::t('app', 'Service Homepage'),
            'portofolio_title' => Yii::t('app', 'Portofolio Title'),
            'portofolio_message' => Yii::t('app', 'Portofolio Message'),
            'portofolio_homepage' => Yii::t('app', 'Portofolio Homepage'),
            'about_title' => Yii::t('app', 'About Title'),
            'about_message' => Yii::t('app', 'About Message'),
            'team_title' => Yii::t('app', 'Team Title'),
            'team_message_1' => Yii::t('app', 'Team Message 1'),
            'team_message_2' => Yii::t('app', 'Team Message 2'),
            'twitter_account' => Yii::t('app', 'Twitter Account'),
            'facebook_account' => Yii::t('app', 'Facebook Account'),
            'linkedin_account' => Yii::t('app', 'Linkedin Account'),
        ];
    }
}
