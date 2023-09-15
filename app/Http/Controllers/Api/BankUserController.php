<?php

namespace App\Http\Controllers\Api;

use App\Models\BankUser;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class BankUserController extends Controller
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
        $bankUsers = BankUser::all();
        
        if(!empty($bankUsers)) {
            return response()->json([
                'data' => $bankUsers,
                'message' => 'Data tidak ditemukan',
                'status' => 'error'
            ], 404);
        }
        return response()->json([
            'data' => $bankUsers,
            'message' => 'Data berhasil ditampilkan',
            'status' => 'success'
        ], 200);
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

        return response()->json([
            'data' => $bankUser,
            'message' => 'Data berhasil ditambahkan',
            'status' => 'success'
        ], 200);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $bankUser = BankUser::find($id);
        
        if(!assert($bankUser)) {
            return response()->json([
                'data' => $bankUser,
                'message' => 'Data tidak ditemukan',
                'status' => 'error'
            ], 404);
        }
        return response()->json([
            'data' => $bankUser,
            'message' => 'Data berhasil ditampilkan',
            'status' => 'success'
        ], 200);
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
        $bankUser = BankUser::find($id);

        $request->validate([
            'bank_id' => 'required',
            'nama' => 'required',
            'number_bank' => 'required',
        ]);

        $bankUser->update([
            'bank_id' => $request->bank_id,
            'nama' => $request->nama,
            'number_bank' => $request->number_bank,
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $bankUser = BankUser::find($id);

        $bankUser->delete();

        return response()->json([
            'data' => $bankUser,
            'message' => 'Data berhasil dihapus',
            'status' => 'success'
        ], 200);
    }
}
