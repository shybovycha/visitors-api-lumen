<?php
namespace App\MyStats;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Log;

class Visitor extends Model {
    protected $fillable = [ 'ip', 'visits' ];

    public function location() {
        return $this->belongsTo('App\MyStats\Location');
    }

    public static function trackVisitor($ip) {
        $location = self::getLocation($ip);
        $visitor = self::getVisitor($ip);

        if (!$visitor->location()) {
            $visitor->location()->associate($location);
            $visitor->save();
        }

        $visitor->update([ 'visits' => $visitor->visits + 1 ]);
    }

    protected static function getLocation($ip) {
        $locationParams = GeoLocator::byIp($ip);
        $location = Location::where($locationParams)->first();

        if (!$location) {
            $location = Location::create($locationParams);
        }

        return $location;
    }

    protected static function getVisitor($ip) {
        $visitorParams = [ 'ip' => $ip ];
        $visitor = self::where($visitorParams)->first();

        if (!$visitor) {
            $visitor = self::create($visitorParams);
        }

        return $visitor;
    }
}