<?php
/**
 * Created by PhpStorm.
 * User: shybovycha
 * Date: 10/12/15
 * Time: 12:05
 */

namespace App\MyStats;

use Exception;
use Illuminate\Support\Facades\Log;

class UberLog {
    protected static function inspect($data) {
        ob_start();
        var_dump($data);
        $msg = ob_get_contents();
        ob_end_clean();

        return $msg;
    }

    public static function __callStatic($method, $arguments) {
        $allowedMethods = [ 'info', 'debug', 'error', 'warn' ];

        if (!in_array($method, $allowedMethods))
            throw new Exception("Method $method does not exist in UberLog");

        $msg = self::inspect($arguments);

        Log::$method($msg);
    }
}