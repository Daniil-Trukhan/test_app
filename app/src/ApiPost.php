<?php

declare(strict_types=1);

namespace app;

use Exception;
use Psr\Http\Message\RequestInterface;
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
     * Добавление товара.
     *
     * @param RequestInterface $request
     * @return ResponseInterface
     */
    public function __invoke(RequestInterface $request): ResponseInterface
    {
        $data = json_decode($request->getBody()->getContents());
        $response = $this->response;

        $name = $data->name;
        $price = $data->price;
        if (!$name || !$price) {
            return $response->withStatus(400);
        }

        $product = (new ProductRepository())->add($name, (int)$price);

        if (!$product instanceof Product) {
            return $response->withStatus(400);
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
        return $response->withStatus(201);
    }
}
