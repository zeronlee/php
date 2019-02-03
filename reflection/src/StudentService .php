<?php
/**
 * Date: 2019/2/2
 * Time: 18:25
 * Author: zeronlee
 */

namespace Src;


class StudentService {
    private    $name;

    public function setName($name)
    {
        $this->name = $name;
    }

    protected function getName()
    {
        return $this->name;
    }
}