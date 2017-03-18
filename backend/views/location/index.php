<?php

use yii\helpers\Html;
use kartik\grid\GridView;
use yii\bootstrap\Modal;
use kartik\tabs\TabsX;
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
/* @var $searchModel backend\models\LocationSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Locations';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="location-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Add Location', ['create'], ['class' => 'btn btn-xs btn-success',]) ?>
    </p>

    <div class "col-md-12">
        <?php 
            $centerCoordinate = new LatLng(['lat' => Yii::$app->params['initialMapLatitude'], 'lng' => Yii::$app->params['initialMapLongitude']]);
            $map = new Map([
                'center' => $centerCoordinate,
                'zoom' => Yii::$app->params['initialMapZoom'],
                'width' => 1000,
                'height' => 400,
            ]);

            foreach($maps as $maps){
                ${'marker'.$maps->id} = new Marker([
                    'position' => (new LatLng(['lat' => $maps->lat, 'lng' => $maps->lng])),
                    'title' => $maps->name,
                ]);
                ${'marker'.$maps->id}->attachInfoWindow(
                    new InfoWindow([
                        'content' => '<h4>'.$maps->name.'</h4></br>'.$maps->address,
                    ])
                );
                $map->addOverlay(${'marker'.$maps->id});
            }

            echo TabsX::widget([
                'bordered'=>true,
                'items' => [
                    [
                        'label' => 'Maps',
                        'content' => '<div class="embed-responsive embed-responsive-16by9">'.
                                        $map->display().'</div>',
                        'active' => true
                    ],
                    [
                        'label' => 'Information',
                        'content' => GridView::widget([
                                    'id' => 'location',    
                                    'dataProvider' => $dataProvider,
                                    'export' => false, 
                                    'responsive'=>true,
                                    'hover'=>true,     
                                    'resizableColumns'=>true,
                                    'panel'=>['type'=>'primary', 'heading'=>$this->title],
                                    'responsiveWrap' => false,        
                                    'toolbar' => [
                                        [
                                            // 'content' => $this->render('_search', ['model' => $searchModel]),
                                        ],
                                    ],       
                                    'pager' => [
                                        'firstPageLabel' => 'First',
                                        'lastPageLabel'  => 'Last'
                                    ],
                                    'pjax'=>true,
                                    'pjaxSettings'=>[
                                        'options' => ['id' => 'location-pjax', 'timeout' => 5000],
                                    ],        
                                    'filterModel' => $searchModel,
                                    'columns' => [
                                        ['class' => 'yii\grid\SerialColumn'],

                                        'id',
                                        'name',
                                        'address:html',
                                        'lat',
                                        'lng',
                                        // 'created_at',
                                        // 'updated_at',
                                        // 'created_by',
                                        // 'updated_by',

                                        [
                                            'class' => 'kartik\grid\ActionColumn',
                                            'noWrap' => true,
                                        ],
                                    ],
                                ])
                    ],
                ],
            ]);
        ?>
    </div>
</div>