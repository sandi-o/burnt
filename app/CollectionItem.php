<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class CollectionItem extends Model
{
    use SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['collection_id', 'restaurant_id'];

    protected $with = ['restaurant'];
    /**
     * relationships
    */
    public function collection() {
        return $this->belongsTo(Collection::class);
    }

    public function restaurant() {
        return $this->belongsTo(Restaurant::class);
    }
}
