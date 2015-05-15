<?php

$loader = new \Phalcon\Loader();

/**
 * We're a registering a set of directories taken from the configuration file
 */
$loader->registerNamespaces(
    array(
        'Sehub\Controllers'  => APP_PATH . $config->application->controllersDir,
        'Sehub\Plugins'      => APP_PATH . $config->application->pluginsDir,
        'Sehub\Libraries'     => APP_PATH . $config->application->libraryDir,
        'Sehub\Models'       => APP_PATH . $config->application->modelsDir
    )
)->register();

