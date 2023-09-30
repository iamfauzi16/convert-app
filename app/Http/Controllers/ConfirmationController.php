<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Transaction;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class ConfirmationController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function create()
    {
        $transaction = Transaction::whereIn('status', ['Confirmed', 'Pending'])->first();


        if($transaction && $transaction->status === 'Pending') {
            
            return view('confirmation.create', compact('transaction'));
        }elseif($transaction && $transaction->status === 'Confirmed') {
            Alert::success('Success', 'Your transaction has been confirmed');
            return view('confirmation.create', compact('transaction'));
        }


    }
    
}
