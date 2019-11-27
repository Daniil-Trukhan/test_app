<?php

declare(strict_types=1);

namespace app;

use Exception;
use Psr\Http\Message\ResponseInterface;
use Zend\Diactoros\Response;

/**
 * Class ApiPost
 *
 * @package app
 */
class ApiPost extends Api
{
    /**
     * @return ResponseInterface
     * @throws Exception
     */
    public function __invoke(): ResponseInterface
    {
        $response = $this->response;
        $response->getBody()
            ->write(
                json_encode(['id' => random_int(1, 100), 'name' => 'Map', 'price' => random_int(200, 1000)], JSON_THROW_ON_ERROR, 512)
            );
        return $response->withStatus(201);
    }
}
