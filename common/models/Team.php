<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "team".
 *
 * @property integer $id
 * @property string $name
 * @property string $job
 * @property string $content
 * @property string $twitter_account
 * @property string $facebook_account
 * @property string $linkedin_account
 * @property string $avatar
 * @property integer $created_at
 * @property integer $updated_at
 * @property integer $created_by
 * @property integer $updated_by
 */
class Team extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'team';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name', 'job'], 'required'],
            [['content'], 'string'],
            [['created_at', 'updated_at', 'created_by', 'updated_by'], 'integer'],
            [['name', 'job', 'twitter_account', 'facebook_account', 'linkedin_account'], 'string', 'max' => 100],
            [['avatar'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'name' => Yii::t('app', 'Name'),
            'job' => Yii::t('app', 'Job'),
            'content' => Yii::t('app', 'Content'),
            'twitter_account' => Yii::t('app', 'Twitter Account'),
            'facebook_account' => Yii::t('app', 'Facebook Account'),
            'linkedin_account' => Yii::t('app', 'Linkedin Account'),
            'avatar' => Yii::t('app', 'Avatar'),
            'created_at' => Yii::t('app', 'Created At'),
            'updated_at' => Yii::t('app', 'Updated At'),
            'created_by' => Yii::t('app', 'Created By'),
            'updated_by' => Yii::t('app', 'Updated By'),
        ];
    }
}
