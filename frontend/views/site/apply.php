<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use common\models\Portofolio;
use kartik\widgets\Select2;
use yii\captcha\Captcha;

/* @var $this yii\web\View */
/* @var $model common\models\Articles */
/* @var $form yii\widgets\ActiveForm */

$this->title = 'Apply Quotation';
?>

<div class="articles-form">
    <em>
        Silakan isi informasi permintaan Quotation anda atas portofolio produk tersebut. Lengkapi alamat dan nomor kontak anda agar kami dapat dengan mudah menghubungi anda.
    </em>

    <?php $form = ActiveForm::begin(); ?>

    <?php
    $portofolioList =  ArrayHelper::map(Portofolio::find()->all(),'id','title');
    echo $form->field($model, 'product_request')->widget(Select2::classname(), [
        'data' => $portofolioList,
        'options' => ['placeholder' => 'Select Product ...'],
        'pluginOptions' => [
            'allowClear' => true,
            'disabled' => true,
        ],
    ]);
    ?>    
    <div class="row">
        <div class="col-md-6">
            <?= $form->field($model, 'customer_name')->textInput() ?>
        </div>
        <div class="col-md-6">
            <?= $form->field($model, 'customer_email')->textInput() ?>
        </div>
    </div>

    <div class="row">
        <div class="col-md-6">
            <?= $form->field($model, 'customer_address')->textInput() ?>
        </div>
        <div class="col-md-6">
            <?= $form->field($model, 'customer_contact')->textInput() ?>
        </div>
    </div>

    <div class="row">
        <div class="col-md-10">
            <?= $form->field($model, 'request_detail')->textarea(['rows' => 6]) ?>
        </div>
        <div class="col-md-2">
            <?= $form->field($model, 'verifyCode')->widget(Captcha::className()) ?>
        </div>
    </div>


    <div class="form-group">
        <?= Html::submitButton('<i class="glyphicon glyphicon-send"></i> Send Request' , ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>
</div>