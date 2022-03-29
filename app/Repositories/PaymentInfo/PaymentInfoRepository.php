<?php

namespace App\Repositories\PaymentInfo;

use App\Models\PaymentInfo;
use Exception;

class PaymentInfoRepository implements PaymentInfoRepositoryInterface
{
    public function createPaymentInfo($data)
    {
        $payment_info = new PaymentInfo();

        $payment_info->name = $data['name'];
        $payment_info->amount = $data['amount'];

        $payment_info->save();
    }

    public function updatePaymentInfo($request, $id)
    {
        try {
            return $updatedPaymentInfo = PaymentInfo::where('id', '=', $id)->update($request->all());
        } catch (Exception $e) {
            $message = "Incorrect data inputted. Please update data type";
            return response($message, 400);
        }
    }
}
