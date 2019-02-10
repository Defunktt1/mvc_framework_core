<?php

namespace simple_mvc_framework_core\core;

class Controller
{
    public $request;
    public $view;

    function __construct(Request $request)
    {
        $this->request = $request;
        $this->view = new View();
    }

    function get404()
    {
        $this->view->show('templates/view_404.php');
    }
}
