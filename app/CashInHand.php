<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
//test
class CashInHand extends Model
{
    use SoftDeletes;
    protected $table = 'cash_in_hand';
    protected $fillable = [
        'debit',
        'credit',
        'description',
    ];

    public function user(){
        return $this->belongsTo('App\User')->withTrashed();
    }
}
