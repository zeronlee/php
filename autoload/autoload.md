### 加载方式
- psr-0
- psr-4
```
"autoload":{
        "psr-4":{
            "Src\\": "src/"
        }
    }
```
- classmap
- file
### 配置说明
- psr-4
   - "key\\":"val" => 命名空间：路径
   - 转义\的作用
     + 因为命名空间是以\分割，例如App\Model,增加\\是为了防止出现AppModel的情况
### 更新应用
```
composer dumpautoload -o
composer dump-autoload
```
# 参考资料
[细说“PHP类库自动加载”](https://github.com/qinjx/adv_php_book/blob/master/class_autoload.md)

[PHP包管理工具--Composer自动加载](https://segmentfault.com/a/1190000007825005)