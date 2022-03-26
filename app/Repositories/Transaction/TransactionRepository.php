<?php

namespace App\Repositories\Transaction;

use App\Models\PaymentInfo;
use App\Models\Student;
use Illuminate\Support\Facades\Auth;
use App\Models\Transaction;
use App\Models\User;

class TransactionRepository implements TransactionRepositoryInterface
{
    public function createTransaction($data)
    {
        $transaction = new Transaction;

        $transaction->payed_to = Auth::user()->id;
        $transaction->payed_by = $data['payed_by'];
        $transaction->payment_info_id = $data['payment_info_id'];
        $transaction->amount_payed = $data['amount_payed'];

        $transaction->save();

        return "paid to: $transaction->payed_to, paid by: $transaction->payed_by, payment info: $transaction->payment_info_id, amount paid: $transaction->amount_payed";
    }

    public function showSpecificTransaction($id)
    {
        return Transaction::where('id', $id)->get();
    }

    public function showAllTransactions()
    {
        $transactions = Transaction::all();


        $transaction_details = [];

        foreach ($transactions as $transaction) {
            $paid_by = $transaction->payed_by;

            // User Information
            $user_id = $transaction->payed_to;
            $user = User::all()->where('id', '=', $user_id)->first();


            // Transaction Information
            $id = $transaction->id;
            $paid_to = $transaction->payed_to;
            $payment_id = $transaction->payment_info_id;
            $amount_paid = $transaction->amount_payed;

            // Payment Information
            $payment_info = PaymentInfo::all()->where('id', "=", $payment_id)->first();
            // FIXME: Amount paid in the transaction should be a
            $payment_info_amount = $payment_info->amount;


            $student = Student::all()->where('id', '=', $paid_by)->first();
            // Student Information
            $first_name = $student->first_name;
            $middle_name = $student->middle_name;
            $last_name = $student->last_name;
            $lrn = $student->lrn;

            array_push($transaction_details, [
                'paid_to' => $user,
                'paid_by' => $student,
                'payment_info_id' => $payment_info,
                'amount_paid' => $amount_paid,
                'payment_info_amount' => $payment_info_amount,
            ]);
        }
        return $transaction_details;
    }
}
