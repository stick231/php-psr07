<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInitec30d52280d74f92bd7a741259719ebd
{
    public static $prefixLengthsPsr4 = array (
        'P' => 
        array (
            'Psr\\Http\\Message\\' => 17,
        ),
        'F' => 
        array (
            'Framework\\' => 10,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'Psr\\Http\\Message\\' => 
        array (
            0 => __DIR__ . '/..' . '/psr/http-message/src',
        ),
        'Framework\\' => 
        array (
            0 => __DIR__ . '/../..' . '/src/Framework',
        ),
    );

    public static $classMap = array (
        'Composer\\InstalledVersions' => __DIR__ . '/..' . '/composer/InstalledVersions.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInitec30d52280d74f92bd7a741259719ebd::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInitec30d52280d74f92bd7a741259719ebd::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInitec30d52280d74f92bd7a741259719ebd::$classMap;

        }, null, ClassLoader::class);
    }
}
