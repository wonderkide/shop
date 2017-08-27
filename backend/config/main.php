<?php
$params = array_merge(
    require(__DIR__ . '/../../common/config/params.php'),
    require(__DIR__ . '/../../common/config/params-local.php'),
    require(__DIR__ . '/params.php'),
    require(__DIR__ . '/params-local.php')
);

return [
    'id' => 'app-backend',
    'name'=> 'My Shop',
    'basePath' => dirname(__DIR__),
    'controllerNamespace' => 'backend\controllers',
    'bootstrap' => ['log'],
    'modules' => [],
    'components' => [
        'request' => [
            'csrfParam' => '_csrf-backend',
        ],
        'user' => [
            'identityClass' => 'common\models\User',
            'enableAutoLogin' => true,
            'identityCookie' => ['name' => '_identity-backend', 'httpOnly' => true],
        ],
        'session' => [
            // this is the name of the session cookie used for login on the backend
            'name' => 'advanced-backend',
        ],
        'log' => [
            'traceLevel' => YII_DEBUG ? 3 : 0,
            'targets' => [
                [
                    'class' => 'yii\log\FileTarget',
                    'levels' => ['error', 'warning'],
                ],
            ],
        ],
        'errorHandler' => [
            'errorAction' => 'site/error',
        ],
        /*
        'urlManager' => [
            'enablePrettyUrl' => true,
            'showScriptName' => false,
            'rules' => [
            ],
        ],
        */
        'view' => [
            'theme' => [
                'pathMap' => [
                    '@backend/views' => '@backend/themes/adminlte/views'
                ],
            ],
        ],
        //can name it whatever you want as it is custom
        /*'urlManagerFrontend' => [
                'class' => 'yii\web\urlManager',
                'baseUrl' => '@frontend',//i.e. $_SERVER['DOCUMENT_ROOT'] .'/yiiapp/web/'
                'enablePrettyUrl' => true,
                'showScriptName' => false,
        ],*/
        
    ],
    'aliases' => [
        //'@WDAsset' => '@app/themes/wonderkide/assets',
        //'@UploadAsset' => '@app/themes/wonderkide/assets/jquery-fileupload',
        //'@BEAsset' => '@app/themes/admin/views/layouts',
        //'@BRUSHAsset' => '@app/themes/brushed/assets',
        //'@WHITEAsset' => '@app/themes/white/assets',
        '@admAsset' => '@backend/themes/adminlte/assets',
    ],
    'params' => $params,
];
