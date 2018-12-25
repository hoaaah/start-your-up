<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

?>

<em>You request a quotation for product called <b><?= $portofolio->title ?></b>. Here are detail of your request.</em>

<?= DetailView::widget([
    'model' => $model,
    'attributes' => [
        'customer_name',
        'customer_email',
        'customer_contact',
        'request_detail:html',
        'date_of_request:date',
    ],
]) ?>

<em>We will answer your request immediately via email or you contact number.</em>
</br>
<p><i>Regards.</i></p>
<?= Yii::$app->name ?> Team