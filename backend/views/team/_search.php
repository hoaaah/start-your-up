<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\TeamSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="team-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id')->textInput(
                ['class' => 'form-control input-sm pull-right','placeholder' => Yii::t('app', 'id')])->label(false) ?>

    <?= $form->field($model, 'name')->textInput(
                ['class' => 'form-control input-sm pull-right','placeholder' => Yii::t('app', 'name')])->label(false) ?>

    <?= $form->field($model, 'job')->textInput(
                ['class' => 'form-control input-sm pull-right','placeholder' => Yii::t('app', 'job')])->label(false) ?>

    <?= $form->field($model, 'content')->textInput(
                ['class' => 'form-control input-sm pull-right','placeholder' => Yii::t('app', 'content')])->label(false) ?>

    <?= $form->field($model, 'twitter_account')->textInput(
                ['class' => 'form-control input-sm pull-right','placeholder' => Yii::t('app', 'twitter_account')])->label(false) ?>

    <?php // echo $form->field($model, 'facebook_account') ?>

    <?php // echo $form->field($model, 'linkedin_account') ?>

    <?php // echo $form->field($model, 'avatar') ?>

    <?php // echo $form->field($model, 'homepage') ?>

    <?php // echo $form->field($model, 'created_at') ?>

    <?php // echo $form->field($model, 'updated_at') ?>

    <?php // echo $form->field($model, 'created_by') ?>

    <?php // echo $form->field($model, 'updated_by') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
