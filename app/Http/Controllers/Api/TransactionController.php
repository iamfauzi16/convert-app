<?php

namespace App\Http\Controllers\Api;

use App\Models\Provider;
use App\Models\Transaction;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class TransactionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

     public function __construct() {
        $this->middleware('auth:sanctum');
     }

    public function index()
    {
        
        $transactions = Transaction::all();

        if(!empty($transactions)) {
            return response()->json([
                'data' => $transactions,
                'message' => 'Data Tidak ditemukan',
                'status' => 'success'
            ],404);
        }

        return response()->json([
            'data' => $transactions,
            'message' => 'Data Berhasil ditampilkan',
            'status' => 'success'
        ],200);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $user_id = auth()->user()->id;

        $request->validate([
            'provider_id' => 'required',
            'bank_user_id' => 'required',
            'user_id' => 'required',
            'status' => 'required',
            'amount' => 'required|numeric',
            'convert' => 'nullable|numeric',
        ]);

        $provider = Provider::find($request->provider_id);
        $rate = $provider->rate;

        $convert = $request->amount * $rate;

        if($request->amount <= 30000) {
            return response()->json([
                'message' => 'Minimal transaksi Rp. 30.000',
                'status' => 'error'
            ], 400);
        }

       $transactions = Transaction::create([
            'provider_id' => $provider->id,
            'bank_user_id' => $request->bank_user_id,
            'user_id' => $user_id,
            'status' => $request->status,
            'amount' => $request->amount,
            'convert' => $convert,
        ]);

        return response()->json([
            'data' => $transactions,
            'message' => 'Data berhasil ditambahkan',
            'status' => 'success'
        ],201);

    }



    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
