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

    public function isOwner(User $user)
    {
        return $this->users()
            ->wherePivot('user_id', $user->id)
            ->wherePivot('role', 'owner')
            ->exists();
    }
}
