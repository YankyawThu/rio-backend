<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Game extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function scopeFilter($query, $filter) 
    {
        $filter->apply($query);    
    }
    public function league()
    {
        return $this->belongsTo(League::class, 'league_id')->withTrashed();
    }
    public function teamA()
    {
        return $this->belongsTo(Team::class, 'team_a_id')->withTrashed();
    }

    public function teamB()
    {
        return $this->belongsTo(Team::class, 'team_b_id')->withTrashed();
    }

    public function links()
    {
        return $this->hasMany(GameLink::class,'game_id');
    }

    public function linkWithType($type)
    {
        return $this->hasMany(GameLink::class,'game_id')->where('type', $type)->get();
    }
}
