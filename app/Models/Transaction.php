<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\User;
use App\Models\Student;
use App\Models\PaymentInfo;

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

    public function payedTo()
    {
        return $this->belongsTo(User::class, 'payed_to');
    }

    public function payedBy()
    {
        return $this->belongsTo(Student::class, 'payed_by');
    }

    public function paymentInfoId()
    {
        return $this->belongsTo(PaymentInfo::class, 'payment_info_id');
    }
}
