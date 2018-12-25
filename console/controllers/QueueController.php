<?php

namespace console\controllers;

use yii\console\Controller;

/**
 * Queue Controller. In this controller we will have any queue job
 * @param actionIndex are for testing only
 * @param actionSend will be use to send email from mailqueue components
 */
class QueueController extends Controller
{
    public $message;
    
    public function options($actionID)
    {
        return ['message'];
    }
    
    public function optionAliases()
    {
        return ['m' => 'message'];
    }
    
    public function actionIndex()
    {
        echo $this->message . "\n";
    }

    /**
     * this action will process mailqueue
     * properly run with cronjob below
     * *\/10 * * * * php /var/www/html/myapp/yii mailqueue/process
     * that cronjob will run every 10s
     */
    public function actionSend()
    {
        Yii::$app->mailqueue->process();
    }
}