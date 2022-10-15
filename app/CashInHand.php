<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class CashInHand extends Model
{
    use SoftDeletes;
    protected $table = 'cash_in_hand';
    protected $fillable = [
        'debit',
        'credit',
        'description',
    ];
}
