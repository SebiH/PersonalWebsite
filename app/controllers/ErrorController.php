<?php

namespace Sehub\Controllers;

use Phalcon\Mvc\Controller;
use Phalcon\Mvc\View;

class ErrorController extends Controller
{
    public function initialize()
    {
        // we only need this specific view, otherwise angular loads other content
        $this->view->setRenderLevel(View::LEVEL_ACTION_VIEW);
    }

    public function show404Action()
    {
    }


    public function show500Action()
    {
    }
}


