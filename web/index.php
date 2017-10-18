<?php

require_once __DIR__.'/../vendor/autoload.php';

$app = new Silex\Application();

$app['debug'] = true;

$app->register(new Silex\Provider\TwigServiceProvider(), array(
    'twig.path' => __DIR__.'/../views/',
));

$app->get('/{slug}', function (\Silex\Application $app, string $slug) {
    $templateFilename = sprintf('content/%s.html.twig', $slug);

    return $app['twig']->render($templateFilename);
})->bind('page');

$app->run();
