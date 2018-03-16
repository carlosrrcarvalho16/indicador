<?php
return [
    'components' => [
        'db' => [
            'class' => 'yii\db\Connection',
            'dsn' => 'mysql:host=dbpt1.cfnhnt06pnay.sa-east-1.rds.amazonaws.com;dbname=dbsegpdf',
            'username' => 'usrsegpdf',
            'password' => 's3gpdf#',
            'charset' => 'utf8',
        ],
        'mailer' => [
            'class' => 'yii\swiftmailer\Mailer',
            'viewPath' => '@common/mail',
        ],
    ],
];
