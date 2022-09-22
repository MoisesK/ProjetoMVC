<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInitbe2b7e7ad54a97fc180941e28ed8b5c6
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
            $loader->prefixLengthsPsr4 = ComposerStaticInitbe2b7e7ad54a97fc180941e28ed8b5c6::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInitbe2b7e7ad54a97fc180941e28ed8b5c6::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInitbe2b7e7ad54a97fc180941e28ed8b5c6::$classMap;

        }, null, ClassLoader::class);
    }
}