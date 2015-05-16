<?php

namespace Sehub\Controllers;

use Phalcon\Mvc\Controller;

class IndexController extends Controller
{
    private function isActionMethod($method) {
        $needle = 'Action';
        $expected_pos = strlen($method) - strlen($needle);
        return $expected_pos >= 0 && strpos($method, $needle, $expected_pos) !== FALSE;
    }

    public function initialize()
    {
        foreach (get_class_methods($this) as $method)
        {
            if ($this->isActionMethod($method))
            {
                $action = str_replace('Action', '', $method);
                $is_current_action = $this->dispatcher->getActionName() === $action;
                $css_class = $is_current_action ? 'nav-item-selected' : '';

                $this->view->setVar($action . '_class', $css_class);
            }
        }
    }





    public function indexAction()
    {
    }

    public function aboutmeAction()
    {
    }

    public function contactAction()
    {
    }

    public function projectsAction()
    {
    }
}

