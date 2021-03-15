<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Transaction;
use Illuminate\Support\Facades\Auth;

class TransactionController extends Controller
{
    
    public function order(Request $request) {

        $transaction = new Transaction();
        $transaction->userId = Auth::id();
        $transaction->amount = $request->amount;
        $transaction->merchantTransactionId = $request->ref;

        $transaction->save();

        return redirect('/home');

    }

}
