<?php
/**
 * Date: 2019/2/2
 * Time: 16:22
 * Author: zeronlee
 */

namespace Src;


class MockPsr4AutoloaderClass extends Psr4AutoloaderClass
{
    protected $files = array();

    public function setFiles(array $files)
    {
        $this->files = $files;
    }

    protected function requireFile($file)
    {
        return in_array($file, $this->files);
    }
}