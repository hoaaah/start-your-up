<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "services".
 *
 * @property integer $id
 * @property string $title
 * @property string $content
 * @property string $services_icon
 * @property integer $homepage
 *
 * @property Portofolio[] $portofolios
 * @property Portofolio[] $portofolios0
 * @property Portofolio[] $portofolios1
 */
class Services extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'services';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['title', 'content', 'services_icon', 'homepage'], 'required'],
            [['homepage'], 'integer'],
            [['title'], 'string', 'max' => 50],
            [['content', 'services_icon'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'title' => Yii::t('app', 'Title'),
            'content' => Yii::t('app', 'Content'),
            'services_icon' => Yii::t('app', 'Services Icon'),
            'homepage' => Yii::t('app', 'Homepage'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPortofolios()
    {
        return $this->hasMany(Portofolio::className(), ['service_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPortofolios0()
    {
        return $this->hasMany(Portofolio::className(), ['service_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPortofolios1()
    {
        return $this->hasMany(Portofolio::className(), ['service_id' => 'id']);
    }
}
