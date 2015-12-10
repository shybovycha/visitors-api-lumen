<?php
/**
 * Created by PhpStorm.
 * User: shybovycha
 * Date: 04/12/15
 * Time: 14:14
 */

namespace App\MyStats;

use Illuminate\Database\Eloquent\Model;

class Location extends Model {
    protected $fillable = [ 'country', 'city' ];

    public function visitors() {
        return $this->hasMany('App\MyStats\Visitor');
    }
}