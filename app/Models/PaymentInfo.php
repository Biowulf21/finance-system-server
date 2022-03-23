<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PaymentInfo extends Model
{
    use HasFactory;

    protected $table = 'finance_system_payment_info';

    protected $fillable = [
        'name',
        'amount',
    ];
}
