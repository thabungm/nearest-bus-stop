<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BusStop extends Model
{
    /**
     * The attributes that assign table.
     *
     * @var string
     */
    protected $table = "bus_stops";
    
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
                            'name', 'latitude', 'longitude'
    ];
}
