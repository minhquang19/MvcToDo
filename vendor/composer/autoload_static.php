<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit490e507096674804e8413fd68e852e22
{
    public static $prefixLengthsPsr4 = array (
        'M' => 
        array (
            'MvcToDo\\' => 8,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'MvcToDo\\' => 
        array (
            0 => __DIR__ . '/../..' . '/',
        ),
    );

    public static $classMap = array (
        'Composer\\InstalledVersions' => __DIR__ . '/..' . '/composer/InstalledVersions.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInit490e507096674804e8413fd68e852e22::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit490e507096674804e8413fd68e852e22::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInit490e507096674804e8413fd68e852e22::$classMap;

        }, null, ClassLoader::class);
    }
}
