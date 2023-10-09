<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInitc7cfc6d22f03316c3e6a842b9ab54a20
{
    public static $prefixLengthsPsr4 = array (
        'M' => 
        array (
            'Mohamad\\HandleInfinitLoop\\' => 26,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'Mohamad\\HandleInfinitLoop\\' => 
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
            $loader->prefixLengthsPsr4 = ComposerStaticInitc7cfc6d22f03316c3e6a842b9ab54a20::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInitc7cfc6d22f03316c3e6a842b9ab54a20::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInitc7cfc6d22f03316c3e6a842b9ab54a20::$classMap;

        }, null, ClassLoader::class);
    }
}
