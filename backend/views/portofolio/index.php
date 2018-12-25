<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\PortofolioSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Portofolios';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="portofolio-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Portofolio', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            [
                'label' => 'Portofolio',
                'format' => 'raw',
                'value' => function($model) {
                    $response = Yii::$app->getResponse();
                    IF($model->image) return Html::img(Url::to(['/site/image', 'cat' => 1, 'id' => $model->id]),
                        ['width' => '70px', 'title' => $model->title, 'alt' => $model->title]
                    );
                }
            ],
            [
                'label' => 'Services',
                'attribute' => 'service_id',
                'value' => 'service.title',
            ],
            'title',
            'short_explanation',
            // 'image',
            // 'content:ntext',
            // 'link',
            // 'client',
            // 'published',
            // 'created_at',
            // 'updated_at',
            // 'created_by',
            // 'updated_by',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
