<?php
/**
 * Created by PhpStorm.
 * User: zeronlee
 * Date: 2019/1/29
 * Time: 18:21
 */
//依赖关系
use PHPUnit\Framework\TestCase;
class StackTest extends TestCase
{
    public function testEmpty()
    {
        $stack = [];
        $this->assertEmpty($stack);
        
        return $stack;
    }
    
    /**
     * @depends testEmpty
     */
    public function testPush(array $stack)
    {
        array_push($stack, 'foo');
        $this->assertEquals('foo', $stack[count($stack)-1]);
        $this->assertNotEmpty($stack);
        
        return $stack;
    }
    
    /**
     * @depends testPush
     */
    public function testPop(array $stack)
    {
        $this->assertEquals('foo', array_pop($stack));
        $this->assertEmpty($stack);
    }
}