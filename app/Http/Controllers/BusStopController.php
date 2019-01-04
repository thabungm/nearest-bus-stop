<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repositories\BusStopRepository;
use App\Http\Requests\BusStopRequest;
use App\Repositories\BusStopHasBusesRepository;

class BusStopController extends Controller
{
    /**
     * @param App\Repositories\BusStopRepository
     */
    private $busStopRepository;

    /**
     *@param App\Repositories\BusStopHasBusesRepository;
     */
    private $busStopHasBusesRepository;
    
    public function __construct(BusStopRepository $busStopRepository, BusStopHasBusesRepository $busStopHasBusesRepository)
    {
        $this->busStopRepository = $busStopRepository;
        $this->busStopHasBusesRepository = $busStopHasBusesRepository;
    }

    /**
     * Get the nearest bus stops
     * 
     * @param $latitude decimal geolocation
     * 
     * @param $longitude decimal geolocation
     */
    public function findNearestStops(
        $latitude = 1.282067,
        $longitude = 103.817221
    ) {
        $busStops = $this->busStopRepository->getBusStopsNearestOrder($latitude, $longitude);
        return view('nearest-bus-stops', compact('busStops', $latitude, $longitude));
    }

    /**
     * get buses available for bus stop
     * @param $busStopId integer
     * 
     */
    public function getBusesByBusStop($busStopId)
    {
        $busList = $this->busStopRepository->getBusesByBusStop($busStopId);
        return view('buses-in-stop', compact('busList'));
    }
}
