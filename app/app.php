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

    $app->post('/stores', function() use ($app) {
        $name = $_POST['name'];
        $location = $_POST['location'];
        $store = new Store($name, $location);
        $store->save();

        return $app['twig']->render("stores.html.twig", array("stores" => Store::getAll(), "brands" => Brand::getAll()));
    });

    $app->delete("/stores", function() use ($app) {
        Store::deleteAll();
        return $app['twig']->render("stores.html.twig", array("stores" => Store::getAll(), "brands" => Brand::getAll()));
    });

    $app->get("/store/{id}", function($id) use ($app) {
        $store = Store::find($id);
        return $app['twig']->render("store.html.twig", array("store" => $store, "all_brands" => Brand::getAll(), "brands" => $store->getBrands()));
    });

    $app->patch("/store/{id}", function($id) use ($app) {
        $store = Store::find($id);
        if (!empty($_POST['name'])) {
            $name = $_POST['name'];
            $store->updateName($name);
        }
        if (!empty($_POST['location'])) {
            $location = $_POST['location'];
            $store->updateLocation($location);
        }

        return $app['twig']->render("store.html.twig", array("store" => $store, "all_brands" => Brand::getAll(), "brands" => $store->getBrands()));
    });

    $app->get("/store/{id}/edit", function($id) use ($app) {
        $store = Store::find($id);
        return $app['twig']->render("store_edit.html.twig", array("store" => $store));
    });

    $app->post("/add_brands", function() use ($app) {
        $store = Store::find($_POST['store_id']);
        $brand = Brand::find($_POST['brand_id']);
        $store->addBrand($brand);
        return $app['twig']->render("store.html.twig", array("store" => $store, "all_brands" => Brand::getAll(), "brands" => $store->getBrands()));
    });

    $app->get("/store/{id}/delete", function($id) use ($app) {
        $store = Store::find($id);
        $store->delete();
        return $app['twig']->render("stores.html.twig", array("stores" => Store::getAll(), "brands" => Brand::getAll()));
    });







    $app->get("/brands", function() use ($app) {
        return $app['twig']->render("brands.html.twig", array("stores" => Store::getAll(), "brands" => Brand::getAll()));
    });

    $app->post("/brands", function() use ($app) {
        $name = $_POST['name'];
        $brand = new Brand($name);
        $brand->save();

        return $app['twig']->render("brands.html.twig", array("stores" => Store::getAll(), "brands" => Brand::getAll()));
    });

    $app->delete("/brands", function() use ($app) {
        Brand::deleteAll();
        return $app['twig']->render("brands.html.twig", array("stores" => Store::getAll(), "brands" => Brand::getAll()));
    });

    $app->get("/brand/{id}", function($id) use ($app) {
        $brand = Brand::find($id);
        return $app['twig']->render("brand.html.twig", array("brand" => $brand,"all_stores" => Store::getAll(), "stores" => $brand->getStores()));
    });

    $app->post("/add_stores", function() use ($app) {
        $brand = Brand::find($_POST['brand_id']);
        $store = Store::find($_POST['store_id']);
        $brand->addStore($store);
        return $app['twig']->render("brand.html.twig", array("brand" => $brand,"all_stores" => Store::getAll(), "stores" => $brand->getStores()));
    });



    return $app;

 ?>
