<?php

namespace Sehub\Controllers;

use Phalcon\Mvc\Controller;
use Phalcon\Mvc\View;

/**
 * Controller to load IndexController's views without the whole interface. 
 * Useful to let IndexController load the whole view instantly (useful for crawlers!),
 * while maintaining the benefits of ui-router.
 */
class ContentController extends Controller 
{
    public function loadAction($view)
    {
        // only allow a-z as viewname, limit to a few characters
        $view = preg_replace('/[^a-zA-Z]*/', '', $view);
        $view = substr($view, 0, 20);

        $this->view->pick("index/$view");

        // we only need this specific view
        $this->view->setRenderLevel(View::LEVEL_ACTION_VIEW);
    }
}


