<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit14a6c66c026d80fce48d84f4dbe81cc6
{
    public static $prefixLengthsPsr4 = array (
        'Q' => 
        array (
            'QH\\Category\\' => 12,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'QH\\Category\\' => 
        array (
            0 => __DIR__ . '/../..' . '/packages/category/src',
        ),
    );

    public static $classMap = array (
        'Composer\\InstalledVersions' => __DIR__ . '/..' . '/composer/InstalledVersions.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInit14a6c66c026d80fce48d84f4dbe81cc6::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit14a6c66c026d80fce48d84f4dbe81cc6::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInit14a6c66c026d80fce48d84f4dbe81cc6::$classMap;

        }, null, ClassLoader::class);
    }
}