<?php

use yii\helpers\Html;
use kartik\grid\GridView;
use yii\bootstrap\Modal;
use kartik\detail\DetailView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\CompanySearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Homepage';
$this->params['breadcrumbs'][] = $this->title;
?>
<?php IF(isset($model)){
    echo DetailView::widget([
        'model' => $model,
        'condensed'=>true,
        'hover'=>true,
        'mode'=>DetailView::MODE_VIEW,
        'enableEditMode' => true,
        'hideIfEmpty' => false, //sembunyikan row ketika kosong
        'panel'=>[
            'heading'=>'<i class="fa fa-tag"></i> Homepage Global Setting</h3>',
            'type'=>'primary',
            'headingOptions' => [
                'tag' => 'h3', //tag untuk heading
            ],
        ],
        'buttons1' => '{update}', // tombol mode default, default '{update} {delete}'
        'buttons2' => '{save} {view}', // tombol mode kedua, default '{view} {reset} {save}'
        'viewOptions' => [
            'label' => '<span class="glyphicon glyphicon-remove-circle"></span>',
        ],      
        'attributes' => [
            // [
            //     'attribute' => 'nama_sekolah',
            //     'displayOnly' => true,
            // ],
            // [
            //     'attribute' => 'negeri',
            //     'value' => $model->negeri == 1 ? 'Sekolah Negeri' : 'Sekolah Swasta/Dibawah Kementerian',
            //     'displayOnly' => true,
            // ],
            'company_name',
            [
                'columns' => [
                    [
                        'attribute'=>'lead_message', 
                    ],
                    [
                        'attribute'=>'intro_message', 
                        // 'valueColOptions'=>['style'=>'width:30%']
                    ],
                    [
                        'attribute'=>'services_button', 
                    ],                    
                ],
            ], 
            [
                'columns' => [
                    [
                        'attribute'=>'service_title', 
                        'valueColOptions'=>['style'=>'width:15%']
                    ],
                    [
                        'attribute'=>'service_message', 
                        'label' => 'Message',
                        'valueColOptions'=>['style'=>'width:15%']
                    ],
                    [
                        'attribute' => 'service_homepage',
                        'label' => 'Homepage',
                        'value' => $model->service_homepage,
                        'type'=>DetailView::INPUT_SELECT2, 
                        'widgetOptions'=>[
                            'data'=>[
                                4 => '4 Items',
                                8 => '8 Items',
                                12 => '12 Items',

                            ],
                            'options'=>['placeholder'=>'Services Displayed ...'],
                            'pluginOptions'=>['allowClear'=>true]
                        ],
                        'valueColOptions'=>['style'=>'width:30%']
                    ],
                ],
            ], 
            [
                'columns' => [
                    [
                        'attribute'=>'portofolio_title', 
                        'valueColOptions'=>['style'=>'width:15%']
                    ],
                    [
                        'attribute'=>'portofolio_message', 
                        'label' => 'Message',
                        'valueColOptions'=>['style'=>'width:15%']
                    ],
                    [
                        'attribute' => 'portofolio_homepage',
                        'label' => 'Homepage',
                        'value' => $model->portofolio_homepage,
                        'type'=>DetailView::INPUT_SELECT2, 
                        'widgetOptions'=>[
                            'data'=>[
                                3 => '3 Items',
                                6 => '6 Items',
                                9 => '9 Items',

                            ],
                            'options'=>['placeholder'=>'Portofolio Displayed ...'],
                            'pluginOptions'=>['allowClear'=>true]
                        ],
                        'valueColOptions'=>['style'=>'width:30%']
                    ],
                ],
            ],
            [
                'columns' => [
                    [
                        'attribute'=>'about_title', 
                    ],
                    [
                        'attribute'=>'about_message', 
                        // 'valueColOptions'=>['style'=>'width:30%']
                    ],
                ],
            ],
            [
                'columns' => [
                    [
                        'attribute'=>'team_title', 
                    ],
                    [
                        'attribute'=>'team_message_1', 
                        // 'valueColOptions'=>['style'=>'width:30%']
                    ],
                    [
                        'attribute'=>'team_message_2', 
                    ],                    
                ],
            ],            
            [
                'columns' => [
                    [
                        'attribute'=>'twitter_account',
                        'label' => '<i class="fa fa-twitter-square"></i> Account'
                    ],
                    [
                        'attribute'=>'facebook_account',
                        'label' => '<i class="fa fa-facebook-square"></i> Account'
                        // 'valueColOptions'=>['style'=>'width:30%']
                    ],
                    [
                        'attribute'=>'linkedin_account',
                        'label' => '<i class="fa fa-linkedin-square"></i> Account' 
                    ],                    
                ],
            ],
        ],
    ]);
}
?>