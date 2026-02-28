<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $fillable = [
        'name',
        'colocation_id',
    ];
    protected $table = 'categories';

    public function expenses()
    {
        return $this->hasMany(Expense::class);
    }

}
