<?php

use Malte\Skills\BikeSkillList;
use Malte\Skills\WebSkillList;

require_once __DIR__.'/../vendor/autoload.php';

$app = new Silex\Application();

$app['debug'] = true;

$app->register(new Silex\Provider\TwigServiceProvider(), array(
    'twig.path' => __DIR__.'/../views/',
));

$app->get('/', function (\Silex\Application $app) {
    return $app['twig']->render('content/index.html.twig', ['skills' => (new BikeSkillList())->getList()]);
})->bind('index');

$app->get('/{slug}.html', function (\Silex\Application $app, string $slug) {
    $path = sprintf('/%s', $slug);

    return $app->redirect($path, 301);
})->bind('legacy-page');

$app->get('/{slug}', function (\Silex\Application $app, string $slug) {
    $templateFilename = sprintf('content/%s.html.twig', $slug);

    return $app['twig']->render($templateFilename, ['skills' => (new WebSkillList())->getList()]);
})->bind('page');

$app->run();
