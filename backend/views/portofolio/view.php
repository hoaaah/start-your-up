<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\Portofolio */

$this->title = $model->title;
$this->params['breadcrumbs'][] = ['label' => 'Portofolios', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="portofolio-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            [
                'label' => 'Service',
                'attribute' => 'service.title',
            ],
            'title',
            'short_explanation',
            'image',
            'content:raw',
            'link:url',
            'client',
            'published',
            'created_at:datetime',
            'updated_at:datetime',
            'created_by',
            'updated_by',
        ],
    ]) ?>

</div>
