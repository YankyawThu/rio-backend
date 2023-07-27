<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Team extends Model
{
    use HasFactory, SoftDeletes;
    protected $guarded = [];

    public function scopeFilter($query, $filter) 
    {
        $filter->apply($query);    
    }

    public function league()
    {
        return $this->belongsTo(League::class, 'league_id');
    }
}
