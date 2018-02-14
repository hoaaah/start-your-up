<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\Articles */

$this->title = $model->title;
$this->params['breadcrumbs'][] = ['label' => 'Articles', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="articles-view">

    <div class="panel panel-default">
        <div class="panel-heading">
            <h3 class="panel-title"><?= Html::a(Html::encode($model->title), ['view', 'id' => $model->id]) ?></h3>
        </div>
        <div class="panel-body">
            <?= $model->content ?>
        </div>
    </div>

</div>
