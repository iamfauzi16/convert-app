<?php

namespace App\Http\Controllers;

use App\Models\Banner;
use App\Models\BankUser;
use App\Models\Provider;
use App\Models\Transaction;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        Auth::user();
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {

        $users_id = auth()->user()->id;

        $providers = Provider::all();
        $bankUsers = BankUser::where('user_id', $users_id)->count();
        $transactions = Transaction::where('user_id', $users_id)->count();

        $transactionPendings = Transaction::where('status', 'Pending')
            ->where('user_id', $users_id)
            ->latest('updated_at')
            ->count();

        $transactionConfirmeds = Transaction::where('status', 'Confirmed')
            ->where('user_id', $users_id)
            ->latest('updated_at')
            ->count();


        return view('home', compact('providers','transactions', 'bankUsers', 'transactionPendings', 'transactionConfirmeds'));
    }
}
