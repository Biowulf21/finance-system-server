<?php

namespace App\Repositories\PaymentInfo;

use App\Models\PaymentInfo;

class PaymentInfoRepository implements PaymentInfoRepositoryInterface
{
    public function createPaymentInfo($data)
    {
        $payment_info = new PaymentInfo();

        $payment_info->name = $data['name'];
        $payment_info->amount = $data['amount'];

        $payment_info->save();
    }
}
