<?php
include_once 'Visit.php';
class Foot implements Visit
{
    public function go()
    {
        echo 'walt to school';
    }
}