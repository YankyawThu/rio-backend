<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $guarded = [];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function scopeFilter($query, $filter) 
    {
        $filter->apply($query);    
    }

    public function role()
    {
        return $this->belongsTo(Role::class,'role_id','id');
    }

    public function isSuperAdmin()
    {
        return $this->role->value == "superadmin" ? true : false;
    }

    public function label() 
    {
        if ($this->role->value == "superadmin") return 'danger';
        if ($this->role->value == "user") return 'info';
    }
}
