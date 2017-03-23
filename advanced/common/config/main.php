<?php
return [
    'vendorPath' => dirname(dirname(__DIR__)) . '/vendor',
    'components' => [
        'cache' => [
            'class' => 'yii\caching\FileCache',
        ],
        'memcache' => [
                'class' => 'yii\caching\Memcache',
                'useMemcached' => true,
                'servers' => [
                    [
                        'host' => 'localhost',
                        'port' => 11211,

                    ],
                ],
            ],
        ],


];
