<?php

require_once('../assets/Mustache/Autoloader.php');
Mustache_Autoloader::register();

$template = isset($_GET['template']) ? $_GET['template'] : 'Hello, {{name}}!';
$data = array('name' => 'world'); // Default data
$m = new Mustache_Engine;

echo $m->render($template, $data);
// Twig/Autoloader.php