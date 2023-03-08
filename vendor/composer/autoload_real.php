<?php

// autoload_real.php @generated by Composer

class ComposerAutoloaderInit806192f629ff0bb83c4cfe276cb05a79
{
    private static $loader;

    public static function loadClassLoader($class)
    {
        if ('Composer\Autoload\ClassLoader' === $class) {
            require __DIR__ . '/ClassLoader.php';
        }
    }

    /**
     * @return \Composer\Autoload\ClassLoader
     */
    public static function getLoader()
    {
        if (null !== self::$loader) {
            return self::$loader;
        }

        require __DIR__ . '/platform_check.php';

        spl_autoload_register(array('ComposerAutoloaderInit806192f629ff0bb83c4cfe276cb05a79', 'loadClassLoader'), true, true);
        self::$loader = $loader = new \Composer\Autoload\ClassLoader(\dirname(__DIR__));
        spl_autoload_unregister(array('ComposerAutoloaderInit806192f629ff0bb83c4cfe276cb05a79', 'loadClassLoader'));

        require __DIR__ . '/autoload_static.php';
        call_user_func(\Composer\Autoload\ComposerStaticInit806192f629ff0bb83c4cfe276cb05a79::getInitializer($loader));

        $loader->register(true);

        return $loader;
    }
}