<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class PaidOrder extends Model
{
    use SoftDeletes;
    protected $table = 'paid_orders';
    protected $fillable = [
        'order_id',
        'date',
        'amount',
        'image',
    ];

    public function order()
    {
        return $this->belongsTo('App\DailyOrder');
    }
}
