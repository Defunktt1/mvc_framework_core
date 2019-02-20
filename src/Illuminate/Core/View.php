<?php

namespace simple_mvc_framework\src\Illuminate\Core;

class View
{
    function show($contextView, $masterView = null, $data = null)
    {
        if ($masterView == null) {
            include $_SERVER['DOCUMENT_ROOT'] . '/resources/views/' . $contextView;
        } else {
            include $_SERVER['DOCUMENT_ROOT'] . '/resources/views/' . $masterView;
        }
    }
}