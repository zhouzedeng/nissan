<?php
namespace Dndc\Contact\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class ContactController extends Controller
{

    public function index(Request $request)
    {

        //dd(get_plugin_open_api_access_token());
        //dd (session('user_info'));
        echo config('dndc.contact.msg'); //配置文件
        return view('dndc.contact.contact');//视图文件
    }
}