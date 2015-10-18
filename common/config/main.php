<?php
return [
    'vendorPath' => dirname(dirname(__DIR__)) . '/vendor',
    'bootstrap' => ['comments'],
    'language'   => 'en',
    'sourceLanguage' => 'en-US',
    'modules' => [
        'yee' => [
            'class' => 'yeesoft\Yee',
        ],
        'comments' => [
            'class' => 'yeesoft\comments\Module',
            'userModel' => 'yeesoft\models\User',
        ],
    ],
    'components' => [
        'settings' => [
            'class' => 'yeesoft\components\Settings'
        ],
        'cache' => [
            'class' => 'yii\caching\FileCache',
        ],
        'user' => [
            'class' => 'yeesoft\components\User',
            'on afterLogin' => function ($event) {
                \yeesoft\models\UserVisitLog::newVisitor($event->identity->id);
            }
        ],
    ],
];
