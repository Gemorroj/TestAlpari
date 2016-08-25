<?php
require_once __DIR__.'/../vendor/autoload.php';

$app = new Silex\Application();

$app->get('/', 'TestAlpari\\Controller\\DefaultController::indexAction')->bind('index');
$app->post('/', 'TestAlpari\\Controller\\DefaultController::drawAction')->bind('draw');

$app->register(new Silex\Provider\TwigServiceProvider(), array(
    'twig.path' => __DIR__.'/../view',
));
$app->register(new Silex\Provider\MonologServiceProvider(), array(
    'monolog.logfile' => __DIR__.'/../logs/app.log',
));

$app['debug'] = true;
$app->run();
