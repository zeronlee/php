<?php
include_once 'Visit.php';
class Bicycle implements Visit
{
    public function go()
    {
        echo 'ride to school;';
    }
}
