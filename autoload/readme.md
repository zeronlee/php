### 基本规范
- PHP代码文件 必须 以 <?php 或 <?= 标签开始；
- PHP代码文件 必须 以 不带 BOM 的 UTF-8 编码；
- 类的命名 必须 遵循 StudlyCaps 大写开头的驼峰命名规范；
- 类中的常量所有字母都 必须 大写，单词间用下划线分隔；
- ***方法名称 必须 符合 camelCase 式的小写开头驼峰命名规范。***

### psr-0自动加载规范
- 命名空间以及类名称中的下划线
```
\namespace\package\Class_Name => /path/to/project/lib/vendor/namespace/package/Class/Name.php
\namespace\package_name\Class_Name => /path/to/project/lib/vendor/namespace/package_name/Class/Name.php
```
- 当从文件系统中载入标准的命名空间或类时，都将添加 .php 为目标文件后缀；
- 顶级组织名（Vendor Name）\\ 命名空间（Namespace）\\ 类名（Class）；

### psr-1规范
- 类属性命名
   - 大写开头的驼峰式 ($StudlyCaps)
   - 小写开头的驼峰式 ($camelCase)
   - 下划线分隔式 ($under_score)

### psr-2风格规范
- 每个 namespace 命名空间声明语句和 use 声明语句块后面，必须 插入一个空白行。
- 类的开始花括号（{） 必须 写在函数声明后自成一行，结束花括号（}）也 必须 写在函数主体后自成一行。
- 方法的开始花括号（{） 必须 写在函数声明后自成一行，结束花括号（}）也 必须 写在函数主体后自成一行。
- 类的属性和方法 必须 添加访问修饰符（private、protected 以及 public），abstract 以及 final 必须 声明在访问修饰符之前，而 static 必须 声明在访问修饰符之后。
- 控制结构的关键字后 必须 要有一个空格符，而调用方法或函数时则 一定不可 有。
- 控制结构的开始花括号（{） 必须 写在声明的同一行，而结束花括号（}） 必须 写在主体后自成一行。
### psr-3日志接口规范

### psr-4自动加载规范
- 全限定类名**必须**拥有顶级命名空间
- 全限定类名可以有一个或者多个子命名空间名称。
- 全限定类名必须有一个最终的类名（我想意思应该是你不能这样\<NamespaceName>(\<SubNamespaceNames>)*\来表示一个完整的类）。
- 废弃Namespace\class_method的下划线结构


### psr-5注释规范
### psr-6缓存接口规范
### psr-7http消息接口规范
### psr-9安全规范
### psr-11容器接口规范

# 参考资料
> [Laravel社区](https://learnku.com/index.php/docs/psr)   
  [GitHub](https://github.com/php-fig/fig-standards/tree/master/accepted)