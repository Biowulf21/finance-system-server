<?php

namespace App\Repositories\PaymentInfo;

interface PaymentInfoRepositoryInterface
{
    public function createPaymentInfo($data);
    public function getAllPaymentInfo();
    public function getSpecififcPaymentInfo($id);
    public function updatePaymentInfo($request, $id);
}
