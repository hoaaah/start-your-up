<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\Portofolio */

$this->title = 'Create Portofolio';
$this->params['breadcrumbs'][] = ['label' => 'Portofolios', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="portofolio-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
