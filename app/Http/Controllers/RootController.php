<?php

namespace App\Http\Controllers;

use App\Models\Faq;
use App\Models\Banner;
use App\Models\Provider;
use Illuminate\Http\Request;

class RootController extends Controller
{
    public function index()
    {
        $banners = Banner::all();
        $providers = Provider::all();
        $faqs = Faq::all();

        return view('root', [
            'banners' => $banners,
            'providers' => $providers,
            'faqs' => $faqs

        ]);
    }
}
