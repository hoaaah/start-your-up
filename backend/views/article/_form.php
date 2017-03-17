<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use bizley\quill\Quill;
use kartik\widgets\SwitchInput;
use kartik\widgets\Select2;
use kartik\file\FileInput;

/* @var $this yii\web\View */
/* @var $model common\models\Articles */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="articles-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'title')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'content')->widget(\bizley\quill\Quill::className(), [
        'toolbarOptions' => Quill::TOOLBAR_FULL,
    ]) ?>

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
