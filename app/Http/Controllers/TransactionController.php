<?php

namespace App\Http\Controllers;

use App\Models\Provider;
use App\Models\Transaction;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TransactionController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth']);
    }
    public function index()
    {
        $transactions = Transaction::all();

        return view('transaction.index', compact('transactions'));
    }

    public function show($id)
    {
        $transaction = Transaction::findOrFail($id);
        return view('transaction.show', compact('transaction'));
    }

    public function store(Request $request)
    {
        $user_id = Auth::user()->id;

        $request->validate([
            'provider_id' => 'required',
            'bank_user_id' => 'required',
            'user_id' => 'required',
            'no_handphone' => 'required',
            'amount' => 'required|numeric',
            'convert' => 'nullable|numeric',
            'status' => 'nullable',
        ]);

        $provider = Provider::find($request->provider_id);
        $rate = $provider->rate;

        $convert = $request->amount * $rate;

        if ($request->amount <= 30000) {
            return redirect()->route('transaction.create')->withErrors(['amount' => 'Minimal transaksi Rp. 30.000']);
        }

        $transactions = New Transaction;

        $transactions->provider_id = $provider->id;
        $transactions->bank_user_id = $request->bank_user_id;
        $transactions->user_id = $user_id;
        $transactions->no_handphone = $request->no_handphone;

        $transactions->amount = $request->amount;
        $transactions->convert = $convert;
        $transactions->status = "Pending";
        $transactions->save();


        dd($transactions);

        return redirect()->route('transaction.create', $provider->id)->with('success', 'Transaksi berhasil dibuat');
    }
}
