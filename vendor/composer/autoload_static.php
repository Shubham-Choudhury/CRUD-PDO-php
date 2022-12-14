<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit32a126aa7de257c60a3e7b180103a1cd
{
    public static $prefixLengthsPsr4 = array (
        'A' => 
        array (
            'App\\' => 4,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'App\\' => 
        array (
            0 => __DIR__ . '/../..' . '/app',
        ),
    );

    public static $classMap = array (
        'Composer\\InstalledVersions' => __DIR__ . '/..' . '/composer/InstalledVersions.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInit32a126aa7de257c60a3e7b180103a1cd::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit32a126aa7de257c60a3e7b180103a1cd::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInit32a126aa7de257c60a3e7b180103a1cd::$classMap;

        }, null, ClassLoader::class);
    }
}
