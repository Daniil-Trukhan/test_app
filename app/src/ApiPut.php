<?php

declare(strict_types=1);

namespace app;

use Psr\Http\Message\ResponseInterface;

/**
 * Class ApiPut
 *
 * @package app
 */
class ApiPut extends Api
{
    /**
     *
     * @return ResponseInterface
     */
    public function __invoke(): ResponseInterface
    {
        $response = $this->response;
        $response->getBody()
            ->write(
                json_encode(['status' => 'success', 'message' => 'PUT'], JSON_THROW_ON_ERROR, 512)
            );
        return $response;
    }
}
