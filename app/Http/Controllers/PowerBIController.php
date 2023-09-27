<?php

namespace App\Http\Controllers;

use App\Http\Resources\Datasetreport;
use GuzzleHttp\Client;
use GuzzleHttp\Psr7\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http;

class PowerBIController extends Controller
{
    protected $bearerToken;

    private function loginPowerBI()
    {
        $client = new Client();
        $tenant_ID = Auth::user()->cliente->microsoftUser->tenant_id;
        $res = $client->request(
            'POST',
            'https://login.microsoftonline.com/' . $tenant_ID . '/oauth2/token',
            [
                'form_params' => [
                    'grant_type' => 'password', 
                    'username' => Auth::user()->cliente->username, 
                    'password' => Auth::user()->cliente->password,
                    'client_id' => Auth::user()->cliente->microsoftUser->client_id, 
                    'client_secret' => Auth::user()->cliente->microsoftUser->client_secret, 
                    'resource' => 'https://analysis.windows.net/powerbi/api'
                ]
            ]
        );
        $tokenPB = json_decode($res->getBody(), true);
        return "Bearer {$tokenPB['access_token']}";
    }
    
    public function index(){
        $dataset = Auth::user()->cliente->datasets_reports;
        return Datasetreport::collection($dataset);
    }

    public function prueba(){

        return auth('sanctum')->user();
    }
}
