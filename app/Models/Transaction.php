<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    use HasFactory;

    protected $table = 'finance_system_transaction';

    protected $fillable = [
        'payed_to',
        'payed_by',
        'payment_info_id',
        'amount_payed',
    ];
}
