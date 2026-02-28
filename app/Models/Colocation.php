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
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
    public function users()
    {
        return $this->belongsToMany(User::class, 'memberships')
            ->withPivot('role', 'joinedAt', 'leftAt')
            ->withTimestamps();
    }
    public function expenses()
    {
        return $this->hasMany(Expense::class);
    }
    public function invitations()
    {
        return $this->hasMany(Invitation::class);
    }
    public function categories()
    {
        return $this->hasMany(Category::class);
    }
}
