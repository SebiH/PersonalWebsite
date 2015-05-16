<?php

$router = new Router();
$router->setDefaultNamespace($config->application->controllerNamespace);

// return a proper error response if no route was found
$router->notFound(array(
    'controller' => 'error',
    'action' => 'show404'
));

// should be handled in .htaccess, but just to make sure
$router->removeExtraSlashes(true);

// default routes
$router->add('/', 'Index::index');
$router->add('/aboutme', 'Index::aboutme');
$router->add('/CV', 'Index::cv');
$router->add('/contact', 'Index::contact');
$router->add('/projects', 'Index::projects');
$router->add('/home', 'Index::index');

return $router;

