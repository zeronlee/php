<?php
/**
 * Date: 2019/1/31
 * Time: 10:56
 * Author: zeronlee
 */
require __DIR__.'/./vendor/autoload.php';

use Src\HttpApi;

$params = $_REQUEST;
$serviceName= isset($params['service']) ? $params['service'] : 'Student';
$methodName= isset($params['method']) ? $params['method'] : 'setName';
$class = $serviceName . 'Service';

list($instance, $method, $args) = (new HttpApi($class))->parseRequest($methodName, $params);
echo json_encode(($method->invokeArgs($instance, $args)));