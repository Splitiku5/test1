<?php

require_once $_SERVER['DOCUMENT_ROOT'] . '/../boot.php';
session_start();
$app = new \Test\Application();
$app->run();
