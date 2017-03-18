<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "articles".
 *
 * @property integer $id
 * @property string $title
 * @property string $content
 * @property integer $published
 * @property integer $archived
 * @property integer $created_at
 * @property integer $updated_at
 * @property integer $created_by
 * @property integer $updated_by
 */
class Homepage extends \yii\db\ActiveRecord
{

    public $services;
    public $portofolio;
    public $about;
    public $team;
    public $partner;

    // first we create maximum validation for each field
    function limit(){
        $limit =  \common\models\Company::findOne(1);
        return $limit;
    }

    public function rules()
    {
        return [
            [['services', 'portofolio', 'about', 'team', 'partner'], 'safe'],
        ];
    }

    public function attributeLabels()
    {
        return [
            'services' => 'Services',
            'portofolio' => 'Portofolio',
            'about' => 'About',
            'team' => 'Team',
            'partner' => 'Partner',
        ];
    }
      
}
