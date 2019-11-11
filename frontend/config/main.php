<?php
$params = array_merge(
    require __DIR__ . '/../../common/config/params.php',
    require __DIR__ . '/../../common/config/params-local.php',
    require __DIR__ . '/params.php',
    require __DIR__ . '/params-local.php'
);

return [
	'name' => 'Catalog',
	'id' => 'app-frontend',
    'basePath' => dirname(__DIR__),
    'bootstrap' => ['log'],
    'language' => 'ru-Ru',
    'defaultRoute' => 'categories/index',
    'controllerNamespace' => 'frontend\controllers',
    'components' => [
        'request' => [
            'csrfParam' => '_csrf-frontend',
			],
        'cache' => [
            'class' => 'yii\caching\FileCache',
        ],
        'user' => [
            'identityClass' => 'common\models\User',
            'enableAutoLogin' => true,
            'identityCookie' => ['name' => '_identity-frontend', 'httpOnly' => true],
        ],
        'session' => [
            // this is the name of the session cookie used for login on the frontend
            'name' => 'advanced-frontend',
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
        
        'urlManager' => [
            'enablePrettyUrl' => true,
            'showScriptName' => false,
            'rules' => [
                'categories/<id:\d+>/<page:\d+>' => 'categories/view',
                'categories/<id:\d+>' => 'categories/view',
                'commodities/<id:\d+>' => 'commodities/view',
            ],
        ],

        'mailer' => [
            'class' => 'yii\swiftmailer\Mailer',
                        // send all mails to a file by default. You have to set
            // 'useFileTransport' to false and configure a transport
            // for the mailer to send real emails.
            'viewPath' => '@common/mail',
            'useFileTransport' => false,
            'transport' => [
                'class' => 'Swift_SmtpTransport',
                'host' => 'smtp.gmail.com',
                'username' => 'testewallet940@gmail.com',
                'password' => "xndilvxdjpznjmoh",

                // 'port' => '465',
                'encryption' => 'tls',
                'port' => '587',
                'streamOptions' => [
                    // 'ssl' => [
                    //     'allow_self_signed' => true,
                    //     'verify_peer' => false,
                    //     'verify_peer_name' => false,
                    // ],
                ],
            ], 
		], 
    ],
    'params' => $params,
];
