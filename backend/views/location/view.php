<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
//googlemaps
use dosamigos\google\maps\LatLng;
use dosamigos\google\maps\services\DirectionsWayPoint;
use dosamigos\google\maps\services\TravelMode;
use dosamigos\google\maps\overlays\PolylineOptions;
use dosamigos\google\maps\services\DirectionsRenderer;
use dosamigos\google\maps\services\DirectionsService;
use dosamigos\google\maps\overlays\InfoWindow;
use dosamigos\google\maps\overlays\Marker;
use dosamigos\google\maps\Map;
use dosamigos\google\maps\services\DirectionsRequest;
use dosamigos\google\maps\overlays\Polygon;
use dosamigos\google\maps\layers\BicyclingLayer;

/* @var $this yii\web\View */
/* @var $model common\models\Location */

$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Locations', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="location-view">

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
    <div class="col-md-8">
    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'name',
            'address:html',
            'lat',
            'lng',
            'created_at',
            'updated_at',
        ],
    ]) ?>
    </div>
    <div class="col-md-4">
        <?php 
        $coord = new LatLng(['lat' => $model->lat, 'lng' => $model->lng]);
        $map = new Map([
            'center' => $coord,
            'zoom' => 16,
            //prefered code
            'width' => '400',
            'height'=>'350',
        ]);
        $marker = new Marker([
            'position' => $coord,
            'title' => $model->name,
        ]);
        // Provide a shared InfoWindow to the marker
        $marker->attachInfoWindow(
            new InfoWindow([
                'content' => '<p><b>'.$model->name.'</b></p><p>'.$model->address.'</p>'
            ])
        );

        // Add marker to the map
        $map->addOverlay($marker);

        // Display the map -finally :)
        echo $map->display();
        ?>    
    </div>
</div>
