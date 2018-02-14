<?php

use yii\helpers\Html;
use yii\helpers\StringHelper;

$this->title = 'Articles';
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="panel panel-default">
    <div class="panel-heading">
        <h3 class="panel-title"><?= Html::a(Html::encode($model->title), ['view', 'id' => $model->id]) ?></h3>
    </div>
    <div class="panel-body">
        <?= StringHelper::truncate($model->content, 500, Html::a(" read more...", ['view', 'id' => $model->id]), null, true) ?>
    </div>
</div>
