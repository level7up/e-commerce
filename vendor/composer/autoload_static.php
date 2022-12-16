<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit1e08a4d4dde4f0c877e073ff0cd1995c
{
    public static $prefixLengthsPsr4 = array (
        'L' => 
        array (
            'Level7up\\ECommerce\\' => 19,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'Level7up\\ECommerce\\' => 
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
            $loader->prefixLengthsPsr4 = ComposerStaticInit1e08a4d4dde4f0c877e073ff0cd1995c::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit1e08a4d4dde4f0c877e073ff0cd1995c::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInit1e08a4d4dde4f0c877e073ff0cd1995c::$classMap;

        }, null, ClassLoader::class);
    }
}