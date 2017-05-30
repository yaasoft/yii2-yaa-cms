<?php

$params = array_merge(
        require(__DIR__ . '/../../common/config/params.php'), require(__DIR__ . '/../../common/config/params-local.php'), require(__DIR__ . '/params.php'), require(__DIR__ . '/params-local.php')
);

return [
    'id' => 'frontend',
    'homeUrl' => '/',
    'basePath' => dirname(__DIR__),
    'bootstrap' => ['log'],
    'controllerNamespace' => 'frontend\controllers',
    'modules' => [
        'auth' => [
            'class' => 'yeesoft\auth\AuthModule',
        ],
    ],
    'components' => [
        'view' => [
            'theme' => [
                'class' => 'frontend\components\Theme',
                'theme' => 'readable', //cerulean, cosmo, default, flatly, readable, simplex, united
            ],
            'as seo' => [
                'class' => 'yeesoft\seo\components\SeoViewBehavior',
            ]
        ],
        'seo' => [
            'class' => 'yeesoft\seo\components\Seo',
        ],
        'request' => [
            'baseUrl' => '',
        ],
        'urlManager' => [
            'class' => 'yeesoft\web\MultilingualUrlManager',
            'rules' => [
                '<module:auth>/<action:(logout|captcha)>' => '<module>/default/<action>',
                '<module:auth>/<action:(oauth)>/<authclient:\w+>' => '<module>/default/<action>',
                '<language:([a-zA-Z-]{2,5})?>/<module:auth>/<action:\w+>' => '<module>/default/<action>',
                '<language:([a-zA-Z-]{2,5})?>/<controller:(category|tag)>/<slug:[\w \-]+>' => '<controller>/index',
                '<language:([a-zA-Z-]{2,5})?>/<controller:(category|tag)>' => '<controller>/index',
                '<language:([a-zA-Z-]{2,5})?>/<slug:[\w \-]+>' => 'site/index/',
                '<language:([a-zA-Z-]{2,5})?>' => 'site/index',
                '<language:([a-zA-Z-]{2,5})?>/<action:[\w \-]+>' => 'site/<action>',
                '<language:([a-zA-Z-]{2,5})?>/<controller:\w+>/<action:\w+>' => '<controller>/<action>',
            ],
            'excludedActions' => [
                'auth/default/captcha',
                'auth/default/logout',
                'auth/default/oauth',
            ],
        ],
        'authClientCollection' => [
            'class' => 'yii\authclient\Collection',
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
    ],
    'params' => $params,
];
