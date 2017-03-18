<?php
$params = file_exists(__DIR__ . '/params-local.php');
// $params = require(__DIR__ . '/params-locali.php');
IF($params === false){
    $params = require(__DIR__ . '/params.php');
}ELSE{
    $params = require(__DIR__ . '/params-local.php');
}

return [
    'vendorPath' => dirname(dirname(__DIR__)) . '/vendor',
    'components' => [
        'cache' => [
            'class' => 'yii\caching\FileCache',
        ],
        'assetManager' => [
            'bundles' => [
                'dosamigos\google\maps\MapAsset' => [
                    'options' => [
                        'key' => $params['googleApiKey'],
                        'language' => 'id',
                        'version' => '3.1.18'
                    ]
                ]
            ]
        ],        
    ],
];
