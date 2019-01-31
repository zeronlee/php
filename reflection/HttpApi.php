<?php
/**
 * Date: 2019/1/31
 * Time: 10:15
 * Author: zeronlee
 */
namespace github\reflection;
class HttpApi
{
    private $class;

    public function __construct($class)
    {
        $this->class = $class;
    }

    public function parseRequest($method,$params = [])
    {
        $class = new \ReflectionClass($this->class);
        $instance = $class->newInstanceArgs($params);
        $method = $class->getMethod($method);
        $args = [];
        foreach ($method->getParameters() as $param) {
            $name = $param->getName();
            if (isset($params[$name])) {
                $args[$name] = $params[$name];
            } else {
                try {
                    $args[$name] = $param->getDefaultValue();
                } catch (\Exception $e) {
                    throw new RequestException(
                        '请求参数不合未能',
                        500
                    );
                }
            }
        }

        return [$instance,$method,$args];
    }
}