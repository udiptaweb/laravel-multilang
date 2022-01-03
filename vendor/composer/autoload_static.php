<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit5d89a461264d7e1fc7a29d610743fe9d
{
    public static $prefixLengthsPsr4 = array (
        'U' => 
        array (
            'Udiptaweb\\LaravelMultilang\\' => 27,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'Udiptaweb\\LaravelMultilang\\' => 
        array (
            0 => __DIR__ . '/../..' . '/src',
        ),
    );

    public static $classMap = array (
        'Composer\\InstalledVersions' => __DIR__ . '/..' . '/composer/InstalledVersions.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInit5d89a461264d7e1fc7a29d610743fe9d::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit5d89a461264d7e1fc7a29d610743fe9d::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInit5d89a461264d7e1fc7a29d610743fe9d::$classMap;

        }, null, ClassLoader::class);
    }
}
