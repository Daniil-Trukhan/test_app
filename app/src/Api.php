<?php

declare(strict_types=1);

namespace app;

use Psr\Http\Message\RequestInterface;
use Psr\Http\Message\ResponseInterface;

/**
 * Class Api
 *
 * @package app
 */
abstract class Api
{
    /**
     * @var ResponseInterface
     */
    protected $response;
    /**
     * @var string
     */
    protected $user;

    /**
     * Api constructor.
     *
     * @param ResponseInterface $response
     */
    public function __construct(ResponseInterface $response)
    {
        $this->response = $response->withHeader('Content-Type', 'application/json');
        $this->user = 'Test';
    }
}