<?php

namespace App\Console\Commands;

use GuzzleHttp\Client;
use GuzzleHttp\Exception\ClientException;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Redis;

class GetPluginsApiAccessToken extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'getPluginsApiAccessToken';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = '获取插件接口的access_token';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        try {
            $secret = base64_encode(config('plugin.api.open.client_id') .
                ':' . config('plugin.api.open.client_secret'));
            $client = new Client();
            $response = $client->request('POST', config('plugin.api.open.api') . '/open/oauth/token', [
                'headers' => [
                    'Authorization' => 'Basic ' . $secret
                ],
                'form_params' => [
                    'grant_type' => 'client_credentials'
                ]
            ]);
            $body = $response->getBody();
            $stringBody = (string)$body;
            $access_token = json_decode($stringBody)->access_token;
            Redis::set('plugin:open:api:access_token', $access_token);
        } catch (ClientException $e) {
            Log::info($e->getMessage());
        }
    }
}
