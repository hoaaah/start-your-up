<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\Company */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="company-form">

    <?php $form = ActiveForm::begin(['id' => $model->formName()]); ?>

    <?= $form->field($model, 'company_name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'lead_message')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'intro_message')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'services_button')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'service_title')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'service_message')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'service_homepage')->textInput() ?>

    <?= $form->field($model, 'portofolio_title')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'portofolio_message')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'portofolio_homepage')->textInput() ?>

    <?= $form->field($model, 'about_title')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'about_message')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'team_title')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'team_message_1')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'team_message_2')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'twitter_account')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'facebook_account')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'linkedin_account')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
<?php IF($model->isNewRecord){

$script = <<<JS
$('form#{$model->formName()}').on('beforeSubmit',function(e)
{
    var \$form = $(this);
    $.post(
        \$form.attr("action"), //serialize Yii2 form 
        \$form.serialize()
    )
        .done(function(result){
            if(result == 1)
            {
                $("#myModal").modal('hide'); //hide modal after submit
                //$(\$form).trigger("reset"); //reset form to reuse it to input
                $.pjax.reload({container:'#company-pjax'});
            }else
            {
                $("#message").html(result);
            }
        }).fail(function(){
            console.log("server error");
        });
    return false;
});

JS;
$this->registerJs($script);
}ELSE{

$script = <<<JS
$('form#{$model->formName()}').on('beforeSubmit',function(e)
{
    var \$form = $(this);
    $.post(
        \$form.attr("action"), //serialize Yii2 form 
        \$form.serialize()
    )
        .done(function(result){
            if(result == 1)
            {
                $("#myModalubah").modal('hide'); //hide modal after submit
                //$(\$form).trigger("reset"); //reset form to reuse it to input
                $.pjax.reload({container:'#company-pjax'});
            }else
            {
                $("#message").html(result);
            }
        }).fail(function(){
            console.log("server error");
        });
    return false;
});

JS;
$this->registerJs($script);
}
?>