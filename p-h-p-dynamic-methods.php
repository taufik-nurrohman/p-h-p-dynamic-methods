<?php

/**
 * PHP DYNAMIC METHODS
 * ===================
 *
 *  Author: Taufik Nurrohman
 *  URL: https://github.com/tovic/p-h-p-dynamic-methods
 *
 *  Based on <https://github.com/mecha-cms/genome/~/engine/kernel/genome.php>
 *
 */

abstract class PHPDynamicMethods {

    protected static $fn = [];

    public static function fn($key, $fn = null) {
        self::$fn[static::class][$key] = $fn;
    }

    public function __call($key, $arguments = []) {
        $c = static::class;
        if (isset(self::$fn[$c][$key]) && is_callable(self::$fn[$c][$key])) {
            return call_user_func_array(Closure::bind(self::$fn[$c][$key], $this), $arguments);
        }
        exit('Method ' . $c . '-&gt;' . $key . '() does not exist.');
    }

    public static function __callStatic($key, $arguments = []) {
        $c = static::class;
        if (isset(self::$fn[$c][$key]) && is_callable(self::$fn[$c][$key])) {
            return call_user_func_array(self::$fn[$c][$key], $arguments);
        }
        exit('Method ' . $c . '::' . $key . '() does not exist.');
    }

}