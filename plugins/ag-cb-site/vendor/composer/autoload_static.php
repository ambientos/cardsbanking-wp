<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInitb8a1f2a3638eaf935e467361d1cb796b
{
    public static $prefixLengthsPsr4 = array (
        'A' => 
        array (
            'AG_Cb_Site\\' => 11,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'AG_Cb_Site\\' => 
        array (
            0 => __DIR__ . '/../..' . '/core',
        ),
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInitb8a1f2a3638eaf935e467361d1cb796b::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInitb8a1f2a3638eaf935e467361d1cb796b::$prefixDirsPsr4;

        }, null, ClassLoader::class);
    }
}