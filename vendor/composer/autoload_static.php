<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit076935e906e4e1e493f63db435721f0d
{
    public static $prefixesPsr0 = array (
        'T' => 
        array (
            'Tripolis' => 
            array (
                0 => __DIR__ . '/../..' . '/src',
            ),
        ),
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixesPsr0 = ComposerStaticInit076935e906e4e1e493f63db435721f0d::$prefixesPsr0;

        }, null, ClassLoader::class);
    }
}
