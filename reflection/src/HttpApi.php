<?php
/**
 * Date: 2019/1/31
 * Time: 10:15
 * Author: zeronlee
 */
namespace Src;

//use Src\NotFoundService;
//include __DIR__ .'/./NotFoundService.php'; #跟这个没有关系

use Src\StudentService;

class HttpApi
{
    private $class;

    public function __construct($class)
    {
        $this->class = $class;
    }

    public function parseRequest($method,$params = [])
    {
//        var_dump($this->class);die;
        $class = new \ReflectionClass(StudentService::class);
        $instance = $class->newInstanceArgs($params);
        $method = $class->getMethod($method);
        $method1 = new \ReflectionMethod(StudentService::class, 'setName');
        if ($method1->isPublic()){
            echo 'public'."<br/>";
        }
//        var_dump($method1);die;
        $args = [];
        foreach ($method->getParameters() as $param) {
            $name = $param->getName();
            if (isset($params[$name])) {
                $args[$name] = $params[$name];
            } else {
                try {
                    $args[$name] = $param->getDefaultValue();
                } catch (\Exception $e) {

                }
            }
        }

        return [$instance,$method,$args];
    }
}