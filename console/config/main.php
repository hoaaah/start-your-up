<?php
$params = array_merge(
    require(__DIR__ . '/../../common/config/params.php'),
    require(__DIR__ . '/../../common/config/params-local.php'),
    require(__DIR__ . '/params.php'),
    require(__DIR__ . '/params-local.php')
);

return [
    'id' => 'app-console',
    'basePath' => dirname(__DIR__),
    'bootstrap' => ['log', 'podium'],
    'controllerNamespace' => 'console\controllers',
    'controllerMap' => [
        'fixture' => [
            'class' => 'yii\console\controllers\FixtureController',
            'namespace' => 'common\fixtures',
          ],
    ],
    'components' => [
        'log' => [
            'targets' => [
                [
                    'class' => 'yii\log\FileTarget',
                    'levels' => ['error', 'warning'],
                ],
            ],
        ],
        'mailer' => [
            'class' => 'yii\swiftmailer\Mailer',
            // 'useFileTransport' => true, //false
            // 'transport' => [
            //     'class' => 'Swift_SmtpTransport',
            //     'host' => 'localhost',
            //     // 'username' => 'SMTP username',
            //     // 'password' => 'SMTP password',
            //     'port' => '25', // optional
            //     // 'encryption' => 'SMTP encryption', // optional
            // ],
        ],
    ],
    'modules' => [
        'podium' => 'bizley\podium\Podium',
    ],
    'params' => $params,
];
