<?php
return [
    'vendorPath' => dirname(dirname(__DIR__)) . '/vendor',
    'bootstrap' => ['comments', 'yee'],
    'language' => 'en-US',
    'sourceLanguage' => 'en-US',
    'components' => [
        'yee' => [
            'class' => 'yeesoft\Yee',
        ],
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
        'authClientCollection' => [
            'class' => 'yii\authclient\Collection',
        ],
    ],
    'modules' => [
        'auth' => [
            'class' => 'yeesoft\auth\AuthModule',
        ],
        'comments' => [
            'class' => 'yeesoft\comments\Comments',
            'userModel' => 'yeesoft\models\User',
            'userAvatar' => function ($user_id) {
                $user = yeesoft\models\User::findIdentity((int)$user_id);
                if ($user instanceof yeesoft\models\User) {
                    return $user->getAvatar();
                }
                return false;
            }
        ],
    ],
];
