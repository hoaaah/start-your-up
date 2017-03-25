<?php
use yii\helpers\Html;
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

$this->title = $model->company_name;
// $directoryAsset = Yii::$app->assetManager->getPublishedUrl('@vendor/hoaaah/yii2-startbootstrap-stylish-portfolio/assets');
$agency = hoaaah\agency\AgencyAsset::register($this);
// <img class="img-portfolio img-responsive" src=<?= $stylish->baseUrl.'/'."img/portfolio-3.jpg"
?>
 
    <!-- Header -->
    <header id="page-top">
        <div class="container">
            <div class="intro-text">
                <div class="intro-lead-in"><?= Html::encode($model->lead_message) ?></div>
                <div class="intro-heading"><?= Html::encode($model->intro_message) ?></div>
                <a href="#services" class="page-scroll btn btn-xl"><?= Html::encode($model->services_button) ?></a>
            </div>
        </div>
    </header>

    <!-- Services Section -->
    <section id="services">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <h2 class="section-heading"><?= Html::encode($model->service_title) ?></h2>
                    <h3 class="section-subheading text-muted"><?= Html::encode($model->service_message) ?></h3>
                </div>
            </div>
            <div class="row text-center">
                <?php
                    $colGiven = $model->service_homepage;
                    $serviceAssigned = \common\models\Services::find()->where(['homepage' => 1])->count('id');
                    $colMin = min($colGiven, $serviceAssigned);
                    switch (true) {
                        case $colMin <= 4:
                            $col1 = 12/$colMin;
                            $col2 = $col3 = NULL;
                            break;
                        case $colMin > 4 :
                            $col1 = 12/4;
                            $colMin <= 8 ? $col2 = 12/($colMin-4) : $col2 = 4;
                            if($colMin > 8) $col3 = 12/($colMin-8);
                            break;
                    }
                    $i = 1;
                    $j = 1;
                    foreach($services as $services):
                ?>
                <div class="col-md-<?php echo ${'col'.$j} ?>">
                    <span class="fa-stack fa-4x">
                        <i class="fa fa-circle fa-stack-2x text-primary"></i>
                        <i class="<?= $services->services_icon ?> fa-stack-1x fa-inverse"></i>
                    </span>
                    <h4 class="service-heading"><?= $services->title ?></h4>
                    <p class="text-muted"><?= $services->content ?></p>
                </div>

                <?php 
                    $i++; 
                    IF(($i%4) == 0 ) $j++; 
                    endforeach; 
                ?>
            </div>
        </div>
    </section>

    <!-- Portfolio Grid Section -->
    <section id="portfolio" class="bg-light-gray">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <h2 class="section-heading"><?= Html::encode($model->portofolio_title) ?></h2>
                    <h3 class="section-subheading text-muted"><?= Html::encode($model->portofolio_message) ?></h3>
                </div>
            </div>
            <div class="row">
                <?php
                    $modalPortofolio = $portofolio;
                    foreach($portofolio as $portofolio):
                ?>            
                <div class="col-md-4 col-sm-6 portfolio-item">
                    <a href="#portfolioModal<?= $portofolio->id ?>" class="portfolio-link" data-toggle="modal">
                        <div class="portfolio-hover">
                            <div class="portfolio-hover-content">
                                <i class="fa fa-plus fa-3x"></i>
                            </div>
                        </div>
                        <img src=<?= Yii::$app->params['uploadUrl'].'/portofolio/'.$portofolio->image ?> class="img-responsive" alt="">
                    </a>
                    <div class="portfolio-caption">
                        <h4><?= Html::encode($portofolio->title) ?></h4>
                        <p class="text-muted"><?= $portofolio->short_explanation ?></p>
                    </div>
                </div>
                <?php 
                    endforeach; 
                ?>
            </div>
        </div>
    </section>

    <!-- About Section -->
    <!--<section id="about">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <h2 class="section-heading"><?= Html::encode($model->about_title) ?></h2>
                    <h3 class="section-subheading text-muted"><?= Html::encode($model->about_message) ?></h3>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <ul class="timeline">
                        <li>
                            <div class="timeline-image">
                                <img class="img-circle img-responsive" src=<?= $agency->baseUrl.'/img/about/1.jpg' ?> alt="">
                            </div>
                            <div class="timeline-panel">
                                <div class="timeline-heading">
                                    <h4>2009-2011</h4>
                                    <h4 class="subheading">Our Humble Beginnings</h4>
                                </div>
                                <div class="timeline-body">
                                    <p class="text-muted">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Sunt ut voluptatum eius sapiente, totam reiciendis temporibus qui quibusdam, recusandae sit vero unde, sed, incidunt et ea quo dolore laudantium consectetur!</p>
                                </div>
                            </div>
                        </li>
                        <li class="timeline-inverted">
                            <div class="timeline-image">
                                <img class="img-circle img-responsive" src=<?= $agency->baseUrl.'/img/about/2.jpg' ?>  alt="">
                            </div>
                            <div class="timeline-panel">
                                <div class="timeline-heading">
                                    <h4>March 2011</h4>
                                    <h4 class="subheading">An Agency is Born</h4>
                                </div>
                                <div class="timeline-body">
                                    <p class="text-muted">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Sunt ut voluptatum eius sapiente, totam reiciendis temporibus qui quibusdam, recusandae sit vero unde, sed, incidunt et ea quo dolore laudantium consectetur!</p>
                                </div>
                            </div>
                        </li>
                        <li>
                            <div class="timeline-image">
                                <img class="img-circle img-responsive" src=<?= $agency->baseUrl.'/img/about/3.jpg' ?>  alt="">
                            </div>
                            <div class="timeline-panel">
                                <div class="timeline-heading">
                                    <h4>December 2012</h4>
                                    <h4 class="subheading">Transition to Full Service</h4>
                                </div>
                                <div class="timeline-body">
                                    <p class="text-muted">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Sunt ut voluptatum eius sapiente, totam reiciendis temporibus qui quibusdam, recusandae sit vero unde, sed, incidunt et ea quo dolore laudantium consectetur!</p>
                                </div>
                            </div>
                        </li>
                        <li class="timeline-inverted">
                            <div class="timeline-image">
                                <img class="img-circle img-responsive" src=<?= $agency->baseUrl.'/img/about/4.jpg' ?>  alt="">
                            </div>
                            <div class="timeline-panel">
                                <div class="timeline-heading">
                                    <h4>July 2014</h4>
                                    <h4 class="subheading">Phase Two Expansion</h4>
                                </div>
                                <div class="timeline-body">
                                    <p class="text-muted">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Sunt ut voluptatum eius sapiente, totam reiciendis temporibus qui quibusdam, recusandae sit vero unde, sed, incidunt et ea quo dolore laudantium consectetur!</p>
                                </div>
                            </div>
                        </li>
                        <li class="timeline-inverted">
                            <div class="timeline-image">
                                <h4>Be Part
                                    <br>Of Our
                                    <br>Story!</h4>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </section>-->

    <!-- Team Section -->
    <section id="team" class="bg-light-gray">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <h2 class="section-heading"><?= Html::encode($model->team_title) ?></h2>
                    <h3 class="section-subheading text-muted"><?= Html::encode($model->team_message_1) ?></h3>
                </div>
            </div>
            <div class="row">
                <?php
                    foreach($team as $team):
                ?>             
                <div class="col-sm-4">
                    <div class="team-member">
                        <img src="<?= Yii::$app->params['uploadUrl'].'/avatar/'.$team->avatar ?>" class="img-responsive img-circle" alt="">
                        <h4><?= Html::encode($team->name) ?></h4>
                        <p class="text-muted"><?= $team->job ?></p>
                        <ul class="list-inline social-buttons">
                            <li><a href="#"><i class="fa fa-twitter"></i></a>
                            </li>
                            <li><a href="#"><i class="fa fa-facebook"></i></a>
                            </li>
                            <li><a href="#"><i class="fa fa-linkedin"></i></a>
                            </li>
                        </ul>
                    </div>
                </div>
                <?php endforeach ; ?>
            </div>
            <div class="row">
                <div class="col-lg-8 col-lg-offset-2 text-center">
                    <p class="large text-muted"><?= Html::encode($model->team_message_2) ?></p>
                </div>
            </div>
        </div>
    </section>

    <!-- Clients Aside -->
    <aside class="clients">
        <div class="container">
            <div class="row">
                <div class="col-md-3 col-sm-6">
                    <a href="#">
                        <img src=<?= $agency->baseUrl.'/img/logos/envato.jpg' ?> class="img-responsive img-centered" alt="">
                    </a>
                </div>
                <div class="col-md-3 col-sm-6">
                    <a href="#">
                        <img src=<?= $agency->baseUrl.'/img/logos/designmodo.jpg' ?> class="img-responsive img-centered" alt="">
                    </a>
                </div>
                <div class="col-md-3 col-sm-6">
                    <a href="#">
                        <img src=<?= $agency->baseUrl.'/img/logos/themeforest.jpg' ?> class="img-responsive img-centered" alt="">
                    </a>
                </div>
                <div class="col-md-3 col-sm-6">
                    <a href="#">
                        <img src=<?= $agency->baseUrl.'/img/logos/creative-market.jpg' ?> class="img-responsive img-centered" alt="">
                    </a>
                </div>
            </div>
        </div>
    </aside>

    <!-- Contact Section -->
    <?php 
        $centerCoordinate = new LatLng(['lat' => Yii::$app->params['initialMapLatitude'], 'lng' => Yii::$app->params['initialMapLongitude']]);
        $map = new Map([
            'containerOptions' => ['id' => 'contact'],
            'center' => $centerCoordinate,
            'zoom' => Yii::$app->params['initialMapZoom'],
            'width' => '100%',
            'height' => '100%',
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
        echo $map->display();
    ?>

    <footer>
        <div class="container">
            <div class="row">
                <div class="col-md-4">
                    <span class="copyright">Copyright &copy; Your Website 2016</span>
                </div>
                <div class="col-md-4">
                    <ul class="list-inline social-buttons">
                        <li><a href="https://twitter.com/<?= $model->twitter_account ?>"><i class="fa fa-twitter"></i></a>
                        </li>
                        <li><a href="https://facebook.com/<?= $model->facebook_account ?>"><i class="fa fa-facebook"></i></a>
                        </li>
                        <li><a href="https://linkedin.com/<?= $model->linkedin_account ?>"><i class="fa fa-linkedin"></i></a>
                        </li>
                    </ul>
                </div>
                <div class="col-md-4">
                    <ul class="list-inline quicklinks">
                        <li><a href="#">Privacy Policy</a>
                        </li>
                        <li><a href="#">Terms of Use</a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </footer>

    <!-- Portfolio Modals -->
    <!-- Use the modals below to showcase details about your portfolio projects! -->
    <?php
        foreach($modalPortofolio as $portofolio):
    ?>    
    <!-- Portfolio Modal 1 -->
    <div class="portfolio-modal modal fade" id="portfolioModal<?= $portofolio->id ?>" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="close-modal" data-dismiss="modal">
                    <div class="lr">
                        <div class="rl">
                        </div>
                    </div>
                </div>
                <div class="container">
                    <div class="row">
                        <div class="col-lg-8 col-lg-offset-2">
                            <div class="modal-body">
                                <!-- Project Details Go Here -->
                                <h2><?= Html::encode($portofolio->title) ?></h2>
                                <p class="item-intro text-muted"><?= $portofolio->short_explanation ?></p>
                                <img class="img-responsive img-centered" src=<?= Yii::$app->params['uploadUrl'].'/portofolio/'.$portofolio->image ?> alt="">
                                <?= $portofolio->content ?>
                                <button type="button" class="btn btn-primary" data-dismiss="modal"><i class="fa fa-times"></i> Close Project</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <?php endforeach; ?>


<?php 
// Register JS
$this->registerJs(<<<JS
    // Disable Google Maps scrolling
    // See http://stackoverflow.com/a/25904582/1607849
    // Disable scroll zooming and bind back the click event
    var onMapMouseleaveHandler = function(event) {
        var that = $(this);
        that.on('click', onMapClickHandler);
        that.off('mouseleave', onMapMouseleaveHandler);
        that.find('iframe').css("pointer-events", "none");
    }
    var onMapClickHandler = function(event) {
            var that = $(this);
            // Disable the click handler until the user leaves the map area
            that.off('click', onMapClickHandler);
            // Enable scrolling zoom
            that.find('iframe').css("pointer-events", "auto");
            // Handle the mouse leave event
            that.on('mouseleave', onMapMouseleaveHandler);
        }
        // Enable map zooming with mouse scroll when the user clicks the map
    $('.map').on('click', onMapClickHandler);
JS
);
?>
<?php 
// IF image background set so line this
// $this->registerCss("
// .header {
//     background: url(".$stylish->baseUrl."/img/bg.jpg) no-repeat center center scroll !important;
// }
// ");
?>