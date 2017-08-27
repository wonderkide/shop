<?php
return [
    'vendorPath' => dirname(dirname(__DIR__)) . '/vendor',
    'components' => [
        'cache' => [
            'class' => 'yii\caching\FileCache',
        ],
        'authManager' => [
            'class' => 'yii\rbac\DbManager',
        ],
        /*'request' => [
            'enableCsrfValidation' => false
        ],*/
        'urlManager' => require(__DIR__ . '/url.php'),
    ],
];
