<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Membrship extends Model
{
    protected $table = 'memberships';
    protected $fillable = [
        'user_id',
        'colocation_id',
        'role',
        'joinedAt',
        'leftAt'
    ];
    public function user(){
        return $this->belongsTo(User::class);
    }
    public function colocation(){
        return $this->belongsTo(Colocation::class , 'colocation_id');
    }
}
