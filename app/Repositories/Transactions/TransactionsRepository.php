<?php

namespace App\Repositories\Transactions;

use Illuminate\Http\Request;
use App\Models\Transactions\Transaction;

class TransactionsRepository
{
    public function search(Request $request, Transaction $transaction)
    {
        return Transaction::when($id = $request->id, function ($query) use ($id) {
            $query->where('id', $id);
        })->when($email = $request->email, function ($query) use ($email) {
            $query->where('email', $email);
        })->when($phone = $request->phone, function ($query) use ($phone) {
            $query->where('phone', $phone);
        })->when($request, function ($query) use ($request) {
            $query->whereBetween('created_at', [$request->begin_date, $request->end_date]);
        })->paginate(10);
    }
}
