<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\grid\GridView;
use yii\bootstrap\Modal;
use kartik\detail\DetailView;
use dosamigos\multiselect\MultiSelect;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\CompanySearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Homepage';
$this->params['breadcrumbs'][] = $this->title;
?>
<?php 
IF(isset($model)):
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
                        'format'=>'raw',
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
                        'format'=>'raw',
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
                        'format'=>'raw',
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
                        'format'=>'raw',
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
                        'format'=>'raw',
                        // 'valueColOptions'=>['style'=>'width:30%']
                    ],
                    [
                        'attribute'=>'team_message_2', 
                        'format'=>'raw',
                    ],                    
                ],
            ],
            [
                'columns' => [
                    [
                        'attribute'=>'enable_forum', 
                        'format'=>'raw',
                        'value'=>$model->enable_forum ? '<span class="label label-success">Yes</span>' : '<span class="label label-danger">No</span>',
                        'type'=>DetailView::INPUT_SWITCH,
                        'widgetOptions' => [
                            'pluginOptions' => [
                                'onText' => 'Yes',
                                'offText' => 'No',
                            ]
                        ],
                    ],
                    [
                        'attribute'=>'enable_quote_request',
                        'label' => 'Enable Quotation Request',
                        'format'=>'raw',
                        'value'=>$model->enable_quote_request ? '<span class="label label-success">Yes</span>' : '<span class="label label-danger">No</span>',
                        'type'=>DetailView::INPUT_SWITCH,
                        'widgetOptions' => [
                            'pluginOptions' => [
                                'onText' => 'Yes',
                                'offText' => 'No',
                            ]
                        ],
                    ],
                    [
                        'attribute' => 'enable_articles',
                        'format'=>'raw',
                        'value'=>$model->enable_articles ? '<span class="label label-success">Yes</span>' : '<span class="label label-danger">No</span>',
                        'type'=>DetailView::INPUT_SWITCH,
                        'widgetOptions' => [
                            'pluginOptions' => [
                                'onText' => 'Yes',
                                'offText' => 'No',
                            ]
                        ],
                    ],
                ],
            ],
            [
                'columns' => [
                    [
                        'attribute'=>'enable_portofolio', 
                        'format'=>'raw',
                        'value'=>$model->enable_portofolio ? '<span class="label label-success">Yes</span>' : '<span class="label label-danger">No</span>',
                        'type'=>DetailView::INPUT_SWITCH,
                        'widgetOptions' => [
                            'pluginOptions' => [
                                'onText' => 'Yes',
                                'offText' => 'No',
                            ]
                        ],
                    ],
                    [
                        'attribute'=>'enable_team',
                        'format'=>'raw',
                        'value'=>$model->enable_team ? '<span class="label label-success">Yes</span>' : '<span class="label label-danger">No</span>',
                        'type'=>DetailView::INPUT_SWITCH,
                        'widgetOptions' => [
                            'pluginOptions' => [
                                'onText' => 'Yes',
                                'offText' => 'No',
                            ]
                        ],
                    ],
                    [
                        'attribute' => 'enable_contact',
                        'format'=>'raw',
                        'value'=>$model->enable_contact ? '<span class="label label-success">Yes</span>' : '<span class="label label-danger">No</span>',
                        'type'=>DetailView::INPUT_SWITCH,
                        'widgetOptions' => [
                            'pluginOptions' => [
                                'onText' => 'Yes',
                                'offText' => 'No',
                            ]
                        ],
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
?>
    <div class="panel panel-primary">
        <div class="panel-heading">Selected in Homepage</div>
        <div class="panel-body">
            <?php $form = ActiveForm::begin(['id' => $homepage->formName()]); ?>
            <?=
            $form->field($homepage, 'services')->widget(Multiselect::className(), [
                "options" => ['multiple'=>"multiple"], // for the actual multiselect
                'data' => $services ? $services : ['' => 'No Data, Please Input Services first!'],
                "clientOptions" => 
                    [
                        "includeSelectAllOption" => $services ? true : false,
                        'numberDisplayed' => 10
                    ], 
            ]);           
            ?>

            <?=
            $form->field($homepage, 'portofolio')->widget(Multiselect::className(), [
                "options" => ['multiple'=>"multiple"], // for the actual multiselect
                'data' => $portofolio ? $portofolio : ['' => 'No Data, Please Input Porfofolio first!'],
                "clientOptions" => 
                    [
                        "includeSelectAllOption" => $portofolio ? true : false,
                        'numberDisplayed' => 10
                    ], 
            ]);           
            ?>

            <?=
            $form->field($homepage, 'team')->widget(Multiselect::className(), [
                "options" => ['multiple'=>"multiple"], // for the actual multiselect
                'data' => $team ? $team : ['' => 'No Data, Please Input Team Member first!'],
                "clientOptions" => 
                    [
                        "includeSelectAllOption" => $team ? true : false,
                        'numberDisplayed' => 10
                    ], 
            ]);           
            ?>

            <?=
            $form->field($homepage, 'partner')->widget(Multiselect::className(), [
                "options" => ['multiple'=>"multiple"], // for the actual multiselect
                'data' => $partner ? $partner : ['' => 'No Data, Please Input Partner first!'],
                "clientOptions" => 
                    [
                        "includeSelectAllOption" => $partner ? true : false,
                        'numberDisplayed' => 10
                    ], 
            ]);           
            ?>

            <div class="form-group">
                <?= Html::submitButton('Save', ['class' => 'btn btn-primary']) ?>
            </div>

            <?php ActiveForm::end(); ?>
        </div>
    </div>
<?php    
endif;
?>