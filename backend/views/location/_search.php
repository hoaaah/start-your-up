<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\LocationSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="location-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id')->textInput(
                ['class' => 'form-control input-sm pull-right','placeholder' => Yii::t('app', 'id')])->label(false) ?>

    <?= $form->field($model, 'name')->textInput(
                ['class' => 'form-control input-sm pull-right','placeholder' => Yii::t('app', 'name')])->label(false) ?>

    <?= $form->field($model, 'address')->textInput(
                ['class' => 'form-control input-sm pull-right','placeholder' => Yii::t('app', 'address')])->label(false) ?>

    <?= $form->field($model, 'lat')->textInput(
                ['class' => 'form-control input-sm pull-right','placeholder' => Yii::t('app', 'lat')])->label(false) ?>

    <?= $form->field($model, 'lng')->textInput(
                ['class' => 'form-control input-sm pull-right','placeholder' => Yii::t('app', 'lng')])->label(false) ?>

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
