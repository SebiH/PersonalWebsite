<?php

namespace Sehub\Controllers;

use Phalcon\Mvc\Controller;

class IndexController extends Controller 
{
    public function indexAction()
    {
        $this->view->setVar('home_class', 'nav-item-selected');
    }

    public function aboutmeAction()
    {
        $this->view->setVar('aboutme_class', 'nav-item-selected');
    }

    public function contactAction()
    {
        $this->view->setVar('contact_class', 'nav-item-selected');
    }

    public function cvAction()
    {
        $this->view->setVar('cv_class', 'nav-item-selected');
    }

    public function projectsAction()
    {
        $this->view->setVar('projects_class', 'nav-item-selected');
    }
}

