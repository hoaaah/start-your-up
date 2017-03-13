<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use bizley\quill\Quill;
use kartik\widgets\SwitchInput;
use kartik\widgets\Select2;
use kartik\file\FileInput;

/* @var $this yii\web\View */
/* @var $model common\models\Portofolio */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="portofolio-form">

    <?php $form = ActiveForm::begin([
        'options'=>['enctype'=>'multipart/form-data'] // important
    ]); ?>

    <?php
    $services =  \yii\helpers\ArrayHelper::map(\common\models\Services::find()->all(),'id','title');
    echo $form->field($model, 'service_id')->widget(Select2::classname(), [
        'data' => $services,
        'options' => ['placeholder' => 'Select Service Type ...'],
        'pluginOptions' => [
            'allowClear' => true
        ],
    ]);    
    //  $form->field($model, 'service_id')->textInput(); 
     ?>

    <?= $form->field($model, 'title')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'short_explanation')->textInput(['maxlength' => true]) ?>

    <?php
    echo $form->field($model, 'file')->widget(FileInput::classname(), [
        'options' => ['accept' => 'image/*'],
        'pluginOptions'=>['allowedFileExtensions'=>['jpg','gif','png']],
    ]);    
    ?>

    <?= $form->field($model, 'content')->widget(\bizley\quill\Quill::className(), [
        'toolbarOptions' => Quill::TOOLBAR_FULL,
    ]) ?>

    <?= $form->field($model, 'link')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'client')->textInput(['maxlength' => true]) ?>

    <?php $model->published = 1;
    echo $form->field($model, 'published')->widget(SwitchInput::classname(), [
        'pluginOptions' => [
            'size' => 'mini',
            'onText' => 'Yes',
            'offText' => 'No',
        ]        
    ]); ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
