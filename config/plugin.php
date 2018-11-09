<?php
return [

    'login_page'=>env('LOGIN_PAGE','https://horse-d.chebaba.com'),

    'api' => [
        'open'=>[
            'api' => env('OPEN_API_URI', ''),
            'client_id' => env('OPEN_API_CLIENT_ID', ''),
            'client_secret' => env('OPEN_API_CLIENT_SECRET', ''),
            'app_img_url' => env('APP_IMG_URL', ''),
        ]
    ]
];