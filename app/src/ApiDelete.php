<?php

declare(strict_types=1);

namespace app;

use Psr\Http\Message\ResponseInterface;

/**
 * Class ApiDelete
 *
 * @package app
 */
class ApiDelete extends Api
{
    /**
     * @return ResponseInterface
     */
    public function __invoke(): ResponseInterface
    {
        $response = $this->response;
        return $response->withStatus(204);
    }
}
