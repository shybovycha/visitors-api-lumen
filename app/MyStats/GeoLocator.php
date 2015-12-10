<?php
/**
 * Created by PhpStorm.
 * User: shybovycha
 * Date: 04/12/15
 * Time: 15:14
 */

namespace App\MyStats;


use Illuminate\Support\Facades\Log;

class GeoLocator {
    public static function byIp($ip) {
        $params = [
            '::1' => ['country' => 'Poland', 'city' => '']
        ];

        return $params[$ip];
    }
}