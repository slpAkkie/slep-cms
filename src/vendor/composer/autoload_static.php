<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInitc43efd02b15bb2fad28483508b46863b
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
            0 => '/',
        ),
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInitc43efd02b15bb2fad28483508b46863b::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInitc43efd02b15bb2fad28483508b46863b::$prefixDirsPsr4;

        }, null, ClassLoader::class);
    }
}
