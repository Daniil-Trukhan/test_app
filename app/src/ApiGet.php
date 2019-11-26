<?php

declare(strict_types=1);

namespace app;

use Psr\Http\Message\ResponseInterface;

/**
 * Class ApiGet
 *
 * @package app
 */
class ApiGet extends Api
{
    /**
     * @return ResponseInterface
     * @throws \Exception
     */
    public function __invoke(): ResponseInterface
    {
        $this->response->getBody()
            ->write(
                json_encode(['id' => random_int(1, 100), 'name' => 'Map', 'price' => random_int(200, 1000)], JSON_THROW_ON_ERROR, 512)
            );
        return $this->response;
    }
}