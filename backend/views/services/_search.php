<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\ServicesSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="services-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id')->textInput(
                ['class' => 'form-control input-sm pull-right','placeholder' => Yii::t('app', 'id')])->label(false) ?>

    <?= $form->field($model, 'title')->textInput(
                ['class' => 'form-control input-sm pull-right','placeholder' => Yii::t('app', 'title')])->label(false) ?>

    <?= $form->field($model, 'content')->textInput(
                ['class' => 'form-control input-sm pull-right','placeholder' => Yii::t('app', 'content')])->label(false) ?>

    <?= $form->field($model, 'services_icon')->textInput(
                ['class' => 'form-control input-sm pull-right','placeholder' => Yii::t('app', 'services_icon')])->label(false) ?>

    <?= $form->field($model, 'homepage')->textInput(
                ['class' => 'form-control input-sm pull-right','placeholder' => Yii::t('app', 'homepage')])->label(false) ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
