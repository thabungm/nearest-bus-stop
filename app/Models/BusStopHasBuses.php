<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BusStopHasBuses extends Model
{
    /**
     * The attributes that assign table.
     *
     * @var string
     */
    protected $table = 'bus_stop_has_buses';
    
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
                        'bus_id', 'bus_stop_id',
    ];
}
