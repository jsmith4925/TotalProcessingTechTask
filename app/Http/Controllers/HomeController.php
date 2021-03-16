<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Transaction;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {

        $transactions = Transaction::all();

        return view('index', [
            'transactions' => $transactions
        ]);
    }  
      
    
    public function home()
    {
        $transactions = Transaction::all();
        return view('home', ['transactions' => $transactions]);
    }


    public function payment(Request $request)
    {
        if ($request->session()->has('responseData'))
            {                
                return view('payment');
            }
        else
            {
                $transactions = Transaction::all();
                return view('home', ['transactions' => $transactions]);
            }        
    }

}