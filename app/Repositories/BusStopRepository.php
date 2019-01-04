<?php
namespace App\Repositories;

use App\Models\BusStop;
use DB;

/**
 * Class AuctionsRepository.
 */
class BusStopRepository extends BaseRepository
{
    /**
     *
     */
    public function __construct(BusStop $busStop)
    {
        parent::__construct($busStop);
    }

    /**
     * Get nearest stops
     * @param $latitude decimal geolocation
     * 
     * @param $latitude longitude geolocation
     */
    public function getBusStopsNearestOrder($latitude, $longitude)
    {
        return BusStop::select(
            DB::raw('*, ( 6367 * acos( cos( radians('.$latitude.') ) * cos( radians( latitude ) ) * cos( radians( longitude ) - radians('.$longitude.') ) + sin( radians('.$latitude.') ) * sin( radians( latitude ) ) ) ) AS distance')
        )
        ->orderBy('distance')->get();
    }

    /**
     * Get bus list by bus stop
     * @param $busStopId int
     * 
     */
    public function getBusesByBusStop($busStopId)
    {
        return $this->model
                    ->select('buses.id', 'buses.name', 'buses.from_route', 'buses.to_route', 'buses.bus_number')
                    ->join('bus_stop_has_buses', 'bus_stops.id', '=', 'bus_stop_has_buses.bus_id')
                    ->join('buses', 'buses.id', '=', 'bus_stop_has_buses.bus_id')
                    ->where(['bus_stops.id' => $busStopId])
                    ->get();
    }
}
