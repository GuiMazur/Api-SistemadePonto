<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TimeLog extends Model
{
    use HasFactory;

    public $timestamps = false;

    public $fillable = [
        "timeLog",
        "tipo",
        "user_id"
    ];


}
