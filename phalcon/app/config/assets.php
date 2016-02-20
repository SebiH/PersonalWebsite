<?php

use Phalcon\Assets\Filters\Jsmin;
use Phalcon\Assets\Filters\Cssmin;

use Phalcon\Assets\Manager;

$assets = new Manager();

// CSS
$assets
    ->collection('css')
    ->setTargetPath('production/sebi.min.css')
    ->setTargetUri('production/sebi.min.css')

    ->addCss('../assets/css/sehub.css')

    ->join(true)
    ->addFilter(new Cssmin());



$assets
    ->collection('js')
    ->setTargetPath('production/sebi.min.js')
    ->setTargetUri('production/sebi.min.js')

    ->addJs('../assets/js/sehub.js')

    ->join(true)
    ->addFilter(new Jsmin());

return $assets;

