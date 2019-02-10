<?php

namespace simple_mvc_framework\src\core;

class Request
{
    public $request;

    public function __construct()
    {
        $this->request = $_REQUEST;
    }

    public function all()
    {
        return $this->request;
    }

    public function get($param)
    {
        if (isset($param, $this->request)) {
            return $this->request[$param];
        } else {
            return null;
        }
    }
}