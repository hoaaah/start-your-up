<?php

namespace common\models;

use Yii;
use yii\behaviors\TimestampBehavior;

/**
 * This is the model class for table "quotation_request".
 *
 * @property int $id
 * @property string $date_of_request
 * @property string $partner_category
 * @property string $customer_name
 * @property string $customer_email
 * @property string $customer_address
 * @property string $customer_contact
 * @property int $product_request
 * @property string $request_detail
 * @property int $created_at
 * @property int $updated_at
 */
class QuotationRequest extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'quotation_request';
    }

    public $verifyCode;

    /**
     * {@inheritdoc}
     * we will add @param verifyCode for capctha field
     */
    public function rules()
    {
        return [
            [['date_of_request', 'customer_name', 'customer_email', 'product_request'], 'required'],
            [['date_of_request'], 'safe'],
            [['product_request', 'created_at', 'updated_at'], 'integer'],
            [['request_detail'], 'string'],
            [['partner_category', 'customer_name', 'customer_email', 'customer_contact'], 'string', 'max' => 100],
            [['customer_address'], 'string', 'max' => 255],
            [['customer_email'], 'email'],
            ['verifyCode', 'captcha'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'date_of_request' => 'Date Of Request',
            'partner_category' => 'Partner Category',
            'customer_name' => 'Customer Name',
            'customer_email' => 'Customer Email',
            'customer_address' => 'Customer Address',
            'customer_contact' => 'Customer Contact',
            'product_request' => 'Product Request',
            'request_detail' => 'Request Detail',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
        ];
    }

    /**
     * after model saved we will send email to requester and administrator
     * Email will send via queue or directly. It based on your @param useMailQueue
     * if @param useMailQueue value is enable, it will use queue, if disable it will send directly
     */
    public function afterSave($insert, $changedAttributes)
    {
            $portofolio = \common\models\Portofolio::findOne(['id' => $this->product_request]);

            if(Yii::$app->params['useMailQueue'] === 'enable'){
                Yii::$app->mailqueue->compose('quotation/request', ['model' => $this, 'portofolio' => $portofolio])
                ->setFrom(Yii::$app->params['supportEmail'])
                ->setTo($this->customer_email)
                ->setBcc (Yii::$app->params['adminEmail'])
                ->setSubject('Quotation Request for '.$portofolio->title)
                ->queue();
            }

            if(Yii::$app->params['useMailQueue'] === 'disable'){
                Yii::$app->mailqueue->compose('quotation/request', ['model' => $this, 'portofolio' => $portofolio])
                ->setFrom(Yii::$app->params['supportEmail'])
                ->setTo($this->customer_email)
                ->setBcc (Yii::$app->params['adminEmail'])
                ->setSubject('Quotation Request for '.$portofolio->title)
                ->send();
            }

        parent::afterSave($insert, $changedAttributes);
    }

    public function behaviors()
    {
        return [
            TimestampBehavior::className(),
        ];
    }      
}
