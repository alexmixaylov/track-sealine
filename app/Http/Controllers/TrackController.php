<?php

namespace App\Http\Controllers;

use App\Clients\ClientFactory;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class TrackController extends Controller
{
    /**
     * @throws \Exception
     */
    public function track(Request $request): JsonResponse
    {
        $providerName    = $request->input('provider');
        $containerNumber = $request->input('container');
        $responseType    = $request->input('response-type');

        $client = ClientFactory::create($providerName);

        $response = $client->trackContainer($containerNumber);

        return response()->json($response);
    }
}
