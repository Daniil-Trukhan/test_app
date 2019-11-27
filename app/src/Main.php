<?php

declare(strict_types=1);

namespace app;

use Psr\Http\Message\ResponseInterface;

/**
 * Class HelloWorld
 *
 * @package app
 */
class Main
{
    /**
     * @var ResponseInterface
     */
    private $response;

    /**
     * Main constructor.
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
                       <link rel='stylesheet' type='text/css' href='/assets/css/swagger-ui.css' >
                       <link rel='icon' type='image/png' href='/assets/images/favicon-32x32.png' sizes='32x32' />
                       <link rel='icon' type='image/png' href='/assets/images/favicon-16x16.png' sizes='16x16' />
                       <link rel='stylesheet' href='/assets/css/index.css'>                       
                       </head>
                     <body>
                     <div class='d-flex justify-content-center'><img src='/assets/images/image.png' /></div>                     
                     <div id='swagger-ui'></div>
                     <script src='/assets/js/swagger-ui-bundle.js'></script>
                     <script src='/assets/js/swagger-ui-standalone-preset.js'></script>    
                     <script src='/assets/js/index.js'></script>            
                     </body>
                 </html>"
            );

        return $response;
    }
}