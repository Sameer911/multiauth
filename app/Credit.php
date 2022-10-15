<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Credit extends Model
{
    protected $table = 'credits';
    protected $fillable = [
        'date',
        'details',
        'debit',
        'credit',
        'user_id',
        'remarks',
    ];
}
