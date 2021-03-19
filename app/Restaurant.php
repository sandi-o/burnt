<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Restaurant extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'd1', 't1', 'd2', 't2', 'd3', 't3', 'd4', 't4', 'd5', 't5', 'd6', 't6', 'd7', 't7'
    ];

    /**
     * relationships
    */
    public function schedules() {
        return $this->hasMany(Schedule::class);
    }
}
