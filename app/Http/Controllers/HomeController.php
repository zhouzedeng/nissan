<?php

namespace App\Http\Controllers;

/**
 * 后台主页
 * Class HomeController
 * @package App\Http\Controllers
 */
class HomeController extends Controller
{

    public function index()
    {
        return view('home.index');
    }

}
