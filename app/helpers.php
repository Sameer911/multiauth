<?php
use App\CashInHand;


function cashInHandAmount()
{
    $result = 0;
    $debit = 0;
    $credit = 0;
    $all = CashInHand::all();

    foreach ($all as $key => $value) {
        if (!empty($value->credit)) {
            $credit += $value->credit;
        }

        if (!empty($value->debit)) {
            $debit += $value->debit;
        }
        $number =$credit - $debit;
        $format = number_format($number, 2, '.', ',');
        $result = $format;
    }
    return $result;

    
} 

function formatNumber($value)
{
    return  number_format($value, 2, '.', ',');
}