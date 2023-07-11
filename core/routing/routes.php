<?php

use Test\Routing\Router;


Router::get('/', [new \Test\Controller\IndexController(), 'getAction']);
Router::post('/', [new \Test\Controller\IndexController(), 'postAction']);

Router::get('/success/', [new \Test\Controller\SuccessController(), 'getAction']);

Router::get('/error/', [new \Test\Controller\ErrorController(), 'getSystemErrorAction']);
Router::get('/500/', [new \Test\Controller\ErrorController(), 'getSystemErrorAction']);