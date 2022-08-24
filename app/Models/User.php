<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    public $timestamps = false;

    protected $fillable = [
        'name',
        'email',
        'password',
        'defaultExitTime',
        'admin'
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    public function timeLogs(){
        return $this->hasMany(TimeLog::class);
    }
};