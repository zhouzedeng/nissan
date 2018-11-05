<?php
namespace Wangxun\Activity\Controllers;

use App\Http\Controllers\Controller;
use Wangxun\Common\Service\SellerService;

class HomeController extends Controller
{
    public function index()
    {
        $user_info = SellerService::getSeller();
        if ($user_info) {
            SellerService::save($user_info);
        }
        return view('wangxun.home.index', ['user_info' => $user_info]);
    }
}

