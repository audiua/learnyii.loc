<?php

class AutoLoadPear {

    protected static $paths = array(
        '/usr/share/php/PHPUnit/Extensions/Story/'
    );

    public static function addPath($path) {
        $path = realpath($path);
        if ($path) {
            self::$paths[] = $path;
        }
    }

    public static function load($class) {
        $classPath = str_replace('_', '/', $class); // Do whatever logic here
        foreach (self::$paths as $path) {
            if (is_file($path . $classPath)) {
                require_once $path . $classPath;
                return;
            }
        }
    }
}