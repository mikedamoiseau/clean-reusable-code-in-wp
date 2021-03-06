<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInite16f6e5a59290a517b3ee32ad2f56497
{
    public static $prefixLengthsPsr4 = array (
        'A' => 
        array (
            'Acme\\' => 5,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'Acme\\' => 
        array (
            0 => __DIR__ . '/../..' . '/inc',
        ),
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInite16f6e5a59290a517b3ee32ad2f56497::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInite16f6e5a59290a517b3ee32ad2f56497::$prefixDirsPsr4;

        }, null, ClassLoader::class);
    }
}
