<?php
/**
 * Date: 2019/1/31
 * Time: 10:56
 * Author: zeronlee
 */
require 'vendor/autoload.php';

//use github\reflection\HttpApi;

$params = $_REQUEST;
$serviceName= isset($params['service']) ? $params['service'] : 'NotFound';
$methodName= isset($params['method']) ? $params['method'] : 'error';
$class = $serviceName . 'Service';
list($instance, $method, $args) = (new \HttpApi($class))->parseRequest($methodName, $params);
echo json_encode(($method->invokeArgs($instance, $args)));