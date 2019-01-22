<?php
require './Container.php';
require './Traveller.class.php';
require './component/Bicycle.class.php';
require './component/Car.class.php';
require './component/Foot.class.php';
//实例化IOC容器
$ioc = new Container();
 
//填充容器
$ioc->bind('Visit', 'Car');  //第一个参数'Visit'是接口，
//第二个参数'Car'是交通工具类
 
$ioc->bind('zeronlee', 'Traveller');    //第一个参数'zeronlee'可以理解为服务别名，用make()
//实例化的时候直接使用别名即可，第二个参数'Traveller'是出行人
 
//通过容器实现依赖注入，完成类的实例化
//执行回调函数
$traveller = $ioc->make('zeronlee');
var_dump($traveller);
$traveller->go();