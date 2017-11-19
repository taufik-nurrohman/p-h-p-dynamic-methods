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

    public static $fn = [];

    public function __call($key, $arguments = []) {
        if (isset(self::$fn[$key]) && is_callable(self::$fn[$key])) {
            return call_user_func_array(Closure::bind(self::$fn[$key], $this), $arguments);
        }
        exit('Method ' . static::class . '-&gt;' . $key . '() does not exist.');
    }

    public static function __callStatic($key, $arguments = []) {
        if (isset(self::$fn[$key]) && is_callable(self::$fn[$key])) {
            return call_user_func_array(self::$fn[$key], $arguments);
        }
        exit('Method ' . static::class . '::' . $key . '() does not exist.');
    }

}