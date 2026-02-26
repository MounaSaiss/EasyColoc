<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Attributes\UseResource;
use Illuminate\Database\Eloquent\Model;

class Colocation extends Model
{
    protected $fillable = [
        'name',
        'type',
    ];
    public function memberships()
    {
        return $this->hasMany(Membrship::class);
    }
    public function users(){
        return $this->belongsToMany(User::class,'memberships')
        ->withPivot('role','joinedAt','leftAt')
        ->withTimestamps();
    }
}
