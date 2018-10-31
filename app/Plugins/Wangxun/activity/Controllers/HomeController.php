<?php

namespace Wangxun\Activity\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Log;

class HomeController extends Controller
{
    public function index()
    {
        Log::info(json_encode(session('user_info')));
        return view('wangxun.home.index', [
            'user_info' => session('user_info')
        ]);
    }
}

