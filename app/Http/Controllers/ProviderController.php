<?php

namespace App\Http\Controllers;

use App\Models\Bank;
use App\Models\BankUser;
use App\Models\Provider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use function PHPUnit\Framework\isNull;

class ProviderController extends Controller
{

    public function __construct()
    {
        $this->middleware(['auth']);
    }
    public function index()
    {
        $providers = Provider::all();
       
    
        return view('provider', compact('providers'));
    }

    
    public function transactionPerProvider($id)
    {   
        $provider = Provider::findOrFail($id);
        $users_id = Auth::id();
        $bankUsers = BankUser::where('user_id', $users_id)->get();
       
        return view('transaction.create', compact('provider', 'bankUsers'));

    }
}
