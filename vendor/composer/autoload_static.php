<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit0cd2ffa64021eb87a38372415a9123da
{
    public static $prefixLengthsPsr4 = array (
        'R' => 
        array (
            'Robinncode\\CiOnubadok\\' => 22,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'Robinncode\\CiOnubadok\\' => 
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
            $loader->prefixLengthsPsr4 = ComposerStaticInit0cd2ffa64021eb87a38372415a9123da::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit0cd2ffa64021eb87a38372415a9123da::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInit0cd2ffa64021eb87a38372415a9123da::$classMap;

        }, null, ClassLoader::class);
    }
}
