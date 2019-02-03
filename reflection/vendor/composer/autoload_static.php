<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit8119b0271b651d5c74019ed9c3936112
{
    public static $prefixLengthsPsr4 = array (
        'S' => 
        array (
            'Src\\' => 4,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'Src\\' => 
        array (
            0 => __DIR__ . '/../..' . '/src',
        ),
    );

    public static $classMap = array (
        'Src\\HttpApi' => __DIR__ . '/../..' . '/src/HttpApi.php',
        'Src\\NotFoundService' => __DIR__ . '/../..' . '/src/NotFoundService.php',
        'Src\\StudentService' => __DIR__ . '/../..' . '/src/StudentService .php',
        'Src\\TestService' => __DIR__ . '/../..' . '/src/TestService.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInit8119b0271b651d5c74019ed9c3936112::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit8119b0271b651d5c74019ed9c3936112::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInit8119b0271b651d5c74019ed9c3936112::$classMap;

        }, null, ClassLoader::class);
    }
}
