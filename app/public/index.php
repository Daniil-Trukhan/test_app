<?php
declare(strict_types=1);

use app\ApiDelete;
use app\ApiGet;
use app\ApiPatch;
use app\ApiPost;
use app\ApiPut;
use DI\ContainerBuilder;
use app\Main;
use FastRoute\RouteCollector;
use Middlewares\FastRoute;
use Middlewares\RequestHandler;
use Psr\Http\Message\ResponseInterface;
use Relay\Relay;
use Zend\Diactoros\Response;
use Zend\Diactoros\ServerRequestFactory;
use Zend\HttpHandlerRunner\Emitter\SapiEmitter;
use function DI\create;
use function DI\get;
use function FastRoute\simpleDispatcher;
use Symfony\Component\Dotenv\Dotenv;

require_once '../vendor/autoload.php';

$dotenv = new Dotenv();
$dotenv->load('../.env');

$containerBuilder = new ContainerBuilder();
$containerBuilder->useAutowiring(true);

$containerBuilder->addDefinitions(
    require '../config/container.php'
);

$container = $containerBuilder->build();

$routes = simpleDispatcher(static function (RouteCollector $r) {
    $r->get('/', Main::class);
    $r->post('/product', ApiPost::class);
    $r->get('/product/{id:\d+}', ApiGet::class);
    $r->put('/product/{id:\d+}', ApiPut::class);
    $r->delete('/product/{id:\d+}', ApiDelete::class);
});

$middlewareQueue[] = new FastRoute($routes);
$middlewareQueue[] = new RequestHandler($container);

$requestHandler = new Relay($middlewareQueue);
$response = $requestHandler->handle(ServerRequestFactory::fromGlobals());

$emitter = new SapiEmitter();

return $emitter->emit($response);
