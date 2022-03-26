<?php

namespace App\Repositories\Transaction;

interface TransactionRepositoryInterface
{
    public function createTransaction($data);
    public function getAllTransactions();
    public function showSpecificTransaction($id);
}
