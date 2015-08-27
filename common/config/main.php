<?php
return [
    'vendorPath' => dirname(dirname(__DIR__)).'/vendor',
    'bootstrap' => ['comments'],
    'modules' => [
        'yee' => [
            'class' => 'yeesoft\Yee',
        ],
        'comments' => [
            'class' => 'yeesoft\comments\Module',
        ],
    ],
    'components' => [
        'settings' => [
            'class' => 'yeesoft\settings\components\Settings'
        ],
        'cache' => [
            'class' => 'yii\caching\FileCache',
        ],
        'user' => [
            'class' => 'yeesoft\components\User',
            'on afterLogin' => function($event) {
				\yeesoft\models\UserVisitLog::newVisitor($event->identity->id);
			}
        ],
    ],
];
