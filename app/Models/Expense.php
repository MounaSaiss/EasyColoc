<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Expense extends Model
{
    protected $fillable = [
        'title',
        'montant',
        'dateAchat',
        'user_idPayer',
        'colocation_id',   
        'category_id',
    ];
    public function payer()
    {
        return $this->belongsTo(User::class, 'user_idPayer');
    }
    
    
}
