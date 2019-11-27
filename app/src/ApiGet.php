<?php

declare(strict_types=1);

namespace app;

use Psr\Http\Message\RequestInterface;
use Psr\Http\Message\ResponseInterface;

/**
 * Class ApiGet
 *
 * @package app
 */
class ApiGet extends Api
{
    /**
     * @param RequestInterface $request
     * @return ResponseInterface
     * @throws \Exception
     */
    public function __invoke(RequestInterface $request): ResponseInterface
    {
        $response = $this->response;
        $id = $request->getAttribute('id');

        if (!$id) {
            return $response->withStatus(400);
        }
        $product = (new ProductRepository())->getById((int)$id);
        if (!$product instanceof Product) {
            return $response->withStatus(404);
        }
        $response->getBody()
            ->write(
                json_encode(
                    [
                        'id' => $product->getId(),
                        'name' => $product->getName(),
                        'price' => $product->getPrice()
                    ],
                    JSON_THROW_ON_ERROR,
                    512
                )
            );
        return $response;
    }
}