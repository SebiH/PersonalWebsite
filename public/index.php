<?php

use Phalcon\Mvc\Application;
use Phalcon\Config\Adapter\Ini as ConfigIni;

try 
{
    define('APP_PATH', realpath('..') . '/');

    /**
     * Read the configuration
     */
    $config = new ConfigIni(APP_PATH . 'app/config/config.ini');

    /**
     * Auto-loader configuration
     */
    require APP_PATH . 'app/config/loader.php';

    /**
     * Load application services
     */
    require APP_PATH . 'app/config/services.php';

    $application = new Application($di);
    echo $application->handle()->getContent();

} 
catch(\Exception $e) 
{
    http_response_code(500);

    $error_page = file_get_contents('500.html');
    echo $error_page;

    error_log("PhalconException: " . $e->getMessage());
}

