<?php

namespace App\Http\Controllers;

use App\Models\Provider;
use App\Models\Transaction;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\Auth;

class TransactionController extends Controller
{
    public function __construct()
    {
        Auth::user();
    }
    public function index()
    {

        $user_id = auth()->user()->id;

        $transactions = Transaction::where('user_id', $user_id)->get();

        return view('transaction.index', compact('transactions'));
    }

    public function show($id)
    {
        $transaction = Transaction::findOrFail($id);
        return view('transaction.show', compact('transaction'));
    }

    public function store(Request $request)
    {


        
        $request->validate([
            'provider_id' => 'required',
            'bank_user_id' => 'required',
         
            'no_handphone' => 'required',
            'amount' => 'required|numeric',
            'convert' => 'nullable|numeric',
            'status' => 'nullable',
          
        ]);

        $provider = Provider::find($request->provider_id);
        $rate = $provider->rate;
        $user_id = auth()->user()->id;
        $convert = $request->amount * $rate;

        if ($request->amount < 30000) {
            Alert::warning('Warning', 'Minimal Pulsa Harus Rp. 30.000');
            return redirect()->route('transaction.create' , $provider->id);
        }

        if($request->amount > 200000) {
            Alert::warning('Warning', 'Maaf Maksimal Transaksi Rp. 200.000/hari');
            return redirect()->route('transaction.create' , $provider->id);

        } else {

            $transactions = New Transaction;

            $transactions->provider_id = $provider->id;
            $transactions->bank_user_id = $request->bank_user_id;
    
            $transactions->no_handphone = $request->no_handphone;
    
            $transactions->amount = $request->amount;
            $transactions->convert = $convert;
            $transactions->status = "Pending";
            $transactions->user_id = $user_id;
            $transactions->save();
    
            Alert::success('Congrats', 'Convert Pulsa Berhasil Silahkan Menunggu Proses!');
    
            return redirect()->route('confirmation.transaction', $transactions->id);
        }

    }
}
