<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Collection extends Model
{
    use SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['name', 'created_by'];

    protected $with = ['items','creator'];
    
    /**
     * relationships
    */
    public function items() {
        return $this->hasMany(CollectionItem::class);
    }

    public function creator() {
        return $this->belongsTo(User::class,'created_by');
    }

    /**
     * methods
    */

    public function addItem($data) {
        return $this->items()->create($data);
    }

}
