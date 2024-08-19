<?php

namespace App\Http\Middleware;

use Closure;

use GeoIp2\Database\Reader;

class LocationMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        // $ip = $request->ip();
        // $ip = '171.231.16.230';
        // $reader = new Reader(storage_path('app/Geolite2-City.mmdb'));
        // try{
        //     $record = $reader->city($ip);
        //     $location = [
        //         'country' => $record->country->name,
        //         'city'=>$record->city->name,
        //         'latitude'=>$record->location->latitude,
        //         'longitude'=>$record->location->longitude,
        //     ];
        //     $request->merge([
        //         'location'=>$location
        //     ]);
        // }
        // catch(\Excception $e){
        //     return $next($request);
        // }
        return $next($request);
    }
}
