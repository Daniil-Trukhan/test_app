<?php

declare(strict_types=1);

namespace app;

use Psr\Http\Message\ResponseInterface;

/**
 * Class HelloWorld
 *
 * @package app
 */
class HelloWorld
{
    /**
     * @var ResponseInterface
     */
    private $response;

    /**
     * HelloWorld constructor.
     *
     * @param ResponseInterface $response
     */
    public function __construct(ResponseInterface $response)
    {
        $this->response = $response;
    }

    /**
     * @return ResponseInterface
     */
    public function __invoke(): ResponseInterface
    {
        $response = $this->response->withHeader('Content-Type', 'text/html');
        $response->getBody()
            ->write(
                "<html>
                       <head>
                       <link rel='stylesheet' href='/assets/css/bootstrap.min.css'>
                        </head>
                     <body>
                     <div class='d-flex justify-content-center'><h1>Hello, world! </h1></div>
                     <div class='d-flex justify-content-center'><img src='/assets/images/image.png' /></div>
                     </body>
                 </html>"
            );

        return $response;
    }
}