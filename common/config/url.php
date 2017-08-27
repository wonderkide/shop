<?php

return [
            'enablePrettyUrl' => TRUE,
            'showScriptName' => FALSE,
            'enableStrictParsing' => FALSE,
            'rules' => [
                //'product/category/<id:[0-9a-zA-Z\-]+>/?' => 'product/category/',
                'product/category/<slug:.*?>' => 'product/category/',
                'product/detail/<slug:.*?>' => 'product/detail/',
                'store/cart/<slug:.*?>' => 'store/cart/',
                /*'personal/alert/<action:.*?>' => 'personal/alert/',
                'gallery/manage/<album:.*?>' => 'gallery/manage',
                'gallery/view/<slug:.*?>' => 'gallery/view/',*/
                '<controller:\w+>/<id:\d+>' => '<controller>/view',
                '<controller:\w+>/<action:\w+>' => '<controller>/<action>',
                '<controller:\w+>/<action:\w+>/<id:\d+>' => '<controller>/<action>',
                //'<modules:\w+>/<controller:\w+>/<action:\w+>' => '<modules>/<controller>/<action>',
                //'<modules:\w+>/<controller:\w+>/<action:\w+>/<id:\d+>' => '<modules>/<controller>/<action>',
                //'wtf' => 'wonder',
                
                /*[
                    'class' => 'app\components\UrlRules',
                    // ...configure other properties...
                ],*/
            ]
        ];