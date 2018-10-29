<?php

namespace App\Http\Controllers;

use GuzzleHttp\Client;
use GuzzleHttp\Exception\RequestException;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Session;

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
