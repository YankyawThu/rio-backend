<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class League extends Model
{
    use HasFactory, SoftDeletes;

    protected $guarded = [];

    public function scopeFilter($query, $filter) 
    {
        $filter->apply($query);    
    }

    public function teams()
    {
        return $this->hasMany(Team::class,'league_id')->withTrashed();
    }
}
