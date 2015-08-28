<?php

    require_once __DIR__."/../src/Brand.php";
    require_once __DIR__."/../src/Store.php";
    require_once __DIR__."/../vendor/autoload.php";

    $app = new Silex\Application();

    $app['debug'] = true;


    $server = 'mysql:host=localhost;dbname=shoes';
    $username = 'root';
    $password = 'root';
    $DB = new PDO($server, $username, $password);

    use Symfony\Component\HttpFoundation\Request;
    Request::enableHttpMethodParameterOverride();

    $app->register(new Silex\Provider\TwigServiceProvider(), array(
        'twig.path' => __DIR__.'/../views'
    ));

    $app->get("/", function() use ($app) {
        return $app['twig']->render("index.html.twig");
    });

    $app->get("/stores", function() use ($app) {
        return $app['twig']->render("stores.html.twig", array("stores" => Store::getAll(), "brands" => Brand::getAll()));
    });


    $app->get("/brands", function() use ($app) {
        return $app['twig']->render("stores.html.twig", array("stores" => Store::getAll(), "brands" => Brand::getAll()));
    });


    return $app;

 ?>
