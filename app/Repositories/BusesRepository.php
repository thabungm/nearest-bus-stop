<?php
namespace App\Repositories;

use App\Models\Buses;

/**
 * Class AuctionsRepository.
 */
class BusesRepository extends BaseRepository
{
    /**
     * BusesRepository constructor.
     *
     * @param Buses $user
     */
    public function __construct(Buses $buses)
    {
        parent::__construct($buses);
    }
    
}
