<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use bizley\quill\Quill;
use kartik\widgets\SwitchInput;
use kartik\file\FileInput;

/* @var $this yii\web\View */
/* @var $model common\models\Partner */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="partner-form">


    <?php $form = ActiveForm::begin([
        'id' => $model->formName(), 
        'options'=>['enctype'=>'multipart/form-data']
    ]); ?>

    <?= $form->field($model, 'file')->widget(FileInput::classname(), [
        'options' => ['accept' => 'image/*'],
        'pluginOptions'=>['allowedFileExtensions'=>['jpg','gif','png']],
    ]);    
    ?>

    <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'job')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'content')->widget(\bizley\quill\Quill::className(), [
        'toolbarOptions' => Quill::TOOLBAR_FULL,
    ]) ?>

    <div class="col-md-4">

    <?= $form->field($model, 'twitter_account')->textInput(['maxlength' => true])->label('<i class="fa fa-twitter-square"></i> Account') ?>

    </div>
    <div class="col-md-4">

    <?= $form->field($model, 'facebook_account')->textInput(['maxlength' => true])->label('<i class="fa fa-facebook-square"></i> Account') ?>

    </div>
    <div class="col-md-4">
    
    <?= $form->field($model, 'linkedin_account')->textInput(['maxlength' => true])->label('<i class="fa fa-linkedin-square"></i> Account') ?>

    </div>

    <?= $form->field($model, 'homepage')->widget(SwitchInput::classname(), [
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