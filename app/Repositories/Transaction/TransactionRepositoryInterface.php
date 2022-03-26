<?php

namespace App\Repositories\Transaction;

interface TransactionRepositoryInterface
{
    public function createTransaction($data);

    public function showSpecificTransaction($id);

    public function showAllTransactions();
}
