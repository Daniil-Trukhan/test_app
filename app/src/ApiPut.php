<?php

declare(strict_types=1);

namespace app;

use Psr\Http\Message\RequestInterface;
use Psr\Http\Message\ResponseInterface;

/**
 * Class ApiPut
 *
 * @package app
 */
class ApiPut extends Api
{
    /**
     * Изменение товара.
     *
     * @param RequestInterface $request
     * @return ResponseInterface
     */
    public function __invoke(RequestInterface $request): ResponseInterface
    {
        $data = json_decode($request->getBody()->getContents());
        $response = $this->response;
        $id = $request->getAttribute('id');
        $name = $data->name;
        $price = $data->price;

        if (!$id || !$name || !$price) {
            return $response->withStatus(400);
        }

        try {
            (new ProductRepository())->updateById((int)$id, $name, (int)$price);
        } catch (\Exception $e) {
            return $response->withStatus(404);
        }

        return $response;
    }
}
