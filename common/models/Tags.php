<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "tags".
 *
 * @property integer $id
 * @property string $path
 * @property string $title
 * @property integer $created_at
 * @property integer $updated_at
 * @property integer $created_by
 * @property integer $updated_by
 *
 * @property ArticleTags[] $articleTags
 * @property Articles[] $articles
 */
class Tags extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'tags';
    }

    public $input_tags;

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['path', 'title'], 'required'],
            [['created_at', 'updated_at', 'created_by', 'updated_by'], 'integer'],
            [['input_tags'], 'safe'],
            [['path', 'title'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'path' => 'Path',
            'title' => 'Title',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
            'created_by' => 'Created By',
            'updated_by' => 'Updated By',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getArticleTags()
    {
        return $this->hasMany(ArticleTags::className(), ['tag_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getArticles()
    {
        return $this->hasMany(Articles::className(), ['id' => 'article_id'])->viaTable('article_tags', ['tag_id' => 'id']);
    }
}
