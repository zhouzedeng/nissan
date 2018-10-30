<?php

namespace Wangxun\Activity\Controllers;

use App\Http\Controllers\Controller;

class HomeController extends Controller
{
    public function index()
    {
        return view('wangxun.home.index');
    }
}

