<?php

declare(strict_types=1);

use Psr\Http\Message\ResponseInterface;
use Zend\Diactoros\Response;
use function DI\create;

return [
    ResponseInterface::class => create(Response::class)
];
