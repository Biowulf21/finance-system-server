<?php

namespace App\Repositories\Transaction;

use Illuminate\Support\Facades\Auth;
use App\Models\Transaction;

class TransactionRepository implements TransactionRepositoryInterface
{
    private function getAllTransactionWithJointTables()
    {
        return Transaction::with(['payedTo', 'payedBy', 'paymentInfoId'])->get();
    }

    public function createTransaction($data)
    {
        $transaction = new Transaction;

        $transaction->payed_to = Auth::user()->id;
        $transaction->payed_by = $data['payed_by'];
        $transaction->payment_info_id = $data['payment_info_id'];
        $transaction->amount_payed = $data['amount_payed'];

        $transaction->save();
    }

    public function getAllTransactions()
    {
        return $this->getAllTransactionWithJointTables();
    }
}
