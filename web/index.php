<?php

require_once __DIR__.'/../vendor/autoload.php';

$app = new Silex\Application();

$app['debug'] = true;

$app->register(new Silex\Provider\TwigServiceProvider(), array(
    'twig.path' => __DIR__.'/../views/',
));

$app->get('/', function (\Silex\Application $app) {
    $knowledge = ['QF-Test', 'Oberflächentests', 'Symfony', 'Silex', 'Wordpress', 'PHP', 'MySQL', 'Java', 'Jenkins', 'Radfahren', 'Radverkehrspolitik', 'Bürgerbeteiligung', 'Critical Mass', 'Fotografie', 'Informatik', 'Medieninformatik', 'Computergrafik', 'HTML5', 'CSS3', 'Linux', 'Apache', 'nginx', 'Adobe Photoshop', 'Journalismus', 'Testlink', 'Selenium', 'JBehave', 'SonarQube', 'jQuery', 'Cucumber', 'JavaScript', 'Jira', 'Confluence', 'git', 'Geolocation', 'OpenStreetMap', 'Bootstrap', 'Leaflet', 'NodeJs', 'Express.js', 'SCSS', 'GitLab', 'GitHub'];
    natcasesort($knowledge);

    return $app['twig']->render('content/index.html.twig', ['knowledge' => $knowledge]);
})->bind('index');

$app->get('/{slug}', function (\Silex\Application $app, string $slug) {
    $templateFilename = sprintf('content/%s.html.twig', $slug);

    return $app['twig']->render($templateFilename);
})->bind('page');

$app->run();
