<?php

namespace App\Http\Controllers\Transaction;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Models\Transactions\Transaction;
use App\Repositories\Transactions\TransactionsRepository;
use App\Models\Currency;
use App\Rules\CheckPancard;
use App\Traits\Alerts;

class TransactionsController  extends Controller 
{
    use Alerts;
    
    public function index()
    {
        $transactions = Transaction::select()
            ->paginate(10);
        
        return view('transactions.index', [
            'transactions' => $transactions
        ]);
    }
    
    public function show(Transaction $transaction, Currency $currency)
    {
       return view('transactions.show', [
            'transaction' => $transaction
        ]);
    }
    
    public function search(Request $request, TransactionsRepository $transactions, Transaction $transaction)
    {
        $request->validate([
            'amount' => ['nullable', 'numeric'],
            'email' => ['nullable', 'email'],
            'phone' => ['nullable', 'integer']
        ]);
        
        $transactions = $transactions->search($request, $transaction);
        
        return view('transactions.index', [
            'transactions' => $transactions
        ]);
    }
    
    public function create()
    {
        return view('transactions.create', [
            'currency' => Currency::getCurrencyList()
        ]);
    }
    
    public function store(Request $request, Transaction $transaction)
    {
        $request->validate([
            'amount' => ['required', 'numeric'],
            'email' => ['required', 'email'],
            'phone' => ['required', 'integer'],
            'currency' => ['required', 'integer']
        ]);
        
        $model = $transaction->create([
            'currency_id' => $request->currency,
            'amount' => $request->amount,
            'email' => $request->email,
            'phone' => $request->phone,
            'link' => Str::random(16)    
        ]);
        
        return redirect()->route('transactions')->with($this->flashback($model, 'Transaction')[0], $this->flashback($model, 'Transaction')[1]);
    }
    
    public function payment($link)
    {
        $transaction = Transaction::select()
            ->where(['link'=>$link])
            ->firstOrFail();
        
        return view('transactions.payment', [
            'transaction' => $transaction
        ]);
    }
    
    public function makePayment(Request $request, Transaction $transaction)
    {
        $request->validate([
            'amount' => ['required', 'numeric'],
            'email' => ['required', 'email'],
            'phone' => ['required', 'numeric'],
            'card' => ['required', new CheckPancard],
            'month' => 'required|integer|between:1,12',
            'year' => 'required|integer|between:21,31',
        ]);
        
        $model = $transaction->update([
            'amount' => $request->amount,
            'date' => $request->date,
            'begin_card' => Transaction::setBeginCard($request->card),
            'end_card' => Transaction::setEndCard($request->card),
            'status' => 1,
        ]);
        
        return redirect()->route('payment', ['link' => $transaction->link])->with($this->flashback($model, 'Transaction')[0], $this->flashback($model, 'Transaction')[1]);
    }
}
