<?php
/**
 * Created by PhpStorm.
 * User: jacob
 * Date: 12/11/14
 * Time: 17:57
 */

namespace Pesapal\Services;


trait SingletonMake {

    static protected $instance;

    static function make()
    {
        if (!self::$instance) {
            self::$instance = new self;
        }
        return self::$instance;
    }
} 