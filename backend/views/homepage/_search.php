<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\CompanySearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="company-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id')->textInput(
                ['class' => 'form-control input-sm pull-right','placeholder' => Yii::t('app', 'id')])->label(false) ?>

    <?= $form->field($model, 'company_name')->textInput(
                ['class' => 'form-control input-sm pull-right','placeholder' => Yii::t('app', 'company_name')])->label(false) ?>

    <?= $form->field($model, 'lead_message')->textInput(
                ['class' => 'form-control input-sm pull-right','placeholder' => Yii::t('app', 'lead_message')])->label(false) ?>

    <?= $form->field($model, 'intro_message')->textInput(
                ['class' => 'form-control input-sm pull-right','placeholder' => Yii::t('app', 'intro_message')])->label(false) ?>

    <?= $form->field($model, 'services_button')->textInput(
                ['class' => 'form-control input-sm pull-right','placeholder' => Yii::t('app', 'services_button')])->label(false) ?>

    <?php // echo $form->field($model, 'service_title') ?>

    <?php // echo $form->field($model, 'service_message') ?>

    <?php // echo $form->field($model, 'service_homepage') ?>

    <?php // echo $form->field($model, 'portofolio_title') ?>

    <?php // echo $form->field($model, 'portofolio_message') ?>

    <?php // echo $form->field($model, 'portofolio_homepage') ?>

    <?php // echo $form->field($model, 'about_title') ?>

    <?php // echo $form->field($model, 'about_message') ?>

    <?php // echo $form->field($model, 'team_title') ?>

    <?php // echo $form->field($model, 'team_message_1') ?>

    <?php // echo $form->field($model, 'team_message_2') ?>

    <?php // echo $form->field($model, 'twitter_account') ?>

    <?php // echo $form->field($model, 'facebook_account') ?>

    <?php // echo $form->field($model, 'linkedin_account') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
