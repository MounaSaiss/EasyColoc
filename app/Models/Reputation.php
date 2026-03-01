<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Reputation extends Model
{
    protected $fillable = [
        'user_id',
        'reputation',
    ];

}
