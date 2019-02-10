<?php

namespace simple_mvc_framework_core\core;

class View
{
    function show($contextView, $masterView = null, $data = null)
    {
        if ($masterView == null) {
            include $_SERVER['DOCUMENT_ROOT'] . '/views/' . $contextView;
        } else {
            include $_SERVER['DOCUMENT_ROOT'] . '/views/' . $masterView;
        }
    }
}