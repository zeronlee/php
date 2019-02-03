### 安装
[安装教程参考](https://phpunit.readthedocs.io/zh_CN/latest/installation.html#windows)
#### 说明
- windows下安装那个盘符无所谓
- windows下如果不定义全局变量，可以进入phpunit.phar所在目录才能执行，例如：
    ```
    cd G:/phpstudy/phptutorial/tool/phpunit
    phpunit --version
    #当然配环境变量，全局配置操作更方便一点
    ```
- 全局配置，配置环境变量的路径是“建立外包覆批处理脚本（最后得到 C:\bin\phpunit.cmd）：”官方教程里面第五步的所在路径

### 配置
- 配置composer[参考](https://phpunit.de/getting-started/phpunit-8.html)
   - 例如
   ```
   {
       "autoload": {
           "classmap": [
               "src/"
           ]
       },
       #核心
       "require-dev": {
           "phpunit/phpunit": "^8"
       }
   }
   ```
- 安装依赖
```
composer install
```
### 使用
- 常用操作
   - 示例
    ```
    phpunit --bootstrap vendor/autoload.php tests/EmailTest //测试自己写的Email类
    phpunit --bootstrap vendor/autoload.php --testdox tests //testDox查看测试结果
    ```
    - 参数说明
    ```
    --testdox
    --colors
    --verbose
    ```
- 测试初始化
```
setUp
```
- 常用断言函数
```
assertTrue
assertFalse
assertInstanceOf
assertSame
assertEquals
assertEmpty
assertArrayNotHasKey
```