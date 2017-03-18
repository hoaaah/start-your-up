<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\Location */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="location-form">

    <?php $form = ActiveForm::begin(['id' => $model->formName()]); ?>

    <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'address')->widget(\bizley\quill\Quill::className(), [
        'toolbarOptions' => \bizley\quill\Quill::TOOLBAR_FULL,
    ]) ?>

    <?php
    if($model->lat <> NULL){
        $model->coordinate = '('.$model->lat.','.$model->lng.')';
    }
    echo $form->field($model, 'coordinate')->widget('kolyunya\yii2\widgets\MapInputWidget',
    [
        'key' => Yii::$app->params['googleApiKey'],
        'latitude' => Yii::$app->params['initialMapLatitude'],
        'longitude' => Yii::$app->params['initialMapLongitude'],
        'zoom' => Yii::$app->params['initialMapZoom'],
        'width' => '1000px',
        'height' => '400px',
        'animateMarker' => true,
        'alignMapCenter' => false,
        'enableSearchBar' => true,

    ]
    ); ?>    

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>