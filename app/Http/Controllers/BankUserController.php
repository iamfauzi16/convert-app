<?php

namespace App\Http\Controllers;

use App\Models\Bank;
use App\Models\BankUser;

use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;
class BankUserController extends Controller
{

    public function __construct() {
        $this->middleware('auth');
     }
    public function create()
    {
        $banks = Bank::all();
        return view('bank.create', compact('banks'));
    }

    public function store(Request $request)
    {

        $user_id = auth()->user()->id;

        $request->validate([
            'bank_id' => 'required',
            'nama' => 'required',
            'number_bank' => 'required',
            'user_id' => 'required', 
        ]);

        $bankUser = BankUser::create([
            'bank_id' => $request->bank_id,
            'nama' => $request->nama,
            'number_bank' => $request->number_bank,
            'user_id' => $user_id
        ]);

        Alert::success('Success', 'Bank User Berhasil Ditambahkan');

        return redirect()->route('profile.index');
    }
}
