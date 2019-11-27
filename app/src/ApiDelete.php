<?php

declare(strict_types=1);

namespace app;

use Psr\Http\Message\RequestInterface;
use Psr\Http\Message\ResponseInterface;

/**
 * Class ApiDelete
 *
 * @package app
 */
class ApiDelete extends Api
{
    /**
     * @param RequestInterface $request
     * @return ResponseInterface
     */
    public function __invoke(RequestInterface $request): ResponseInterface
    {
        $response = $this->response;
        $id = $request->getAttribute('id');

        if (!$id) {
            return $response->withStatus(400);
        }

        try {
            (new ProductRepository())->deleteById((int)$id);
        } catch (\Exception $e) {
            return $response->withStatus(404);
        }

        return $response->withStatus(204);
    }
}
