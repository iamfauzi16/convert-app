<?php

namespace App\Http\Controllers\Auth;

use App\Models\Bank;
use App\Models\BankUser;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ProfileController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth']);
    }

    public function index()
    {
        $user_id = auth()->user()->id;
        $bankUsers = BankUser::where('user_id', $user_id)->paginate(1);  
        return view('auth.profile', compact('bankUsers'));
    }
}
