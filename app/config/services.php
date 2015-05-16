<?php

use Phalcon\Mvc\View;
use Phalcon\DI;
use Phalcon\Escaper;
use Phalcon\Mvc\Dispatcher;
use Phalcon\Mvc\Url as UrlProvider;
use Phalcon\Mvc\View\Engine\Volt as VoltEngine;
use Phalcon\Mvc\Model\Metadata\Memory as MetaData;
use Phalcon\Session\Adapter\Files as SessionAdapter;
use Phalcon\Flash\Session as FlashSession;
use Phalcon\Events\Manager as EventsManager;
use Phalcon\Logger\Adapter\File as FileAdapter;

use Sehub\Plugins\NotFoundPlugin;
use Sehub\Libraries\LiveVolt;

/**
 *  Dependency Injector
 */
$di = new DI();

//Registering a router
$di->set('router', function() use ($config) {
    require_once APP_PATH . 'app/config/routes.php';

    return $router;
});

/**
 * We register the events manager
 */
$di->set('dispatcher', function() use ($config) {

    $eventsManager = new EventsManager;

    /**
     * Handle exceptions and not-found exceptions using NotFoundPlugin
     */
    $eventsManager->attach('dispatch:beforeException', new NotFoundPlugin);

    $dispatcher = new Dispatcher;
    $dispatcher->setEventsManager($eventsManager);
    $dispatcher->setDefaultNamespace($config->application->controllerNamespace);

    return $dispatcher;
});

//Registering a Http\Response
$di->set('response', function(){
    return new \Phalcon\Http\Response();
});
//Registering a Http\Request
$di->set('request', function(){
    return new \Phalcon\Http\Request();
});

/**
 * The URL component is used to generate all kind of urls in the application
 */
$di->set('url', function() use ($config){
    $url = new UrlProvider();
    $url->setBaseUri($config->application->baseUri);
    return $url;
});


$di->set('view', function() use ($config) {

    $view = new View();

    $view->setViewsDir(APP_PATH . $config->application->viewsDir);

    $view->registerEngines(array(
        ".volt" => 'volt'
    ));

    return $view;
});

/**
 * Setting up volt
 */
$di->set('volt', function($view, $di) {

    $volt = new LiveVolt($view, $di);

    $volt->setOptions(array(
        "compiledPath" => APP_PATH . "cache/volt/",
        'compileAlways' => true // TODO remove!! just in dev
    ));

    $compiler = $volt->getCompiler();
    $compiler->addFunction('is_a', 'is_a');

    return $volt;
}, true);


/**
 * Start the session the first time some component request the session service
 */
$di->set('session', function() {
    $session = new SessionAdapter();
    $session->start();
    return $session;
});

/**
 * Register the flash service with custom CSS classes
 */
$di->set('flash', function() {
    return new FlashSession(array(
        'error'   => 'alert alert-danger',
        'success' => 'alert alert-success',
        'notice'  => 'alert alert-info',
    ));
});


/**
 *  Logging
 */
$di->set('logger', function() {
    $logger = new FileAdapter(APP_PATH . "logs/current.log");
    return $logger;
});

/**
 *  Assets
 */
$di->set('assets', function() {
    require_once APP_PATH . 'app/config/assets.php';
    return $assets;
});


$di->set('escaper', function() {
    return new Escaper();
});

$di->set('config', function() use ($config) {
    return $config;
});

