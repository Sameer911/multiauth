<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class DailyOrder extends Model
{    use SoftDeletes;

    protected $table = 'orders';
    protected $fillable = [
        'order',
        'date',
        'city',
        'sender',
        'receiver',
        'father_name',
        'cnic',
        'amount',
        'status',
        'user_id',
        'entry_date',
    ];
}
