<?php

declare(strict_types=1);

namespace App\Controller;

use Hyperf\Config\Annotation\Value;
use Hyperf\Etcd\KVInterface;
use Hyperf\Utils\Codec\Json;

class IndexController extends AbstractController
{
    #[Value('test')]
    private mixed $test;
    public function index()
    {
        $client = $this->container->get(KVInterface::class);
        $client->put('/app/test:123', Json::encode(['123432423423'], JSON_UNESCAPED_SLASHES));
        $client->put('/app/test', Json::encode(['123', '123', 'adsfdsaf']));

        return $this->test;
    }
}
