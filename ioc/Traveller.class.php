<?php
class Traveller 
{ 
    protected $trafficTool; 
    public function __construct (Visit $trafficTool) 
    { 
        $this->trafficTool = $trafficTool; 
    } 
    public function go () 
    { 
        // var_dump($this->trafficTool);
        $this->trafficTool->go(); 
    } 
}