<?php
include_once 'Visit.php';
class Car implements Visit
{
    public function go()
    {
        echo 'drive to school';
    }
}
