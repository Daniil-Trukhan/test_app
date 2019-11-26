<?php

declare(strict_types=1);

namespace app;

use Psr\Http\Message\ResponseInterface;

/**
 * Class ApiPatch
 *
 * @package app
 */
class ApiPatch extends Api
{
    /**
     * @return ResponseInterface
     */
    public function __invoke(): ResponseInterface
    {
        $response = $this->response;
        $response->getBody()
            ->write(
                json_encode(
                    ['status' => 'success', 'message' => 'Deleted ID '],
                    JSON_THROW_ON_ERROR,
                    512
                )
            );
        return $response;
    }
}
