<?php

namespace common\models;

use Yii;
use yii\behaviors\TimestampBehavior;
use yii\behaviors\BlameableBehavior;

/**
 * This is the model class for table "portofolio".
 *
 * @property integer $id
 * @property integer $service_id
 * @property string $title
 * @property string $short_explanation
 * @property string $image
 * @property string $content
 * @property string $link
 * @property string $client
 * @property integer $published
 * @property string $created_at
 * @property string $updated_at
 * @property integer $created_by
 * @property integer $updated_by
 *
 * @property Services $service
 * @property Services $service0
 * @property Services $service1
 */
class Portofolio extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'portofolio';
    }

    public $file;

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['service_id', 'published', 'created_by', 'updated_by'], 'integer'],
            [['title'], 'required'],
            [['content'], 'string'],
            [['created_at', 'updated_at'], 'safe'],
            [['title'], 'string', 'max' => 20],
            [['short_explanation'], 'string', 'max' => 50],
            [['image', 'link', 'file', 'client'], 'string', 'max' => 255],
            [['file'], 'safe'],
            [['file'], 'file', 'extensions'=>'jpg, gif, png', 'maxFiles' => 1, 'maxSize' => 500000],
            [['service_id'], 'exist', 'skipOnError' => true, 'targetClass' => Services::className(), 'targetAttribute' => ['service_id' => 'id']],
            [['service_id'], 'exist', 'skipOnError' => true, 'targetClass' => Services::className(), 'targetAttribute' => ['service_id' => 'id']],
            [['service_id'], 'exist', 'skipOnError' => true, 'targetClass' => Services::className(), 'targetAttribute' => ['service_id' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'service_id' => Yii::t('app', 'Service ID'),
            'title' => Yii::t('app', 'Title'),
            'short_explanation' => Yii::t('app', 'Short Explanation'),
            'image' => Yii::t('app', 'Image'),
            'file' => Yii::t('app', 'Image'),
            'content' => Yii::t('app', 'Content'),
            'link' => Yii::t('app', 'Link'),
            'client' => Yii::t('app', 'Client'),
            'published' => Yii::t('app', 'Published'),
            'created_at' => Yii::t('app', 'Created At'),
            'updated_at' => Yii::t('app', 'Updated At'),
            'created_by' => Yii::t('app', 'Created By'),
            'updated_by' => Yii::t('app', 'Updated By'),
        ];
    }

    public function behaviors()
    {
        return [
            TimestampBehavior::className(),
            BlameableBehavior::className(),
        ];
    }     

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getService()
    {
        return $this->hasOne(Services::className(), ['id' => 'service_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getService0()
    {
        return $this->hasOne(Services::className(), ['id' => 'service_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getService1()
    {
        return $this->hasOne(Services::className(), ['id' => 'service_id']);
    }
}
