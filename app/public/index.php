<?php
declare(strict_types=1);

use DI\ContainerBuilder;
use app\HelloWorld;
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
    $r->get('/', HelloWorld::class);
});

$middlewareQueue[] = new FastRoute($routes);
$middlewareQueue[] = new RequestHandler($container);

$requestHandler = new Relay($middlewareQueue);
$response = $requestHandler->handle(ServerRequestFactory::fromGlobals());

$emitter = new SapiEmitter();

return $emitter->emit($response);