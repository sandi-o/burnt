<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Schedule extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'restaurant_id', 'operation', 'opening', 'closing'
    ];

    protected $with = ['restaurant'];

    /**
     * relationships
    */
    public function restaurant() {
        return $this->belongsTo(Restaurant::class);
    }
}
