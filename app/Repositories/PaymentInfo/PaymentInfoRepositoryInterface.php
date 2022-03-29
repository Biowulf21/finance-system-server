<?php

namespace App\Repositories\PaymentInfo;

interface PaymentInfoRepositoryInterface
{
    public function createPaymentInfo($data);

    public function updatePaymentInfo($request, $id);
}
