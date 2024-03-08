<?php
$params = file_exists(__DIR__ . '/params-local.php');
// $params = require(__DIR__ . '/params-locali.php');
if ($params === false) {
    $params = require(__DIR__ . '/params.php');
} else {
    $params = require(__DIR__ . '/params-local.php');
}

return [
    'aliases' => [
        '@bower' => '@vendor/bower-asset',
        '@npm'   => '@vendor/npm-asset',
    ],
    'vendorPath' => dirname(dirname(__DIR__)) . '/vendor',
    'components' => [
        'cache' => [
            'class' => 'yii\caching\FileCache',
        ],
        'mailer' => [
            'class' => 'yii\swiftmailer\Mailer',
            // send all mails to a file by default. 
            // You have to set 'useFileTransport' to false and configure a transport for the mailer to send real emails.
            // 'useFileTransport' => true,
            'transport' => [
                'class' => 'Swift_SmtpTransport',
                'host' => 'localhost',
                'port' => 25,
            ],
        ],
        'mailqueue' => [
            'class' => 'nterms\mailqueue\MailQueue',
            'table' => '{{%mail_queue}}',
            'mailsPerRound' => 10,
            'maxAttempts' => 3,
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
