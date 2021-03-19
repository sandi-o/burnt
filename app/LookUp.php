<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class LookUp extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'created_by',
        'code',
        'is_active',
        'name',
        'description',
        'grouping',
        'category', 
        'color',        
        'sequence',
        'updated_by',
    ];
}
