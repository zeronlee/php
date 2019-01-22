<?php
class Container{
    //用于装提供实例的回调函数，真正的容器还会装实例等其他内容
    //从而实现单例等高级功能
    public $bindings = [];
 
    //绑定接口和生成相应实例的回调函数
    public function bind($abstract, $concrete=null, $shared=false) {
            
        //如果提供的参数不是回调函数，则产生默认的回调函数 即concrete变为回调函数，不是一个字符串
        if(!$concrete instanceof Closure) {
            $concrete = $this->getClosure($abstract, $concrete);
 
        }
          
 
        $this->bindings[$abstract] = compact('concrete', 'shared');
 
    }
 
    //默认生成实例的回调函数
    protected function getClosure($abstract, $concrete) {
        //使用bing函数的时候不执行该函数；仅仅把$abstract, $concrete 放入$container对象中；
        return function($container) use ($abstract, $concrete) {
 
            $method = ($abstract == $concrete) ? 'build' : 'make';
            echo "回调函数".$abstract;
            //var_dump( $concrete);
            //利用回调函数来实例化
            return $container->$method($concrete);
        };
 
 
    }
    //解决接口和要实例化类之间的依赖关系
    public function make($abstract) {
        
        $concrete = $this->getConcrete($abstract);
        echo "make<br>";
        //var_dump($concrete);
        if($this->isBuildable($concrete, $abstract)) {
            echo "build<br>";
            $object = $this->build($concrete);
        } else {
            echo "make2<br>";
            $object = $this->make($concrete);
        }
        echo "make end";
        return $object;
    }
 
    protected function isBuildable($concrete, $abstract) {
        return $concrete === $abstract || $concrete instanceof Closure;
    }
 
    //获取绑定的回调函数
    protected function getConcrete($abstract) {
        //var_dump($this->bindings);echo $abstract;
        //如果是接口或者别名（Visit，studentaaaa）返回回调函数来执行；如果是实例类，则返回实例类字符串
        if(!isset($this->bindings[$abstract])) {
            echo "stringabstract";
            return $abstract;
        }
        
        return $this->bindings[$abstract]['concrete'];
    }
 
    //实例化对象
    public function build($concrete) {
    
        if($concrete instanceof Closure) {
            echo "instanceof";
            //执行回调函数
            return $concrete($this);
        }
        echo "build detail<br>";
        $reflector = new ReflectionClass($concrete);
        //检查类是否可实例化
        if(!$reflector->isInstantiable()) {
            echo $message = "Target [$concrete] is not instantiable";
        }
        // 获取类的构造函数  
        $constructor = $reflector->getConstructor();
        if(is_null($constructor)) {
            return new $concrete;
        }
 
        $dependencies = $constructor->getParameters();
        //public 'name' => string 'trafficTool'
        
        $instances = $this->getDependencies($dependencies);
        //var_dump($reflector->newInstanceArgs($instances));
        //object(Student)[7]private 'trafficTool' => object(Bicycle)[9]
        return $reflector->newInstanceArgs($instances);
    }
 
    //解决通过反射机制实例化对象时的依赖
    protected function getDependencies($parameters) {
 
        $dependencies = [];
        foreach($parameters as $parameter) {
            // public 'name' => string 'Visit'
            $dependency = $parameter->getClass();
            
            if(is_null($dependency)) {
                $dependencies[] = NULL;
            } else {
                $dependencies[] = $this->resolveClass($parameter);
            }
        }
 
        return (array)$dependencies;
    }
 
    protected function resolveClass(ReflectionParameter $parameter) {
        //var_dump($parameter->getClass()->name);
        //Visit
        return $this->make($parameter->getClass()->name);
    }
}