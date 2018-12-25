<?php

use yii\helpers\Html;
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $model common\models\Articles */
/* @var $form yii\widgets\ActiveForm */

/* we will make this page redirect to home after 10 seconds */
$returnUri = Url::to(['/'], true);

$this->title = 'Apply Quotation';
?>

<div class="articles-form">
    <div class="bs-example" data-example-id="glyphicons-accessibility">
        <div class="alert alert-<?= $status === 1 ? 'info' : 'danger' ?>" role="alert">
            <span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span> 
            <span class="sr-only">Error:</span> <?= $message ?>
            <p>
                <em>If you aren't redirected after <b class="countDown">10</b> seconds. Click button below</em>
            </p> 
            <?= Html::a('<i class="glyphicon glyphicon-home"></i> Return to dashboard', ['/'], ['class' => 'btn btn-success']) ?>
        </div>
    </div>
</div>
<?php 
$this->registerJS(<<<JS
    var sec = $('.countDown').text() || 0;
    var timer = setInterval(function() { 
        $('.countDown').text(--sec);
        if (sec == 0) {
            clearInterval(timer);
            window.location.replace("$returnUri");
        } 
    }, 1000);
JS
);
?>