<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function scopeFilter($query, $filter) 
    {
        $filter->apply($query);    
    }

    public function getDateAttribute()
    {
        return $this->created_at->format('l d M, Y');
    }
}
