<?php

declare(strict_types=1);

use Hyperf\ConfigCenter\Mode;

return [
    'enable'  => (bool) env('CONFIG_CENTER_ENABLE', true),
    'driver'  => env('CONFIG_CENTER_DRIVER', 'etcd'),
    'mode'    => env('CONFIG_CENTER_MODE', Mode::PROCESS),
    'drivers' => [
        'etcd' => [
            'driver'     => Hyperf\ConfigEtcd\EtcdDriver::class,
            'packer'     => Hyperf\Utils\Packer\JsonPacker::class,
            'namespaces' => [
                '/app',
            ],
            'mapping'    => [
                // etcd key => config key
                '/app/test' => 'test',
            ],
            'interval'   => 5,
        ],
    ],
];
