<?php
namespace App\Repositories;

use App\Models\BusStopHasBuses;

/**
 * Class AuctionsRepository.
 */
class BusStopHasBusesRepository extends BaseRepository
{
    /**
     * BusesRepository constructor.
     *
     * @param Buses $user
     */
    public function __construct(BusStopHasBuses $BusStopHasBuses)
    {
        parent::__construct($BusStopHasBuses);
    }
}
