<?php

namespace App\Http\Controllers;

use App\Models\Banner;
use App\Models\Provider;
use Illuminate\Http\Request;

class RootController extends Controller
{
    public function index()
    {
        $banners = Banner::all();
        $providers = Provider::all();

        return view('root', [
            'banners' => $banners,
            'providers' => $providers
        ]);
    }
}
