<?php


require_once __DIR__ . '/../vendor/autoload.php';


$base = event_base_new();
var_dump($res = event_buffer_new(fopen("php://input", "r")));